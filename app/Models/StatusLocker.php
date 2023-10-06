<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusLocker extends Model
{
    use HasFactory;
    protected $table = 'ms_status_lockers';
    protected $primaryKey = 'status_locker_id';

    protected $fillable = ['status_locker'];
}
