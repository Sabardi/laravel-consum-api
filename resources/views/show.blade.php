@extends('layout')

@section('content')
    <h1>{{ $item['name'] }}</h1>
    <a href="{{ route('items.index') }}">Back</a>
@endsection
