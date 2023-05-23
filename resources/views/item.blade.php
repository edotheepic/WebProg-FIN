@extends('master')

@section('title', 'Item Detail')

@section('content')

<div class="container">
    <div class="col-3 text-center"><h5>{{$item->name}}</h5></div>
    <div class="row">
        <div class="col-3">
            <img src="{{ asset("storage/images/default.png") }}" class="img-thumbnail rounded-circle" alt="">
        </div>
        <div class="col-5">
            <div>{{__('lang.Price')}}: Rp. {{$item->price}}</div>
            <br>
            <div>{{$item->desc}}</div>
            <br>
            <div class="">
                <form action="/buyItem/{{$item->id}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary">{{__('lang.Buy')}}</button>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection
