@extends('master')

@section('title', 'Login')

@section('content')

<div class="container">
<form action="/login" method="POST">
    @csrf
    <div class="mb-5">
        <h1>{{__('lang.Login')}}</h1>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Email:</label>
        <div class="col-sm-4">
            <input type="email" name="email" class="form-control" id="email">
        </div>
    </div>
    <div class="mb-5 row">
        <label for="password" class="col-sm-2 col-form-label">{{__('lang.Password')}}:</label>
        <div class="col-sm-4">
            <input type="password" name="password" class="form-control" id="password">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-6 text-center">
            <button type="submit" class="btn btn-warning col-sm-4">{{__('lang.Submit')}}</button>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 text-center">
            <a href="/register">{{__("lang.Don't have an account? click here to sign up")}}</a>
        </div>
    </div>
</form>
</div>



@endsection
