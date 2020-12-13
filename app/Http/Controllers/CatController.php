<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;

class CatController extends Controller
{
    public function index()
    {
        $cats = Cat::get();
        
        return view('cats.index', [
            'cats' => $cats
        ]);
    }

    public function show($id)
    {
        $cat = Cat::findOrFail($id);

        return view('cats.show', [
            'cat' => $cat
        ]);
    }

    public function create()
    {
        return view('cats.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50'
        ]);

        Cat::create([
            'name' => $request->name
        ]);

        return redirect( url('/cats') );
    }

    public function edit($id)
    {
        $cat = Cat::findOrFail($id);

        return view('cats.edit', [
            'cat' => $cat
        ]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50'
        ]);

        Cat::findOrFail($id)->update([
            'name' => $request->name
        ]);

        return redirect( url("/cats/show/{$id}") );
    }

    public function delete($id)
    {
        Cat::findOrFail($id)->delete();

        return redirect( url('/cats') );
    }

}
