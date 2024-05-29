@extends('templates.base')

@section('title', 'Libreria - Index of Books')

@section('content')
    <h1 class="text-3xl font-bold mb-4">Books list</h1>

    @session('saluto')
        <div class="alert alert-success" role="alert">
            {{ session('saluto') }}
        </div>
    @endsession

    @session('no_permission')
        <div class="alert alert-danger" role="alert">
            Non hai i permessi per modificare il post
        </div>
    @endsession

    @session('operation_success')
        <div class="alert alert-success" role="alert">
            Il libro "{{ session('operation_success')->title }}" è stato eliminato con successo
        </div>
    @endsession

    @session('update_success')
        <div class="alert alert-success" role="alert">
            Risorsa "{{ session('update_success')->title }}" aggiornata <a
                href="{{ route('books.show', ['id' => session('update_success')->id]) }}">Visualizza</a>
        </div>
    @endsession

    @if ($books->count())
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        id
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Author
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Img
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Created_at
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Updated_at
                    </th>
                    @auth
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Actions</span>
                        </th>
                    @endauth
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($books as $book)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $book->id }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('books.show', ['id' => $book]) }}" class="text-indigo-600 hover:text-indigo-900">{{ $book->title }}</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $book->price }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $book->author }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $book->img }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $book->created_at }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $book->updated_at }}
                        </td>
                        @auth
                            @if (Auth::user()->id === $book->user_id)
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('books.edit', ['id' => $book]) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <form action="{{ route('books.destroy', ['id' => $book]) }}" method="POST" class="inline">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                    </form>
                                </td>
                            @endif
                        @endauth
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">{{ $books->links() }}</div>
    @else
        <h2>Non ci sono libri</h2>
    @endif
@endsection