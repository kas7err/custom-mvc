<?php

namespace App\Controllers;

use App\Models\Picture;
use App\Models\User;
use Core\Controller;

class Admin extends Controller
{
    public $admin;

    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['user'])) {

            header('Location: ' . '/');
        } else {
            $user = User::where('name', $_SESSION['user'])->first();
            if ($user->isAdmin) {
                $this->admin = $user;
            } else {
                \Core\Session::set('message', 'not an admin');
                header('Location: ' . '/');
            }
        }
    }

    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->with('pictures')->take(5)->get();
        $users = $users->sortByDesc(function ($user) {
            return $user->pictures->count();
        });

        $this->view::render('admin.index', [
            'users' => $users,
            'pictures' => Picture::with('user')->orderBy('created_at', 'desc')->take(5)->get(),
        ]);
    }

    public function pictures()
    {
        $this->view::render('admin.pictures', [
            'pictures' => Picture::with('comments')->orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function deletePicture($id)
    {
        $picture = Picture::find($id);
        $file = $_SERVER['DOCUMENT_ROOT'] . $picture->url;
        if (file_exists($file)) {
            unlink($file);
        }
        $picture->delete();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function users()
    {
        $users = User::orderBy('created_at', 'desc')->with('pictures')->get();

        $this->view::render('admin.users', [
            'users' => $users,
        ]);
    }

    public function userPictures($id)
    {
        $this->view::render('admin.user_pictures', [
            'user' => User::with('pictures')->find($id),
        ]);
    }
}
