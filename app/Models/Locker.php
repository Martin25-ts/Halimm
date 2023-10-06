<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locker extends Model
{
    use HasFactory;
    protected $table = 'ms_lockers';
    protected $primaryKey = 'locker_id';

    protected $fillable = ['locker_number', 'status_locker_id', 'location_id', 'locker_size'];

    public function status()
    {
        return $this->belongsTo(StatusLocker::class, 'status_locker_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
}
