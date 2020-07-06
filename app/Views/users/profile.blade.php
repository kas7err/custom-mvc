@extends('layouts.app')

@section('content')

@if (isset($_SESSION['user']))
<h2>Welcome {{ucfirst($_SESSION['user'])}}</h2>
@endif


<div class="row mt-5">
    <div class="col-md-6">
        <div class="wrp">
            <h3>MY Pictures</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Url</th>
                        <th scope="col">Display</th>
                        <th scope="col">Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user->pictures as $pic)
                    <tr>
                        <th scope="row">{{$pic->id}}</th>
                        <td><a href="/pictures/show/{{$pic->id}}">{{substr($pic->url,0,20) }}</a></td>
                        <td>
                            <img src="{{$pic->url}}" style="width:50px;height:50px;
                                        background-repeat:no-repeat;
                                        background-position: center;
                                        background-image:url(image.jpg);
                                        background-size: cover;" alt="">
                        </td>
                        <td>{{$pic->created_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form__one">
            <h3>Upload new image</h3>
            <form action="/pictures/create" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="user_id" class="form-control" value="{{$user->id}}">
                </div>
                <div class="form-group">
                    <input type="file" name="image" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Upload</button>
                </div>
            </form>
        </div>
        <div class="form_two">
            <h3>Change email</h3>
            <form action="/users/updateEmail" method="post">
                <div class="form-group">
                    <input type="hidden" name="user_id" class="form-control" value="{{$user->id}}">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" value="{{$user->email}} " required="required">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection