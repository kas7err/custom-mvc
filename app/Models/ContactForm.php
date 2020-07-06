<?php

namespace App\Models;

use Core\Model;

class ContactForm extends Model
{
    public $fillable = ['name', 'email', 'message', 'created_at'];
    public $timestamps = false;
}
