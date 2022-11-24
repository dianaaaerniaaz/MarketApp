@extends('layouts.adm')

@section('title','Users page')
@section('name')
    <div class="sidebar-brand-text mx-3">SB Adm&Mod </div>
@endsection
@section('content')
    <h1>Category page</h1>
    <table class="table">
        <thead>
        <tr>

            <h2 style="color: black"><b>Name:</b></h2><hr>


        </tr>
        </thead>
        <tbody>
        @foreach($categories as $cat)

            <h3 class="text-black text-center text-decoration-none"style="color: black;margin-top: 25px;">{{$cat->name}}</h3>
            <form action="{{route('adm.categories.destroy',$cat->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger mt-4" style="letter-spacing: 2px;position: relative;left: 50%;transform: translate(-50%, 0);" >Delete</button>
            </form><hr>
        @endforeach

        <a href="{{route('adm.categories.create')}}">New Category</a>

        </tbody>
    </table>
@endsection
