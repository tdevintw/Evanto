<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table ="events";

    public function user(){
        return $this->belongsTo(User::class, 'organizer_id');
    }
    public function ticket(){
        return $this->hasMany(Ticket::class);
    }
    public function reserverequests(){
        return $this->hasMany(ReserveRequest::class);
    }

    public function category(){
        return $this->hasOne(Category::class, 'id', 'category_id');

    }
}
