<?php

namespace App\Http\Controllers\admin;

use App\User;
use App\Role;

use Illuminate\Validation\Rule;
use App\Http\Requests\StoreUserRequest;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Artisan;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( !in_array('PUV', explode(".", auth()->user()->permissions)) )
            return redirect()->route('admin')->with('flasherror', 'Permissions denied to perform this operation, contact the administrator.');

        //return back()->with('flasherror', 'Permissions denied.');
        $users = User::all();
    	return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ( !in_array('PUE', explode(".", auth()->user()->permissions)) )
            return redirect()->route('admin')->with('flasherror', 'Permissions denied to perform this operation, contact the administrator.');

        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $rol = Role::find($request->role) ;
        $user = (new User)->fill($request->all());
        //$user = User::create($request->all());
        if( $request->hasFile('avatar') )
            $user->avatar = $request->file('avatar')->store('avatar');

        $user->permissions = $rol->permissions ;
        $user->save();
        return redirect()->route('admin.users.index')->with('flash', 'User has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //$foto = $user->photos;
        if ( !in_array('PUV', explode(".", auth()->user()->permissions)) )
            return redirect()->route('admin')->with('flasherror', 'Permissions denied to perform this operation, contact the administrator.');

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //return auth()->user()->permissions;
        if ( !in_array('PUE', explode(".", auth()->user()->permissions)) )
            return redirect()->route('admin')->with('flasherror', 'Permissions denied to perform this operation, contact the administrator.');

        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required',
            'email' => ['required', Rule::unique('users')->ignore($user->id)],
            'phone' => 'required|numeric',
            'role' => 'required',
        ];

        if ( $request->role != $user->role ) {
            $rol = Role::find($request->role);
            $user->permissions = $rol->permissions;
        }else {
            $user->permissions = updaterights($request->permissions);
            $user->save();
        }

        //Artisan::call('cache:clear');
        if( $request->filled('password'))
        {
            $rules['password'] = ['confirmed', 'min:5'];
        }
        //return $request;
        if( $request->hasFile('avatar') )
		 {
			if ( $user->avatar != '' && $user->avatar != 'unnamed.jpg'){
				unlink(public_path().'/images/'.$user->avatar);
			}
			$file = $request->file('avatar');

			$nombrearchivo  = time().'-'.$file->getClientOriginalName();
            $file->move(public_path().'/images/avatar', $nombrearchivo);
            $user->avatar = 'avatar/'.$nombrearchivo;
            $user->save();
		 }
        $data = $request->validate($rules);

        $user->update($data) ;
        $user->password = bcrypt($request->password);
        return back()->with('flash', 'User has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('flash', 'User has been successfully removed.');
    }
}
