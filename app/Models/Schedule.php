<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['day', 'start_time', 'end_time', 'activity', 'is_done', 'message_when_done', 'message_when_cancel'];
}
