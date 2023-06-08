@extends('Layout')
@section('header')
        @include('header')
@endsection
@section('contact')
    <div class="content">
        <div class="card card-user">
            <div class="card-header">
                @if( $ticket->exists)
                    <h5 class="card-title">Edit Ticket <span class="text-info">{{ $ticket->id }}</span> Record</h5>
                @else
                    <h5 class="card-title">Add New Ticket</h5>
                @endif
            </div>
            <div class="card-body">
                @if( $ticket->exists)
                    <form method="POST" action="{{ url("tickets/$ticket->id") }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        @else
                            <form method="POST" action="{{ url("tickets") }}">
                                {{ csrf_field() }}
                                @endif

                                <div class="mb-3 row">
                                    <div class="col-4">
                                        <label for="floor" class="form-label">Floor</label>
                                        <input type="number" class="form-control" id="floor" name="floor" min="-3"
                                               value="{{ $ticket->exists?$ticket->floor:old('floor') }}" required>
                                    </div>
                                    <div class="col-4">
                                        <label for="room" class="form-label">Room</label>
                                        <input type="number" class="form-control" id="room" name="room" min="1"
                                               value="{{ $ticket->exists?$ticket->room:old('room') }}" required></div>
                                    <div class="col-4">
                                        <label for="device_number" class="form-label">Device Number</label>
                                        <input type="number" class="form-control" id="device_number"
                                               name="device_number" min="1"
                                               value="{{ $ticket->exists?$ticket->device_number:old('device_number') }}">
                                    </div>

                                </div>

                                <div class="mb-3 row">
                                    <div class="col-6">
                                        <label for="device" class="form-label">Device</label>
                                        <br>
                                        <select class="custom-select" name="device" id="device" required>
                                            @if($ticket->device)
                                                <option class="text-secondary" value="{{$ticket->device}}"
                                                        disabled selected>{{$ticket->device}}</option>
                                            @else
                                                <option class="text-secondary" disabled selected>Device</option>
                                            @endif
                                            <option value="Computer">Computer</option>
                                            <option value="Printer">Printer</option>
                                            <option value="Camera">Camera</option>
                                            <option value="Projector">Projector</option>

                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="type" class="form-label">Type</label>
                                        <br>
                                        <select class="custom-select" name="type" id="type">
                                            @if($ticket->type)
                                                <option class="text-secondary" value="{{$ticket->type}}"
                                                        disabled selected>{{$ticket->type}}</option>
                                            @else
                                                <option class="text-secondary" disabled selected>Type</option>
                                            @endif
                                            <option value="Hardware">Hardware</option>
                                            <option value="Software">Software</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea type="text" class="form-control" id="description"
                                              name="description">{{ $ticket->exists?$ticket->description:old('description') }}</textarea>
                                </div>
                                <div class="mb-3 w-50">
                                    <label for="priority" class="form-label">Priority</label>
                                    <br>
                                    <select class="custom-select" name="priority" id="priority">
                                        @if($ticket->priority)
                                            <option class="text-secondary" value="{{$ticket->priority}}"
                                                    disabled selected>{{$ticket->priority}}</option>
                                        @else
                                            <option class="text-secondary" disabled selected>Priority</option>
                                        @endif
                                        <option value="High">High</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Low">Low</option>
                                    </select>
                                </div>
                                <div class="mb-3 text-right">
                                    <button type="submit"
                                            class="btn btn-primary">{{ $ticket->exists?'Update':'Add Ticket'}}</button>
                                </div>
                                <div>
                                    @include('layouts.errors')
                                </div>
                            </form>
                            @if( $ticket->exists)
                                <form method="POST" action="{{ url("tickets/{$ticket->id}") }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <div class="mb-3 text-right">
                                        <button type="submit" class="btn btn-danger">Delete recorde</button>
                                    </div>
                                </form>
                @endif
            </div>
        </div>
    </div>
@endsection

