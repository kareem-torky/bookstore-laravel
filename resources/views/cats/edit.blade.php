@extends('layout')

@section('main')

@if($errors->any())
@foreach($errors->all() as $error)
    <p>{{ $error }}</p>
@endforeach
@endif

<form action="{{ url("/cats/update/{$cat->id}") }}" method="post">
@csrf 
<input type="text" name="name" value="{{ $cat->name }}">
<br>

<input type="submit" value="edit category">
</form>

@endsection