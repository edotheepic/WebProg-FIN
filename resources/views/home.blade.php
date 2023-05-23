@extends('master')

@section('title', 'Home')

@section('content')

<div class="container text-center">
    <div class="row justify-content-center d-flex">
        @foreach ($items as $item)
        <div class="col-2 m-1">
            <img src="{{ asset("storage/images/default.png") }}" class="img-thumbnail rounded-circle" alt="">
            <div>{{$item->name}}</div>
            <a href="/item/{{$item->id}}">{{__('lang.Details')}}</a>
        </div>
        @endforeach
    </div>
</div>

<div class="d-flex justify-content-center align-items-center">
    {{ $items->links() }}
</div>

@endsection
