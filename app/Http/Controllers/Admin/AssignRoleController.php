<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AssignRoleController extends Controller
{
    /**
     * Se inicializa en el constructor un 
     * middleware para proteger los metodos del controlador excepto el metodo index.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('checkRoles:admin')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = [];
        foreach (User::all() as $user) {
            if (count($user->roles)) {
                $users[] = $user;
            }
        }
        return view('admin.assign-roles.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.assign-roles.create', ['users' => User::all(), 'roles' => Role::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(['user_id' => 'required', 'roles' => 'required']);
        $user = User::findOrFail($data['user_id']);
        $user->roles()->sync($data['roles']);
        return redirect()->route('admin.assign-roles.create')->with('success', 'Changes saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $users = User::all();
        $roles = Role::all();

        return view('admin.assign-roles.edit', compact('users', 'roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate(['user_id' => 'required', 'roles' => 'required']);
        $user = User::findOrFail($data['user_id']);
        $user->roles()->sync($data['roles']);
        return redirect()->route('admin.assign-roles.edit', $user)->with('success', 'Changes saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (User::first() == $user) {
            abort(403);
        }
        $user->roles()->detach();
        return redirect()->route('admin.assign-roles.index')->with('success', 'Changes saved!');
    }
}
