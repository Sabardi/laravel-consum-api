@extends('layout')

@section('content')
    <h1>Create Item</h1>
    <form action="{{ route('items.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Name">
        <button type="submit">Create</button>
    </form>
@endsection
