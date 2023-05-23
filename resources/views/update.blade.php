@extends('master')

@section('title', 'Account Maintenance')

@section('content')

<div class="container">
    <form action="/update/{{$user->id}}" method="POST">
        @csrf
        <div class="mb-3 row">
            <h5>{{$user->first_name}} {{$user->last_name}}</h5>
        </div>
        <div class="mb-3 row">
            <label for="role" class="col-sm-2 col-form-label me-3">{{__('lang.Role')}}:</label>
            <div class="col-sm-4">
                <select name="role" id="role" class="col-12 p-2 border-secondary rounded">
                    @foreach ($roles as $role)
                        @if($user->role == $role)
                            <option value="{{$role->id}}" selected>{{$role->name}}</option>
                            @else
                            <option value="{{$role->id}}">{{$role->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row m-5">
            <div class="col-sm-6 text-center">
                <button type="submit" class="btn btn-warning col-sm-4">{{__('lang.Save')}}</button>
            </div>
        </div>
    </form>
</div>

@endsection
