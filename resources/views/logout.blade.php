@extends('master')

@section('title', 'Logout')

@section('content')

<div style="height:500px; width:500px" class="container border border-warning border-5 rounded-circle d-flex align-items-center">
    <span class="w-100 text-center">
        <h1>{{__('lang.Log Out Success!')}}</h1>
    </span>
</div>

@endsection
