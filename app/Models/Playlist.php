<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Playlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'thumbnail',
    ];

    protected static function booted(): void
    {
        static::creating(function (Playlist $model) {
            if (empty($model->thumbnail) && !empty($model->image)) {
                $model->thumbnail = $model->image;
            }
        });

        static::updating(function (Playlist $model) {
            if (empty($model->thumbnail) && !empty($model->image)) {
                $model->thumbnail = $model->image;
            }
        });
    }
}
