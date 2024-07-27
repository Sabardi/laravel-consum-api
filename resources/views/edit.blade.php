@extends('layout')

@section('content')
    <h1>Edit Item</h1>
    <form action="{{ route('items.update', $item['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $item['name'] }}">
        <button type="submit">Update</button>
    </form>
@endsection
