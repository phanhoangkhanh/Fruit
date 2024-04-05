@extends('inside.main-all')
@section('title', 'FRUIT')
@section('content')
    @livewire('declare-fruit', [], key('declare-fruit'))
    @livewire('list-fruit-item', [], key('list-fruit-item'))
@endsection