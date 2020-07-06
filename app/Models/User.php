<?php

namespace App\Models;

use Core\Model;

class User extends Model
{
    public $timestamps = false;

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($user) {
            $user->pictures()->delete();
        });
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }
}
