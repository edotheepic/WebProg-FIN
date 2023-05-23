@extends('master')

@section('title', 'Check Out')

@section('content')

<div style="height:500px; width:500px" class="container border border-warning border-5 rounded-circle d-flex align-items-center">
    <span class="w-100 text-center">
        <h1>{{__('lang.Saved!')}}</h1>
        <a href="/home">{{__("lang.Click here to 'Home'")}}</a>
    </span>
</div>

@endsection
