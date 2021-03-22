<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'user_id',
        'transaction_total',
        'transaction_status',
        'code_transaction',
        'bank_name',
        'va_number',
        'courier',
        'cost',
        'tracking_number',
    ];

    protected $hidden = [];
    protected $guarded = [];

    public const PAID = 'paid';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
    public function details()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    public function isPaid()
	{
		return $this->transaction_status == self::PAID;
	}
}
