@extends('master')

@section('title', 'Profile')

@section('content')

<form action="/saveProfile" method="POST" enctype="multipart/form-data">
    @csrf
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-3">
            <img src="{{ asset("storage/images/" . $user->display_picture) }}" class="img-thumbnail rounded" alt="Your Profile Picture">
        </div>
        <div class="col-9">
            <div class="row mb-3">
                <label for="first_name" class="col-sm-2 col-form-label me-3">{{__('lang.First Name')}}:</label>
                <div class="col-sm-3">
                    <input type="text" name="first_name" class="form-control" id="first_name" value="{{$user->first_name}}">
                </div>
                <div class="col-1"></div>
                <label for="last_name" class="col-sm-2 col-form-label me-3">{{__('lang.Last Name')}}:</label>
                <div class="col-sm-3">
                    <input type="text" name="last_name" class="form-control" id="last_name" value="{{$user->last_name}}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label me-3">Email:</label>
                <div class="col-sm-3">
                    <input type="email" name="email" class="form-control" id="email" value="{{$user->email}}">
                </div>
                <div class="col-1"></div>
                <label for="role" class="col-sm-2 col-form-label me-3">{{__('lang.Role')}}:</label>
                <div class="col-sm-3">
                    <input type="text" name="role" class="form-control" id="role" value="{{$user->role->name}}" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label for="gender" class="col-sm-2 col-form-label me-3">{{__('lang.Gender')}}:</label>
                <div class="col-sm-3">
                    @foreach ($genders as $gender)
                        @if ($user->gender == $gender)
                            <input type="radio" name="gender" id="{{$gender->id}}" value="{{$gender->id}}" checked> <label for="{{$gender->id}}">{{$gender->desc}}</label>
                        @else
                            <input type="radio" name="gender" id="{{$gender->id}}" value="{{$gender->id}}"> <label for="{{$gender->id}}">{{$gender->desc}}</label>
                        @endif
                    @endforeach
                </div>
                <div class="col-1"></div>
                <label for="display_picture" class="col-sm-2 col-form-label me-3">{{__('lang.Display Picture')}}:</label>
                <div class="col-sm-3">
                    <input type="file" name="display_picture" class="form-control" id="display_picture">
                </div>
            </div>
            <div class="row mb-5">
                <label for="password" class="col-sm-2 col-form-label me-3">{{__('lang.Password')}}:</label>
                <div class="col-sm-3">
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="col-1"></div>
                <label for="password_confirmation" class="col-sm-2 col-form-label me-3">{{__('lang.Confirm Password')}}:</label>
                <div class="col-sm-3">
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-warning col-3">{{__('lang.Save')}}</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
