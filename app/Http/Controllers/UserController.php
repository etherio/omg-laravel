<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
		$users = $user->where('id', '!=', auth()->user()->id)
	    ->orderBy('created_at', 'desc')
		->get();
		
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('auth.register', [
			'submit' => 'Create User', 
			'route' => route('users.store'),
		]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
	{
		if ($request->password != $request->password_confirm) {
		    return back()->withError('');
		}
		User::create([
		    'name' => $request->name,
		    'email' => $request->email,
		    'password' => Hash::make($request->password), 
		]); 
		return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if ($request->has('name') && $request->get('name') != $user->name) {
            $user->name = $request->name;
        }
        if ($request->has('email') && $request->get('email') != $user->email) {
            $user->email = $request->email;
            $user->email_verified_at = null;
        }
        $user->save();
        session()->flash('status', 'User has been updated');
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('status', 'User has been delete');
        return redirect(route('users.index'));
    }

    public function verify(User $user, $id)
    {
        $user = $user->find($id);
        if ($user && !$user->email_verified_at) {
            $user->email_verified_at = now();
            session()->flash('status', 'User has been verified');
            $user->save();
        } else {
            session()->flash('error', 'Uable to verify the  user');
        }
        return redirect(route('users.index'));
    }
}
