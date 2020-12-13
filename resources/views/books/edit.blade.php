@extends('layout')

@section('main')

@if($errors->any())
@foreach($errors->all() as $error)
    <p>{{ $error }}</p>
@endforeach
@endif

<form action="{{ url("/books/update/{$book->id}") }}" method="post" enctype="multipart/form-data">
@csrf 
<input type="text" name="name" value="{{ $book->name }}">
<br>
<textarea name="desc" cols="30" rows="10">{{ $book->desc }}</textarea>
<br>
<input type="file" class="form-control-file" name="img">
<br>
<div class="form-group">
    <label>Select Category</label>
    <select class="form-control" name="cat_id">
        @foreach ($cats as $cat)
            <option value="{{ $cat->id }}" @if($book->cat->id == $cat->id) selected @endif>{{ $cat->name }}</option>
        @endforeach
    </select>
</div>

<input type="submit" value="edit book">
</form>

@endsection