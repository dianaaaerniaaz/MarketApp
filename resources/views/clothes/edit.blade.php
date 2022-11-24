@extends('layouts.app')

@section('title','Clothes.com')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 mx-auto">
                <form action="{{route('clothes.update',$clothes->id)}}" method="post">

                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <div class="col-3">
                            <label for="inputType" class="form-label">Name:</label>
                        </div>
                        <div class="col-9">
                            <input type="text" class="form-control @error('type') is-invalid @enderror" id="inputType" name="type"
                                   value="{{$clothes->type}}">
                            @error('type')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3">
                            <label for="brand" class="form-label">Brand:</label>
                        </div>
                        <div class="col-9">
                            <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand" name="brand"
                                   value="{{$clothes->brand}}">
                            @error('brand')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3">
                            <label for="color" class="form-label">Color:</label>
                        </div>
                        <div class="col-9">
                        <input class="form-control @error('color') is-invalid @enderror" id="color"
                                  name="color" value="{{$clothes->color}}">
                            @error('color')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3">
                            <label for="category" class="form-label">Category:</label>
                        </div>
                        <div class="col-9">
                            <select name="category_id" id="category" class="form-control @error('category_id') is-invalid @enderror">
                                @foreach($categories as $cat)
                                    <option @if($cat->id == $clothes->category_id) selected
                                            @endif value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3">
                            <label for="price" class="form-label">Price:</label>
                        </div>
                        <div class="col-9">
                        <input class="form-control @error('price') is-invalid @enderror" id="content"
                                  name="price" value="{{$clothes->price}}">
                            @error('price')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col d-md-flex justify-content-md-end">
                        <button class="btn btn-outline-success mt-4"> U P D A T E</button>
                    </div>
                </form>
                <br>

            </div>
        </div>
    </div>
@endsection
