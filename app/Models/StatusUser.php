<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusUser extends Model
{
    use HasFactory;

    protected $table = 'ms_statuses_user';
    protected $primaryKey = 'status_user_id';

    protected $fillable = ['status_user'];

    public function users()
    {
        return $this->hasMany(User::class, 'status_user_id');
    }
}
