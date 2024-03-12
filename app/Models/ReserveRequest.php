<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReserveRequest extends Model
{
    use HasFactory;
    protected $table ="reserverequests";

    protected $fillable = [
        'user_id',
        'event_id',   
        'status'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function event(){
        return $this->belongsTo(Event::class);
    }
    public function ticket(){
        return $this->hasOne(Ticket::class,'request_id', 'id');
    }
}
