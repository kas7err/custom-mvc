@extends('layouts.app')

@section('content')

<h2 class="my-5 text-center">Contact US</h2>


<div class="row">
    <div class="col-md-4 mx-auto">
        <form action="/home/contactFormSave" method="post">
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Name" requred>
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email" requred>
            </div>
            <div class="form-group">
                <textarea name="message" id="" cols="45" rows="4" requred></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-block">Send</button>
            </div>
        </form>
    </div>
</div>


@endsection