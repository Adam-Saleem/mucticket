@extends('layout')

@section('contact')
        <div class="container py-6">
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ url('/tickets') }}" class="btn btn-dark btn-lg btn-block">All Tickets</a>
                </div>
                <div class="col-md-4">
                    <a href="{{ url('/in-process/tickets') }}" class="btn btn-dark btn-lg btn-block">Tickets in Progress</a>
                </div>
                <div class="col-md-4">
                    <a href="{{ url('/history/tickets') }}"  class="btn btn-dark btn-lg btn-block">Ticket History</a>
                </div>
            </div>
        </div>

@endsection
