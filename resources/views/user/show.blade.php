@extends('Layout')
@section('header')
    @include('headerUser')
@endsection
@section('contact')
    <div class="content">
        <div class="card text-center">
            <div class="card-header">
                <h2>User <span class="text-info">{{$user->name}}</span></h2>
            </div>
            <div class="card-body">
                <h3 class="card-title">username: {{$user->username}}</h3>
                <h5 class="card-title">Email: {{$user->email??'-----'}}</h5>
                <h5 class="card-title">Phone Number: {{$user->phone_number??'-----'}}</h5>
                <h5 class="card-title">Permission: {{$user->is_admin?'Admin':'Employee'}}</h5>
                <br>
                <a class="text-primary" href="{{  url("users/$user->id/edit")}}">Edit</a>
            </div>
            <div class="card-footer text-muted">
                <h6>{{ $user->created_at?"User Add to System: ". \Carbon\Carbon::parse($user->created_at)->diffForHumans():'' }}</h6>
            </div>
        </div>
    </div>
@endsection
