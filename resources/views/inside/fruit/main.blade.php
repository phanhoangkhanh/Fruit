@extends('inside.main-all')
@section('title', 'FRUIT')
@section('page.header',"Fruit SFVN")
@section('content')
    @livewire('declare-fruit', [], key('declare-fruit'))
    @livewire('list-fruit-item', [], key('list-fruit-item'))
@endsection