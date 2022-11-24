@extends('layouts.app')

@section('title','Cart.com')

@section('content')
    <h1>Cart page</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Brand</th>
            <th scope="col">Price</th>
            <th scope="col">Number</th>
            <th scope="col">Size</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>

        </tr>
        </thead>
        <tbody>
        @for($i=0;$i<count($clothes);$i++)
            <tr>
                <th scope="row">{{$i+1}}</th>
                <td>{{$clothes[$i]->type}}</td>
                <td>{{$clothes[$i]->brand}}</td>
                <td>{{$clothes[$i]->price}}</td>
                <td>{{$clothes[$i]->pivot->number}}</td>
                <td>{{$clothes[$i]->pivot->size}}</td>
                <td>
                    <a class="btn btn-outline-primary" href="{{route('clothes.show', $clothes[$i])}}">Update</a>
                </td>
                <td>
                    <form action="{{route('clothes.uncart', $clothes[$i])}}" method="post">
                        @csrf
                        <button style="float:left;" class="btn btn-outline-danger" type="submit">Delete from Cart</button>
                    </form>
                </td>
                {{--<td><a href="{{route('adm.users.edit', $users[$i]->id)}}" >Edit User</a></td>--}}
            </tr>
        @endfor

        </tbody>
    </table>
@endsection

