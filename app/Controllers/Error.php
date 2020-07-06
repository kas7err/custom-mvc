<?php

namespace App\Controllers;

use Core\Controller;

class Error extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view::render('errors.404');
    }
}
