@extends('layout')

@section('main')

    <h1>{{ $cat->name }}</h1>
    <p><strong>Created at:</strong> {{ $cat->created_at }}</p>
    <hr>

    @foreach ($cat->books as $book)
        <a href="{{ url("/books/show/{$book->id}") }}">
            <p>{{ $book->name }}</p>
        </a>
    @endforeach
    
    <a href="{{ url('/cats') }}">Back</a>

@endsection