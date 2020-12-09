<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Bookstore</title>    
    </head>

    <body>
        <h1>All books</h1>

        @foreach($books as $book)
            <h3>
                <a href="{{ url("/books/{$book->id}") }}">
                    {{ $book->name }}
                </a>
            </h3>
            <p>{{ $book->desc }}</p>

            <a class="btn btn-sm btn-info" href="{{ url("books/edit/{$book->id}") }}">Edit</a>
            <hr>
        @endforeach


        {{ $books->links() }}
    </body>
</html>