@extends('layouts.app')

@section('title','Clothes.com')

@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-6 mx-auto">
                <dl class="row fs-4">
                    <dt class="col-sm-3"><b>Name:</b></dt>
                    <dd class="col-sm-9">{{$clothes->type}}</dd><hr>
                    <dt class="col-sm-3"><b>Brand:</b></dt>
                    <dd class="col-sm-9">{{$clothes->brand}}</dd><hr>
                    <dt class="col-sm-3"><b>Color:</b></dt>
                    <dd class="col-sm-9">{{$clothes->color}}</dd><hr>
                    <dt class="col-sm-3"><b>Category:</b></dt>
                    <dd class="col-sm-9">{{$category->name}}</dd><hr>
                    <dt class="col-sm-3"><b>Price:</b></dt>
                    <dd class="col-sm-9">{{$clothes->price}} kzt.</dd><hr>
                </dl>
            </div>
        </div>
        <div class="col d-md-flex justify-content-center">
            @can('update',$clothes)
                <a href="{{route('clothes.edit', $clothes->id)}}" class="btn btn-outline-success mt-4"
                   style="letter-spacing: 2px">EDIT DESCRIPTION THIS CLOTHING</a><br><br>
            @endcan
</div>
        {{--@if (auth()->check())
            @if (auth()->user()->role == ('admin'))
                <form action="{{route('clothes.destroy',$clothes->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger mt-4" style="letter-spacing: 2px;position: relative;left: 50%;transform: translate(-50%, 0);" >Delete</button>
                </form>
            @elseif (auth()->user()->role == ('moderator'))
                <form action="{{route('clothes.destroy',$clothes->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger mt-4" style="letter-spacing: 2px;position: relative;left: 50%;transform: translate(-50%, 0);" >Delete</button>
                </form>
            @endif
        @endif
--}}



       @can('delete',$clothes)
            <form action="{{route('clothes.destroy',$clothes->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger mt-4" style="letter-spacing: 2px;position: relative;left: 50%;transform: translate(-50%, 0);" >Delete</button>
            </form>
        @endcan

        @auth
            <form action="{{route('clothes.cart',$clothes->id)}}" method="post">
                @csrf
                <div class="col-3">
                    <label for="number" class="form-label" style="position: relative;left: 50%;transform: translate(200%,50%);"><h4><b>Number:</b></h4></label>
                </div>
                <select name="number" style="position: relative;left: 50%;transform: translate(-50%, 0);">

                    @for($i=1;$i<=10;$i++)
                        <option {{$myCart==$i ? 'selected' : ''}} value="{{$i}}"> {{$i}}</option>
                    @endfor

                </select><hr>

                <div class="col-3">
                    <label for="size" class="form-label" style="position: relative;left: 50%;transform: translate(400%,50%);"><h4><b>Size:</b></h4></label>
                </div>
                <select name="size" style="position: relative;left: 50%;transform: translate(-50%, 0);">

                    <option value="not selected">not selected</option>
                    <option value="XS">XS</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                    <option value="XXXL">XXXL</option>

                </select><hr>


                <button class="btn btn-outline-info" style="letter-spacing: 2px;position: relative;left: 50%;transform: translate(-50%, 0);">Add to Cart</button><hr>
                <a href="{{route('cart.index', $clothes->id)}}" class="btn btn-outline-primary"
                   style="letter-spacing: 2px;position: relative;left: 50%;transform: translate(-50%, 0);">CHECK THE SHOPPING CART</a><br><br>
            </form>
            {{--<form action="{{route('clothes.uncart',$clothes->id)}}" method="post">
                @csrf
                <button class="btn btn-outline-info" style="letter-spacing: 2px;position: relative;left: 50%;transform: translate(-50%, 0);">Delete from cart</button><hr>
            </form>--}}
        @endauth

        <h2>Comments:</h2>
        <hr>
        <form action="{{route('comments.store')}}" method="post">
            @csrf
            <textarea name="content" rows="3"></textarea>
            <input type="hidden" name="clothes_id" value="{{$clothes->id}}">
            <button type="submit">Save</button>
        </form>

        <hr>
        @foreach($clothes->comments as $comment)
            <button style="border-radius: 5px;width: 350px;height: 40px; font-size: 14px; margin-left: 150px; margin-bottom: 15px" >{{$comment->content}}</button>
            <small>{{$comment->created_at}} | author:<b>{{$comment->user->name}}</b></small><hr>
            @can('update',$comment)
                <a href="{{route('comments.edit', $comment->id)}}" >Edit comment</a><br>
            @endcan

            @can('delete',$comment)
                <form action="{{route('comments.destroy',$comment->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="margin-bottom: 3px">Delete</button>
                    <hr>
                </form>
            @endcan

        @endforeach
</div>
@endsection
