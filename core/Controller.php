<?php

namespace Core;

use App\Models\User;
use Core\View;

class Controller
{
    public $view;
    public function __construct()
    {
        $this->view = new View();
    }
}
