@extends('layout')


@section('title')
    create book
@endsection

@section('main')
    
@if($errors->any())
    @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
@endif

<form action="{{ url('/cats/store') }}" method="post">
    @csrf 
    <input type="text" name="name" class="form-control">
    <br>
    
    <input type="submit" value="add category" class="btn btn-primary">
</form>

@endsection