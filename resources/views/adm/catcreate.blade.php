@extends('layouts.adm')

@section('title','Users page')
@section('name')
    <div class="sidebar-brand-text mx-3">SB Adm&Mod </div>
@endsection
@section('content')
    <h1>Category Create page</h1>
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 mx-auto">

                <form action="{{route('adm.categories.store')}}" method="post" class="needs-validation" novalidate>
                    @csrf
                    <div class="row mb-3">
                        <div class="col-3">
                            <label for="inputType" class="form-label">Category Name:</label>
                        </div>
                        <div class="col-9">
                            <input type="text" class="form-control" id="inputType" name="name" placeholder="Category name..">

                        </div>



                    <div class="col d-md-flex justify-content-md-end">
                        <button class="btn btn-outline-success mt-4"> C R E A T E</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
