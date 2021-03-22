<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'title',
        'available_qty',
        'publication_date',
        'price',
        'slug',
        'description',
        'weight',
        'size',
        'author',
        'publisher',
        'publication_ebook',
        'isbn',
        'recommendation',
        'category_id',

    ];

    protected $hidden = [];

    // public function getImageAttribute($value)
    // {
    //     return url('storage/'.$value);
    // }

    public function author()
    {
        return $this->hasOne(Author::class, 'id', 'author');
    }

    public function publisher()
    {
        return $this->hasOne(Publisher::class, 'id', 'publisher');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function imagebook()
    {
        return $this->hasMany(BookImage::class, 'book_id','id');
    }

    // public function transactiondetail()
    // {
    //     return $this->belongsTo(TransactionDetail::class, 'book_id' ,'id');
    // }

}
