@extends('layouts.app')

@section('content')

@if (isset($_SESSION['user']))
<h2>Welcome {{ucfirst($_SESSION['user'])}}</h2>
@endif


<h3>Latest Pictures</h3>
<table class="table my-5">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Url</th>
            <th scope="col">Display</th>
            <th scope="col">Created At</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pictures as $pic)
        <tr>
            <th scope="row">{{$pic->id}}</th>
            <td><a href="/pictures/show/{{$pic->id}}">{{$pic->url}}</a></td>
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

@if (!isset($_SESSION['user']))
<div class="row">
    <div class="col-md-4">
        <form action="/home/login" method="post">
            <h2 class="text-center">Log in</h2>
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Username" required="required">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Log in</button>
            </div>
            <div class="clearfix">
                <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
            </div>
        </form>
    </div>


    <div class="col-md-4">
        <form action="/home/register" method="post">
            <h2 class="text-center">Register</h2>

            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Username" required="required">
            </div>

            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email" required="required">
            </div>

            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required="required">
            </div>

            <div class="form-group">
                <input type="password" name="repeat_password" class="form-control" placeholder="Repeat Password"
                    required="required">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
        </form>
    </div>
</div>
@endif

@endsection