<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        // Load the view and pass the users
        if(Gate::denies('logged-in')) {
            return redirect()->route('login');
        }

        if(Gate::allows('is-admin')) { return view('admin.users.index',[ 'users' => User::paginate(10),  'roles' => Role::all() ]);
        }

        return view('index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create',[
            'roles' => Role::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {

        $newUser = new CreateNewUser();
        // $user = $newUser->create($request->all());
        $user = $newUser->create($request->only('name', 'email', 'password', 'password_confirmation'));

        $user->roles()->sync($request->roles);

        $request->session()->flash('success', 'User created successfully.');

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('admin.users.edit',[
            'roles' => Role::all(),
            'user' => User::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if(!$user ) {
            $request->session()->flash('error', 'User can not be edited.');
            return redirect()->route('admin.users.index');
        }

        $user->update($request->except(['_token','_method','roles']));

        $user->roles()->sync($request->roles);

        $request->session()->flash('success', 'User updated successfully.');

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        //Delete the user
        User::destroy($id);
        $request->session()->flash('success', 'User deleted successfully.');
        // return to users view
        return redirect()->route('admin.users.index');
    }
}
