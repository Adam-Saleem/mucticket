<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userAdmin = \Illuminate\Support\Facades\Auth::user();
        if (!$userAdmin->is_admin) {
            abort(403);
        }
        $users = User::simplePaginate(15);


        return view('user.index', compact('users'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {

        $newUser = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => $request->password,
            'email' => $request->email ?? null,
            'phone_number' => $request->phone_number ?? null,
            'is_admin' => $request->is_admin ?? 0
        ]);

        return redirect("/users/$newUser->id");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userAdmin = \Illuminate\Support\Facades\Auth::user();
        if (!$userAdmin->is_admin) {
            abort(403);
        }
        $user = new User();
        return view('user.create_edit', compact('user'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $userAdmin = \Illuminate\Support\Facades\Auth::user();
        if (!$userAdmin->is_admin && $userAdmin->id != $user->id) {
            abort(403);
        }
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $userAdmin = \Illuminate\Support\Facades\Auth::user();
        if (!$userAdmin->is_admin && $userAdmin->id != $user->id) {
            abort(403);
        }
        return view('user.create_edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $user->update([
            'name' => $request->name ?? $user->name,
            'username' => $request->username ?? $user->username,
            'password' => $request->password ?? $user->password,
            'email' => $request->email ?? null,
            'phone_number' => $request->phone_number ?? null,
            'is_admin' => $request->is_admin ?? 0
        ]);

        return redirect("users/$user->id");
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('users');
    }
}
