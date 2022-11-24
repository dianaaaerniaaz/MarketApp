@extends('layouts.app')

@section('title','Clothes.com')

@section('content')

    <div class="container mt-5">
        <div class="col-9 mx-auto">
            @can('create',\App\Models\Clothes::class)
                <a href="{{route('clothes.create')}}" class="lead">Go to create page</a><br><br>
            @endcan
            @isset($clothes)
                <div class="row g-4">
                    @foreach($clothes as $cloth)
                        <div class="col-4">
                            <div class="card d-inline-flex w-100 shadow-sm">
                                <div class="card-header bg-white">
                                    <h3 class="text-black text-center text-decoration-none">{{$cloth->type}}</h3>
                                    <h5 class="text-black text-center text-decoration-none"><b>{{$cloth->brand}}</b> </h5>


                                </div>

                                <div class="card-footer bg-white fw-bold text-center">
                                    {{$cloth->price}} kzt.
                                    <div>
                                        <a href="{{route('clothes.show', $cloth->id)}}" class="mt-2">Подробнее</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endisset
        </div>
    </div>
@endsection

