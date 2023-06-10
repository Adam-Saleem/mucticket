@php($user = \Illuminate\Support\Facades\Auth::user())
@if($user->is_admin)
<div class="row mx-auto">
    <div class="col-md-12">
        <a href="{{ url('/users') }}" class="navbar-brand text-primary">All Users</a>
    </div>
</div>
@endif
