<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusTransaction extends Model
{
    use HasFactory;

    protected $table = 'ms_status_transactions';
    protected $primaryKey = 'status_transaction_id';

    protected $fillable = ['status_transaction'];
}
