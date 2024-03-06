<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $table ="tickets";

    protected  $fillable = [
        'user_id',
        'request_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function request(){
        return $this->belongsTo(ReserveRequest::class);
    }


}
