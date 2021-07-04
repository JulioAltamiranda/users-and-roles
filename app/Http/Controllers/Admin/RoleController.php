<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
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
        return view('admin.roles.index', ['roles' => Role::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(['name' => 'required|max:150']);
        Role::create($data);
        return redirect()->route('admin.roles.create')->with('success', 'Changes saved!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $oldRole = $role;
        $data = $request->validate(['name' => 'required|max:150']);
        $role->update($data);
        return redirect()->route('admin.roles.edit', $oldRole)->with('success', 'Changes saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if (Role::first() == $role) {
            abort(403);
        }
        $role->delete();
        return redirect()->route('admin.roles.index')->with('success', 'Changes saved!');
    }
}
