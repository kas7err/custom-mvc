@extends('layouts.app')

@section('content')

@if (isset($_SESSION['user']))
<h2>Welcome {{ucfirst($_SESSION['user'])}}</h2>
@endif


<h3>Listed Users</h3>

<table class="table my-5">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">User Name</th>
            <th scope="col">Number of pictures</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->pictures->count()}}</td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection