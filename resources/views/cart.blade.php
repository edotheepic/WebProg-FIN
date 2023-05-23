@extends('master')

@section('title', 'Cart')

@section('content')

<div class="container">
    <h1>{{__('lang.Cart')}}</h1>
        @foreach ($items as $item)
            <div class="row justify-content-center d-flex align-items-center mb-1 text-center">
                <div class="col-1">
                    <img src="{{ asset("storage/images/default.png") }}" class="img-thumbnail rounded-circle" alt="">
                </div>
                <div class="col-3">{{$item->name}}</div>
                <div class="col-3">Rp. {{$item->price}}</div>
                <div class="col-3"><a href="/removeCart/{{$item->id}}">{{__('lang.Delete')}}</a></div>
            </div>
        @endforeach


    <div class="col-10 mt-5 justify-content-end d-flex align-items-center">
        {{__('lang.Total Price')}}: Rp. {{$total}}

        <form action="/checkout" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary m-2">{{__('lang.Check Out')}}</button>
        </form>
    </div>
</div>

@endsection
