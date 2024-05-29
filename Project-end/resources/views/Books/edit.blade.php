@extends('templates.base')

@section('title', 'Libreria - About')

@section('content')
    <h1 class="text-3xl font-bold mb-4">Books create</h1>
    <form method="POST" action="{{ route('books.update', ['id' => $book]) }}">
        @method('PUT')
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" id="title" name="title" value="{{ $book->title }}">
        </div>
        <div class="mb-4">
            <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
            <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" id="author" name="author" value="{{ $book->author }}">
        </div>
        <div class="mb-4">
            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
            <input type="number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" id="price" name="price" value="{{ $book->price }}">
        </div>
        <div class="mb-4">
            <label for="img" class="block text-sm font-medium text-gray-700">Image URL</label>
            <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" id="img" name="img" value="{{ $book->img }}">
        </div>
        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
    </form>
@endsection