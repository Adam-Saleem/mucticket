@extends('Layout')
@section('header')
    @include('header')
@endsection
@section('contact')
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tickets Table</h4>
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped">
                    <thead class="text-primary">
                    <th>Ticket id</th>
                    <th>Status</th>
                    <th>Priority</th>
                    <th>Device</th>
                    <th>Type</th>
                    <th>Closed_at</th>
                    <th>Actions</th>
                    </thead>
                    <tbody>
                    @foreach($tickets as $ticket)
                        @if($ticket->status == 'Open')
                            <tr class="bg-secondary text-light">
                        @elseif($ticket->status == 'Close')
                            <tr class="bg-success">
                        @elseif($ticket->status == 'InProcess')
                            <tr class="bg-warning text-light">
                                @endif
                                <th>{{ $ticket->id }}</th>
                                <th>{{ $ticket->status }}</th>
                                <th>{{ $ticket->priority }}</th>
                                <th>{{ $ticket->device }}</th>
                                <th>{{ $ticket->type }}</th>
                                <th>{{ $ticket->closed_at?\Carbon\Carbon::parse($ticket->closed_at)->diffForHumans():'Not Closed' }}</th>
                                <th><a class="text-light" href="{{  url("tickets/$ticket->id")}}">Details</a> <a
                                        class="text-light pl-2 ml-2 border-left" href="{{  url("tickets/$ticket->id/edit")}}">Edit</a>
                                </th>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $tickets->links() }}
                </div>
                <div class="text-right">
                    <a href="{{ url('tickets/create') }}">
                        <button class="btn btn-primary">Add New Ticket</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

