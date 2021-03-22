<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'banner_image',
        'description',
        'link',
        'slug',
        'status',
        'for',
    ];

    protected $hidden = [];

    public function getBannerImageAttribute($value)
    {
        return url('storage/'.$value);
    }
}
