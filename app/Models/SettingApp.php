<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SettingApp extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'link_twitter',
        'link_fb',
        'link_ig',
        'link_yt',
        'no_telp',
        'no_wa',
        'email',
        'alamat',
        'alamat'
    ];

    protected $hidden = [];
}