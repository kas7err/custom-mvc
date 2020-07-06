@extends('layouts.app')

@section('content')


<h3>Show Picture</h3>

<div class="container text-center d-box">
    <div class="img_wrapper">
        <img src="{{$picture->url}}" style="width:150px;height:150px;
                                background-repeat:no-repeat;
                                background-position: center;
                                background-image:url(image.jpg);
                                background-size: cover;" alt="">
    </div>
    @if (isset($_SESSION['user']) && $picture->user->name == $_SESSION['user'])
    <a class="btn btn-danger btn-md my-4" href="/pictures/destroy/{{$picture->id}}">DELETE</a>
    @endif
</div>

@if (count($picture->comments) > 0)
<h3>Comments</h3>
@foreach ($picture->comments as $comment)
<div class="comment">
    <h5>User: {{$comment->name}}</h5>
    <p>{{$comment->message}}</p>
</div>
@endforeach
@endif


<h3>Add Comment</h3>
@if (isset($_SESSION['user']))
<div class="row">
    <div class="col-md-4">
        <form action="/pictures/addComment" method="post">
            <div class="form-group">
                <input type="hidden" name="name" class="form-control" value="{{$_SESSION['user']}}">
                <input type="hidden" name="picture_id" class="form-control" value="{{$picture->id}}">
            </div>
            <div class="form-group">
                <textarea name="message" id="" cols="45" rows="4"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-block">Comment</button>
            </div>
        </form>
    </div>
</div>
@endif

@endsection