@extends('layouts.adm')

@section('title','Clothes page')
@section('name')
    <div class="sidebar-brand-text mx-3">SB Admin </div>
@endsection
@section('content')
    <h1>Clothes page</h1>



        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>

                <th scope="col">Type</th>
                <th scope="col">Brand</th>
                <th scope="col">Color</th>

                <th scope="col">Price</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @for($i=0;$i<count($clothes);$i++)
                <tr>
                    <th scope="row">{{$i+1}}</th>
                    <td>{{$clothes[$i]->type}}</td>
                    <td>{{$clothes[$i]->brand}}</td>
                    <td>{{$clothes[$i]->color}}</td>

                    <td>{{$clothes[$i]->price}}</td>
                    <td><a href="{{route('clothes.edit', $clothes[$i]->id)}}" >Edit Cloth</a></td>
                    <td><a href="{{route('clothes.destroy', $clothes[$i]->id)}}" >Delete Cloth</a></td>

                </tr>
            @endfor

            </tbody>
        </table>




@endsection
