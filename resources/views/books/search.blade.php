@extends('layout')

@section('main')

<h1>Search results for: {{ $keyword }}</h1>

@foreach($books as $book)
    <h3>{{ $book->name }}</h3>
    <p>{{ $book->desc }}</p>
    <hr>
@endforeach

@endsection