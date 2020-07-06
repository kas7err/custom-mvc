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
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <th scope="row">{{$user->id}}</th>
            <td><a href="/admin/userPictures/{{$user->id}}">{{$user->name}}</a></td>
            <td>{{$user->pictures->count()}}</td>
            <td>{{$user->created_at}}</td>
            <td>
                <a href="/admin/deleteUser/{{$user->id}}">
                    <i class="fa fa-trash-o"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection