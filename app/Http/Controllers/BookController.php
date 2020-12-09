<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        // SELECT * FROM books
        $books = Book::paginate(5);

        return view('index', [
            'books' => $books
        ]);
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
       
        return view('show', [
            'book' => $book
        ]);
    }

    public function search($keyword)
    {
        $books = Book::where("name", "like", "%$keyword%")->get();

        return view('search', [
            'books' => $books,
            'keyword' => $keyword
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        // validation 
        $request->validate([
            'name' => 'required|string|min:5|max:255',
            'desc' => 'required|string|min:10',
        ]);

        // store in database
        Book::create([
            'name' => $request->name,
            'desc' => $request->desc, 
        ]);

        return redirect( url('/books') );
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);

        return view('edit', [
            'book' => $book
        ]);
    }
}



/* 
        SELECT name, `desc` FROM books 
        Book::select("name", "desc")->get()

        SELECT name, `desc` FROM books WHERE id > 2
        Book::select("name", "desc")->where('id', '>', 2)->get()

        SELECT name, `desc` FROM books WHERE id > 2 AND name like 'A%' 
        Book::select("name", "desc")->where('id', '>', 2)->where('name', 'like', 'A%')->get()

        SELECT name, `desc` FROM books WHERE id > 2 AND name like 'A%' ORDER BY name DESC

        Book::select("name", "desc")
        ->where('id', '>', 2)
        ->where('name', 'like', 'A%')
        ->orderBy('name', 'desc')
        ->get();

        
        SELECT name, `desc` FROM books WHERE id > 2 AND name like 'A%' ORDER BY name DESC LIMIT 3

        Book::select("name", "desc")
        ->where('id', '>', 2)
        ->where('name', 'like', 'A%')
        ->orderBy('name', 'desc')
        ->take(3)
        ->get();

        orders 
        SELECT id, address, phone FROM orders
        WHERE id > 100 OR phone != "010123" 
        ORDER BY phone ASC

        $orders = Order::select("id", "address", "phone")
        ->where("id", ">", 100)
        ->orWhere("phone", "!=", "010123")
        ->orderBy("phone")
        ->get();
    */ 
