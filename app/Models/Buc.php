<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buc extends Model
{
    use HasFactory;
    protected $fillable = [
        'n_bus',
        'longitude',
        'latitude',
    ];
}
