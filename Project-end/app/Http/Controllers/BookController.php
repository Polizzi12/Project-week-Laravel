<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index(Request $request)
    {
       
        $books = Book::all(); 

        $books = Book::select()->paginate(4); 
        

        
        $searchTerm = 'lorem';
        

        return view('books.index', compact('books')); 
       
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        

        return view('books.show', [
            'book' => $book
        ]);
    }

    public function create(Request $request)
    {
        
        return view('books.create');
    }

    public function store(Request $request)
    {
        
        $data = $request->all();
       
        $newBook = new Book();
        $newBook->title = $data['title'];
        $newBook->author = $data['author'];
        $newBook->price = $data['price'];
        $newBook->img = $data['img'];
        $newBook->user_id = $request->user()->id;
        $newBook->save();

        
        return redirect()->route('books.show', ['id' => $newBook->id])->with('creation_success', $newBook);
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);

        
        if (Auth::user()->id !== $book->user_id) {
            return redirect()->route('books.index')->with('no_permission', $book);
        }

        
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        
        $book = Book::findOrFail($id);

        if ($request->user()->id !== $book->user_id) abort(401);

        $book->title = $data['title'];
        $book->author = $data['author'];
        $book->price = $data['price'];
        $book->img = $data['img'];
        $book->update();

        
        return redirect()->route('books.index')->with('update_success', $book);
    }

    public function destroy(Request $request, $id)
    {
        
        $book = Book::findOrFail($id);
        if (Auth::user()->id !== $book->user_id) abort(401);
        $book->delete();

      

        return redirect()->route('books.index')->with('operation_success', $book);
    }

    public function list()
    {
        $books = Book::all();

        

        return response()->json([
            'success' => true,
            'data'  => $books
        ]);
    }
}