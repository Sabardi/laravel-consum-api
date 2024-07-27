@extends('layout')

@section('content')
    <h1>Items</h1>
    <a href="{{ route('items.create') }}">Create New Item</a>
    <ul>
        @foreach ($items as $item)
            <li>
                {{ $item['name'] }}
                <a href="{{ route('items.show', $item['id']) }}">View</a>
                <a href="{{ route('items.edit', $item['id']) }}">Edit</a>
                <form action="{{ route('items.destroy', $item['id']) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
