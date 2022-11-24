@extends('layouts.adm')

@section('title','Edit the role page')
@section('name')
    <div class="sidebar-brand-text mx-3">SB Admin </div>
@endsection
@section('content')
    <h1>Edit the role page</h1>

    <div class="container mt-5">
        <div class="row">
            <div class="col-6 mx-auto">
                <dl class="row fs-4">
                    <dt class="col-sm-3"><b>Name:</b></dt>
                    <dd class="col-sm-9">{{$user->name}}</dd><hr><hr>
                    <dt class="col-sm-3"><b>Email:</b></dt>
                    <dd class="col-sm-9">{{$user->email}}</dd><hr>
                    <form action="{{route('adm.users.update',$user->id)}}" method="post">

                        @csrf
                        @method('PUT')
                        <div class="row mb-3">

                            <dt class="col-sm-3" style="font-size: xx-large; color:black;"><b>Role:</b></dt>

                            <div class="col-9">
                                <dd class="col-sm-9" style="font-size: xx-large; color:black;">
                                    <select name="role_id" id="role" class="form-control ">
                                        @foreach($role as $rol)
                                            <option @if($rol->id == $user->role_id) selected
                                                    @endif value="{{$rol->id}}">{{$rol->name}}</option>
                                        @endforeach
                                    </select>
                                </dd><hr>
                            </div>
                        </div>
                        <div>
                            <button> U P D A T E</button>
                        </div>

                </dl>
            </div>
        </div>
    </div>


    {{--<table class="table">
        <thead>
        <tr>

            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>

        </tr>
        </thead>
        <tbody>

            <tr>

                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role->name}}</td>


            </tr>


        </tbody>
    </table>--}}

@endsection
