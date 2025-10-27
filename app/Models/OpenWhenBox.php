<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OpenWhenBox extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'content_file',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'content_file' => 'array',
    ];

    protected static function booted(): void
    {
        static::creating(function (OpenWhenBox $model) {
            if (empty($model->slug) && !empty($model->title)) {
                $model->slug = \Illuminate\Support\Str::slug($model->title);
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
