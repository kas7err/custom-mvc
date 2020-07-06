<?php

namespace App\Controllers;

use App\Models\ContactForm;
use App\Models\Picture;
use App\Models\User;
use Core\Controller;
use Core\Session;

class Home extends Controller
{
    public function index()
    {
        // var_dump(\Carbon\Carbon::now());
        $this->view::render('index', [
            'pictures' => Picture::orderBy('created_at', 'desc')->take(10)->get(),
        ]);
    }

    public function register()
    {
        if ($_POST['password'] != $_POST['repeat_password']) {
            header('Location: ' . '/');
        }

        $user = new User();
        $user->name = $_POST['name'];
        $user->email = $_POST['email'];
        $user->password = md5($_POST['password']);
        $user->created_at = \Carbon\Carbon::now();
        $user->save();

        header('Location: ' . '/');
    }

    public function login()
    {

        $auth = User::where('name', '=', $_POST['name'])->first();

        if ($auth !== null && $auth->password == md5($_POST['password'])) {
            Session::set('user', $auth->name);
        }


        if ($auth->isAdmin) {
            header('Location: ' . '/admin/index');
            return;
        }

        header('Location: ' . '/');
    }

    public function logout()
    {
        Session::unset('user');
        header('Location: ' . '/');
    }


    public function contactForm()
    {
        $this->view::render('form');
    }

    public function contactFormSave()
    {
        ContactForm::create([
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'message' => $_POST['message'],
            'created_at' => \Carbon\Carbon::now(),
        ]);
        header('Location: ' . '/');
    }

    public function profile()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . '/');
        }

        $this->view::render('users.profile', [
            'user' => User::where('name', $_SESSION['user'])->first(),
        ]);
    }
}
