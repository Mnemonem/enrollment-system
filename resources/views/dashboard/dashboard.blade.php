<!-- tawag para sa sidebar -->
@extends('layouts.layout') 
@section('content')
<!-- Design -->
     <!-- Route for Logout -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Logout sa ta dams</button>
        </form>
         <!-- Route for Logout -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Logout sa ta dams</button>
        </form>
    

    @endsection