@extends('Layout')
@section('header')
    @include('headerUser')
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
                    <th>User</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr class="bg-light text-dark">
                            <th>{{ $user->name }}</th>
                            <th>{{ $user->username }}</th>
                            <th>{{ $user->email??'-----' }}</th>
                            <th>{{ $user->phone_number??'-----' }}</th>
                            <th><a href="{{  url("users/$user->id")}}">Details</a> <a
                                    class="pl-2 ml-2 border-left"
                                    href="{{  url("users/$user->id/edit")}}">Edit</a>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $users->links() }}
                </div>
                <div class="text-right">
                    <a href="{{ url('users/create') }}">
                        <button class="btn btn-primary">Add New User</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

