<!-- tawag para sa sidebar -->
@extends('layouts.layout') 

@section('content')

    <h1>Dashboard</h1>
    <p>Welcome, {{ Auth::user()->name }}!</p>

    @endsection