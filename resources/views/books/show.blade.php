@extends('layout')

@section('main')

    <h1>{{ $book->name }}</h1>
    <p>{{ $book->cat->name }}</p>
    <p>{{ $book->desc }}</p>
    <p><strong>Created at:</strong> {{ $book->created_at }}</p>
    <hr>

    <a href="{{ url('/books') }}">Back</a>

@endsection