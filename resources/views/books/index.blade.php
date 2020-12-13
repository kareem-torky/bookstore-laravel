@extends('layout')

@section('title')
    All books
@endsection

@section('main')

    <h1>All books</h1>
    <a class="btn btn-primary" href="{{ url('/books/create') }}">Create</a>
    <hr>
    @foreach($books as $book)
        <div class="py-3">
            <img src="{{ asset("uploads/$book->img") }}" height="100px">
            <h3>
                <a href="{{ url("/books/show/{$book->id}") }}">
                    {{ $book->name }}
                </a>
            </h3>
            <p>{{ $book->cat->name }}</p>
            <p>{{ $book->desc }}</p>
    
            <a class="btn btn-sm btn-info" href="{{ url("books/edit/{$book->id}") }}">Edit</a>
            <a class="btn btn-sm btn-danger" href="{{ url("books/delete/{$book->id}") }}">Delete</a>
            <hr>
        </div>
    @endforeach


    {{ $books->links() }}
    
@endsection