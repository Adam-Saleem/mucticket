@extends('Layout')
@section('header')
    @include('header')
@endsection
@section('contact')
    @php($user = \Illuminate\Support\Facades\Auth::user())
    <div class="content">
        <div class="card text-center">
            <div class="card-header">
                <h2>Ticket <span class="text-info">{{$ticket->id}}</span></h2>
            </div>
            <div class="card-body">
                <h3 class="card-title">Divece: {{$ticket->device}}, {{ $ticket->type }}</h3>
                <h6 class="text-muted">Floor: {{ $ticket->floor }}, Room: {{ $ticket->room }}{{$ticket->device_number?", Device Number: ".$ticket->device_number:'' }} </h6>
                <h4 class="card-text">{{$ticket->description}}</h4>
                <br>
                <h6 class="text-muted">Status: {{$ticket->status}} </h6>
                <h6 class="text-muted">Created by User: {{$ticket->user->name}} </h6>
                @if($user->is_admin)
                    <div class="d-flex justify-content-end">
                        @if($ticket->status == 'Open')
                            <form method="POST" action="{{ url("tickets/{$ticket->id}/in_process") }}">
                                {{ csrf_field() }}
                                <div class="m-2 text-right">
                                    <button type="submit" class="btn btn-warning">In Process</button>
                                </div>
                            </form>
                            <form method="POST" action="{{ url("tickets/{$ticket->id}/close") }}">
                                {{ csrf_field() }}
                                <div class="m-2 text-right">
                                    <button type="submit" class="btn btn-success">Closed</button>
                                </div>
                            </form>
                        @elseif($ticket->status == 'InProcess')
                            <form method="POST" action="{{ url("tickets/{$ticket->id}/open") }}">
                                {{ csrf_field() }}
                                <div class="m-2 text-right">
                                    <button type="submit" class="btn btn-dark">Open</button>
                                </div>
                            </form>
                            <form method="POST" action="{{ url("tickets/{$ticket->id}/close") }}">
                                {{ csrf_field() }}
                                <div class="m-2 text-right">
                                    <button type="submit" class="btn btn-success">Closed</button>
                                </div>
                            </form>
                        @elseif($ticket->status == 'Close')
                            <form method="POST" action="{{ url("tickets/{$ticket->id}/open") }}">
                                {{ csrf_field() }}
                                <div class="m-2 text-right">
                                    <button type="submit" class="btn btn-dark">Open</button>
                                </div>
                            </form>
                            <form method="POST" action="{{ url("tickets/{$ticket->id}/in_process") }}">
                                {{ csrf_field() }}
                                <div class="m-2 text-right">
                                    <button type="submit" class="btn btn-warning">In Process</button>
                                </div>
                            </form>
                        @endif
                    </div>
                @endif
                <a class="text-primary" href="{{  url("tickets/$ticket->id/edit")}}">Edit</a>
            </div>
            <div class="card-footer text-muted">
                <h6>{{ $ticket->created_at?"Created: ". \Carbon\Carbon::parse($ticket->created_at)->diffForHumans():'' }}</h6>
                <h6>{{ $ticket->closed_at?"Closed: ". \Carbon\Carbon::parse($ticket->closed_at)->diffForHumans():'Not Closed' }}</h6>
            </div>
        </div>
    </div>
@endsection
