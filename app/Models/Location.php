<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $table = 'ms_locations';
    protected $primaryKey = 'location_id';

    protected $fillable = ['location_name', 'location_url'];
}
