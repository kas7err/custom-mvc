<?php

namespace App\Controllers;

use App\Models\User;
use Core\Controller;

class Users extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $users = User::with('pictures')->take(10)->get();
        $users = $users->sortByDesc(function ($user) {
            return $user->pictures->count();
        });


        $this->view::render('users.index', [
            'users' => $users,
        ]);
    }

    public function updateEmail()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . '/');
        }

        $user = User::where('name', $_SESSION['user'])->first();
        $user->email = $_POST['email'];
        $user->save();

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
