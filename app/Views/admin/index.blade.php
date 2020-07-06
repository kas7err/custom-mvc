@extends('layouts.admin')

@section('content')

@if (isset($_SESSION['user']))
<h2>Dashboard</h2>
@endif


<h3>Latest 5 Users</h3>
<table class="table my-5">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">User Name</th>
            <th scope="col">Number of pictures</th>
            <th scope="col">Created At</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->pictures->count()}}</td>
            <td>{{$user->created_at}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<h3>Latest 5 Pictures</h3>
<table class="table my-5">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Url</th>
            <th scope="col">Display</th>
            <th scope="col">Author</th>
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
            <td>{{$pic->user->name}}</td>
            <td>{{$pic->created_at}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection