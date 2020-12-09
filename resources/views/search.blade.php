<html>
    <head>

    </head>

    <body>
        <h1>Search results for: {{ $keyword }}</h1>

        @foreach($books as $book)
            <h3>{{ $book->name }}</h3>
            <p>{{ $book->desc }}</p>
            <hr>
        @endforeach

    </body>
</html>