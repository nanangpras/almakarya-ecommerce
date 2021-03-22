<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'image',
        'slug',
    ];

    protected $hidden = [];

    public function book()
    {
        return $this->hasMany(Book::class);
    }

    public function getImageAttribute($value)
    {
        return url('storage/'.$value);
    }
}
