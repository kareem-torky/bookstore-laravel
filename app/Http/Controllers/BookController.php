<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        // SELECT * FROM books
        $books = Book::orderBy('id', 'desc')->paginate(5);

        return view('books.index', [
            'books' => $books
        ]);
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
       
        return view('books.show', [
            'book' => $book
        ]);
    }

    public function search($keyword)
    {
        $books = Book::where("name", "like", "%$keyword%")->get();

        return view('books.search', [
            'books' => $books,
            'keyword' => $keyword
        ]);
    }

    public function create()
    {
        $cats = Cat::select('id', 'name')->get();
        return view('books.create', [
            'cats' => $cats
        ]);
    }

    public function store(Request $request)
    {
        // validation 
        $request->validate([
            'name' => 'required|string|min:5|max:255',
            'desc' => 'required|string|min:10',
            'img'  => 'required|image|mimes:jpg,png|max:512',
            'cat_id' => 'required|integer|exists:cats,id'
        ]);

        // upload 
        // use Illuminate\Support\Facades\Storage;
        $path = Storage::putFile('books', $request->file('img'));
        
        // store in database
        Book::create([
            'name' => $request->name,
            'desc' => $request->desc, 
            'img' => $path,
            'cat_id' => $request->cat_id
        ]);

        return redirect( url('/books') );
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $cats = Cat::select('id', 'name')->get();

        return view('books.edit', [
            'book' => $book,
            'cats' => $cats
        ]);
    }

    public function update($id, Request $request)
    {
        // validation 
        $request->validate([
            'name' => 'required|string|min:5|max:255',
            'desc' => 'required|string|min:10',
            'img'  => 'nullable|image|mimes:jpg,png|max:512',
            'cat_id' => 'required|integer|exists:cats,id'
        ]);
        
        $book = Book::findOrFail($id);
        $path = $book->img;

        if ($request->hasFile('img')) {
            // delete old
            Storage::delete($path);

            // upload new 
            $path = Storage::putFile('books', $request->file('img'));
        }

        $book->update([
            'name' => $request->name,
            'desc' => $request->desc,
            'img' => $path,
            'cat_id' => $request->cat_id
        ]);

        return redirect( url("/books/show/{$id}") );
    }

    public function delete($id)
    {
        $book = Book::findOrFail($id);

        $path = $book->img;
        Storage::delete($path);

        $book->delete();
    
        return redirect( url('/books') );
    }
}