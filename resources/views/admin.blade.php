@extends('master')

@section('title', 'Account Maintenance')

@section('content')

@foreach ($users as $user)
    <div>

    </div>
    <div>

    </div>
@endforeach

<div class="container">
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th scope="col">{{__('lang.Account')}}</th>
                <th scope="col">{{__('lang.Action')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->first_name}} {{$user->last_name}} - {{$user->role->name}}</td>
                    <td>
                        <a href="/update/{{$user->id}}">{{__('lang.Update')}} {{__('lang.Role')}}</a>
                        <a href="/delete/{{$user->id}}">{{__('lang.Delete')}}</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>

@endsection
