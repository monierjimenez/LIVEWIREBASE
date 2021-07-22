<?php

namespace App\Http\Controllers\admin;

use App\Role;
use App\Http\Requests\StoreRoleRequest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RolesController extends Controller
{
    public function index()
    {
        if ( !in_array('PRV', explode(".", auth()->user()->permissions)) )
            return redirect()->route('admin')->with('flasherror', 'Permissions denied to perform this operation, contact the administrator.');

        $roles = Role::all();
    	return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        if ( !in_array('PRE', explode(".", auth()->user()->permissions)) )
            return redirect()->route('admin')->with('flasherror', 'Permissions denied to perform this operation, contact the administrator.');
        return view('admin.roles.create');
    }

    public function store(StoreRoleRequest $request)
    {
        $role = Role::create([
            'name' => $request->name,
            'url' => Str::slug($request->name),
            'permissions' => updaterights($request->permissions),
        ]);
        generaRecords('Role created', 'Role has been created successfully, for '. auth()->user()->name .'.');
        return redirect()->route('admin.roles.index')->with('flash', 'Role has been created successfully.');
    }

    public function show(Role $role)
    {
        if ( !in_array('PRV', explode(".", auth()->user()->permissions)) )
            return redirect()->route('admin')->with('flasherror', 'Permissions denied to perform this operation, contact the administrator.');

        return view('admin.roles.show', compact('role'));
    }

    public function edit(Role $role)
    {
        if ( !in_array('PRE', explode(".", auth()->user()->permissions)) )
            return redirect()->route('admin')->with('flasherror', 'Permissions denied to perform this operation, contact the administrator.');

        return view('admin.roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $rules = [
            'name' => 'required',
        ];
        $role->permissions = updaterights($request->permissions);
        $role->save();

        $data = $request->validate($rules);
        $role->update($data) ;
        generaRecords('Role updated', 'Role successfully updated, for '. auth()->user()->name .'.');
        return back()->with('flash', 'Role successfully updated.');
    }

    public function destroy(Role $role)
    {
        //$role->delete();
        return redirect()->route('admin.roles.index')->with('flash', 'Role has been successfully removed.');
    }
}
