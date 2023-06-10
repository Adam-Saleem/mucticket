@extends('layout')

@section('contact')
    <div class="container py-6">
        <div class="row my-2">
            <div class="col-md-4 my-2">
                <a href="{{ url('/tickets') }}" class="btn btn-dark btn-lg btn-block">All Tickets</a>
            </div>
            <div class="col-md-4 my-2">
                <a href="{{ url('/in-process/tickets') }}" class="btn btn-dark btn-lg btn-block">Tickets in Progress</a>
            </div>
            <div class="col-md-4 my-2">
                <a href="{{ url('/history/tickets') }}" class="btn btn-dark btn-lg btn-block">Ticket History</a>
            </div>
        </div>
        @php($user = \Illuminate\Support\Facades\Auth::user())
        @if($user->is_admin)
            <div class="row my-2">
                <div class="col-md-4 my-2"></div>
                <div class="col-md-4 my-2">
                    <a href="{{ url('/users') }}" class="btn btn-dark btn-lg btn-block">All Users</a>
                </div>
                <div class="col-md-4 my-2"></div>
            </div>
        @else
            <div class="row my-2">
                <div class="col-md-4 my-2"></div>
                <div class="col-md-4 my-2">
                    <a href="{{ url("/users/$user->id") }}" class="btn btn-dark btn-lg btn-block">Show My Account</a>
                </div>
                <div class="col-md-4 my-2"></div>
            </div>
        @endif
    </div>

@endsection
