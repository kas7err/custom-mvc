<?php

namespace App\Controllers;

use App\Models\Comment;
use App\Models\Picture;
use App\Models\User;
use Core\Controller;
use Core\Helpers;

class Pictures extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view::render('pictures.index', [
            'pictures' => Picture::orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function show($id)
    {
        $this->view::render('pictures.show', [
            'picture' => Picture::with('user', 'comments')->find($id),
        ]);
    }

    public function create()
    {
        $user = User::with('pictures')->find($_POST['user_id']);
        if ($user->pictures()->count() >= 4) {
            \Core\Session::set('message', 'Maximum number of pictures reached');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            return;
        }

        if ($_FILES['image']['size'] > 1000000) {
            throw new \RuntimeException('Exceeded filesize limit.');
        }

        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        if (false === array_search(
            $finfo->file($_FILES['image']['tmp_name']),
            array(
                'jpg' => 'image/jpeg',
                'png' => 'image/png',
                'gif' => 'image/gif',
            ),
            true
        )) {
            throw new \RuntimeException('Invalid file format.');
        }

        $target_url = '/images/uploads/' . Helpers::randomString(20) . '.' . explode('/', $_FILES['image']['type'])[1];
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . $target_url;

        try {
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir);
        } catch (\Throwable $th) {
            throw new \RuntimeException('Something whent wrong uploading the file.');
        }

        Picture::create([
            'user_id' => $_POST['user_id'],
            'url' => $target_url,
            'created_at' => \Carbon\Carbon::now(),
        ]);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function addComment()
    {
        $picture = Picture::with('comments')->find($_POST['picture_id']);
        if ($picture->comments()->count() >= 4) {
            \Core\Session::set('message', 'Maximum number of comments reached');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            return;
        }

        Comment::create([
            'name' => $_POST['name'],
            'picture_id' => $_POST['picture_id'],
            'message' => $_POST['message'],
            'created_at' => \Carbon\Carbon::now(),
        ]);

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function destroy($id)
    {
        $picture = Picture::find($id);
        $file = $_SERVER['DOCUMENT_ROOT'] . $picture->url;
        if (file_exists($file)) {
            unlink($file);
        }
        $picture->delete();
        header('Location: ' . '/home/profile');
    }
}
