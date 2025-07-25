<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    protected $fillable = [
        'n_bus',
        'longitude',
        'latitude',
    ];
    public function stops()
    {
        return $this->hasMany(Stop::class);
    }
}
