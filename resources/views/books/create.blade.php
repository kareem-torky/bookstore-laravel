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

<form action="{{ url('/books/store') }}" method="post" enctype="multipart/form-data">
    @csrf 
    <input type="text" name="name" class="form-control">
    <br>
    <textarea name="desc" cols="30" rows="10" class="form-control"></textarea>
    <br>
    <div class="form-group">
        <label>Select Category</label>
        <select class="form-control" name="cat_id">
            @foreach ($cats as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>
    </div>
    <br>
    <input type="file" class="form-control-file" name="img">

    <input type="submit" value="add book" class="btn btn-primary">
</form>

@endsection