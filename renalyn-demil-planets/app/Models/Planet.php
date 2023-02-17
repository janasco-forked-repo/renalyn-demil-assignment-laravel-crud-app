<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    use HasFactory;
    protected $fillable = [
        'planet_image',
        'planet_name',
        'discovery_year',
        'distance_from_sun',
        'surface_area',
        'rotation_period',
        'number_of_moons'
    ];
}
 