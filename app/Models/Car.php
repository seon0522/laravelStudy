<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = "cars";

    protected $fillable = [
        "carname",
        "manufacturer",
        "price",
        "carmodel",
        "appearance",
        "caryear",
        "user_id",
        'image'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
