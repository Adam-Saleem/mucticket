@extends('Layout')
@section('header')
    @include('headerUser')
@endsection
@section('contact')
    <div class="content">
        <div class="card card-user">
            <div class="card-header">
                @if( $user->exists)
                    <h5 class="card-title">Edit User <span class="text-info">{{ $user->name }}</span> Record</h5>
                @else
                    <h5 class="card-title">Add New User</h5>
                @endif
            </div>
            <div class="card-body">
                @if( $user->exists)
                    <form method="POST" action="{{ url("users/$user->id") }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        @else
                            <form method="POST" action="{{ url("users") }}">
                                {{ csrf_field() }}
                                @endif

                                <div class="row">
                                    <div class="col-md-6 col-sm-12 my-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                               value="{{ $user->exists?$user->name:old('name') }}" required>
                                    </div>
                                    <div class="col-md-6 col-sm-12 my-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username"
                                               value="{{ $user->exists?$user->username:old('username') }}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 my-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                               value="{{ $user->exists?$user->email:old('email') }}">
                                    </div>
                                    <div class="col-md-6 col-sm-12 my-3">
                                        <label for="phone_number" class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                                               value="{{ $user->exists?$user->phone_number:old('phone_number') }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 my-3">
                                        <label for="password" :value="__('Password')">Password</label>
                                        @if($user->exists)
                                            <input id="password" class="form-control"
                                                   type="password"
                                                   name="password"
                                                   autocomplete="new-password"/>
                                        @else
                                            <input id="password" class="form-control"
                                                   type="password"
                                                   name="password"
                                                   required autocomplete="new-password"/>
                                        @endif
                                    </div>
                                    <div class="col-md-6 col-sm-12 my-3">
                                        <label for="password_confirmation" :value="__('Confirm Password')">Password
                                            Confirmation</label>
                                        @if($user->exists)
                                            <input id="password_confirmation" class="form-control"
                                                   type="password"
                                                   name="password_confirmation"/>
                                        @else
                                            <input id="password_confirmation" class="form-control"
                                                   type="password"
                                                   name="password_confirmation" required/>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-check">
                                    @if( $user->exists)
                                        @if($user->is_admin)
                                            <label class="form-check-label" for="mySwitch">Have Admin
                                                Permission?</label>
                                            <input class="form-check-input" type="checkbox" id="is_admin"
                                                   name="is_admin" value="1" checked>
                                        @endif
                                    @else
                                        <label class="form-check-label" for="mySwitch">Have Admin Permission?</label>
                                        <input class="form-check-input" type="checkbox" id="is_admin" name="is_admin"
                                               value="1">
                                    @endif
                                </div>
                                <div>
                                    @include('layouts.errors')
                                </div>
                                <div class="mb-3 text-right">
                                    <button type="submit"
                                            class="btn btn-primary">{{ $user->exists?'Update':'Add User'}}</button>
                                </div>
                            </form>
                            @if( $user->exists)
                                @if($user->is_admin)
                                    <form method="POST" action="{{ url("users/{$user->id}") }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <div class="mb-3 text-right">
                                            <button type="submit" class="btn btn-danger">Delete User</button>
                                        </div>
                                    </form>
                @endif
                @endif
            </div>
        </div>
    </div>
@endsection

