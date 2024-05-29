<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    
    public function index()
    {
        $authors = Author::paginate();
        

        return view('authors.index', [
            'authors' => $authors,
        ]);
    }

    
    public function create()
    {
        return view('authors.create');
    }

   
    public function store(Request $request)
    {
        
    }

    
    public function show(Author $author)
    {
        
        return view('authors.show', [
            'author' => $author,
        ]);
    }

    
    public function edit(Author $author)
    {
        return view('authors.edit');
    }

   
    public function update(Request $request, Author $author)
    {
        //
    }

    
    public function destroy(Author $author)
    {
        $author->delete();
    }
}