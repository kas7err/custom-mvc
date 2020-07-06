<?php

namespace App\Models;

use Core\Model;

class Picture extends Model
{
    public $fillable = ['user_id', 'url', 'created_at'];
    public $timestamps = false;

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($picture) {
            $picture->comments()->delete();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
