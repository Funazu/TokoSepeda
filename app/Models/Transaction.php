<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'total', 'address', 'status', 'upload'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function transactionDetail() {
        return $this->hasMany(TransactionDetail::class);
    }
}
