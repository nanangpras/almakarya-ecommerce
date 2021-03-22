<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'book_id',
        'qty',
        'transaction_subtotal',
        'transaction_id',
    ];

    protected $hidden = [];
    protected $guarded = [];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id','id');
    }
    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id','id');
    }
}
