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
            // Mirror image into thumbnail on create
            if (!empty($model->image)) {
                $model->thumbnail = $model->image;
            }
        });

        static::updating(function (Playlist $model) {
            // Always keep thumbnail synced with image when image is present
            if (!empty($model->image)) {
                $model->thumbnail = $model->image;
            }
        });
    }
}
