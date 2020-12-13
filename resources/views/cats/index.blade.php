@extends('layout')

@section('title')
    All categories
@endsection

@section('main')

    <h1>All categories</h1>
    <a class="btn btn-primary" href="{{ url('/cats/create') }}">Create</a>
    <hr>
    @foreach($cats as $cat)
        <div class="py-3">
            <h3>
                <a href="{{ url("/cats/show/{$cat->id}") }}">
                    {{ $cat->name }}
                </a>
            </h3>
    
            <a class="btn btn-sm btn-info" href="{{ url("cats/edit/{$cat->id}") }}">Edit</a>
            <a class="btn btn-sm btn-danger" href="{{ url("cats/delete/{$cat->id}") }}">Delete</a>
            <hr>
        </div>
    @endforeach

@endsection