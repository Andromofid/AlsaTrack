<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stop extends Model
{
    use HasFactory;

    protected $fillable = [
        'bus_id',
        'latitude',
        'longitude',
        'name',
        'stop_order',
        'direction'
    ];
    public function bus()
{
    return $this->belongsTo(Bus::class);
}

}
