<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bookstore</title>
</head>
<body>

    @if($errors->any())
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
    
    <form action="{{ url('/books/store') }}" method="post">
        @csrf 
        <input type="text" name="name">
        <br>
        <textarea name="desc" cols="30" rows="10"></textarea>
        <br>
        <input type="submit" value="add post">
    </form>
</body>
</html>