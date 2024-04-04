@extends('inside.main-all')
@section('title', 'CUSTOMER')
@section('page.header',"Customer Center")
@section('content')
    @livewire('declare-customer', [], key('declare-customer'))
    @livewire('list-customer', [], key('list-customer'))
@endsection