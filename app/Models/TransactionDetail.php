<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $table = 'transaction_details';
    protected $primaryKey = 'detail_id';

    protected $fillable = ['duration', 'transaction_id', 'locker_id', 'locker_potition'];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }

    public function locker()
    {
        return $this->belongsTo(Locker::class, 'locker_id');
    }
}
