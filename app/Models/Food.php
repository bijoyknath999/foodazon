<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $primaryKey = 'food_id';
    public $timestamps=false;

    use HasFactory;
}
