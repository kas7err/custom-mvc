<?php

namespace App\Models;

use Core\Model;

class Comment extends Model
{
    public $fillable = ['name', 'picture_id', 'message', 'created_at'];

    public $timestamps = false;

    public function picture()
    {
        return $this->belongsTo(Picture::class);
    }
}
