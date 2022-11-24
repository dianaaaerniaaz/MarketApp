@extends('layouts.app')

@section('title','Clothes.com')

@section('content')


        <hr>
        <h2>Comments:</h2>
        <hr>
        <form action="{{route('comments.update', $comment->id)}}" method="post">
            @csrf
            @method('PUT')

            Content:<textarea name ="content" cols="30" rows ="10">{{$comment->content}}</textarea>
            <button type="submit">Edit</button>
        </form>
    </div>
@endsection



{{--<!DOCTYPE html>
<html lang="{{ str_replace('_','-' ,app()->getLocale())}}">
<head>
    <meta charset="utf-8">
    <title>Comment</title>
</head>
<body>
<a href="{{route('clothes.show',$clothes->id)}}">Go to Show Page </a>
<form action="{{route('comments.update', $comment->id)}}" method="post">
    @csrf
    @method('PUT')

    Content:<textarea name ="content" cols="30" rows ="10">{{$comment->content}}</textarea>
    <button type="submit">Edit</button>
</form>
</body>
</html>--}}
