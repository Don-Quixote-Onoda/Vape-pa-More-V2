<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();

        return $users;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $this->validate($request, [
                'firstname' => ['required', 'string', 'max:255'],
                'lastname' => ['required', 'string', 'max:255'],
                'sex' => 'required',
                'birthdate' => 'required',
                'phone_number' => 'required',
                'role' => 'required',
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
            ]);

            $user = User::create([
                'firstname' => $request['firstname'],
                'lastname' => $request['lastname'],
                'sex' => $request['sex'],
                'birthdate' => $request['birthdate'],
                'address' => $request['address'],
                'phone_number' => $request['phone_number'],
                'username' => $request['username'],
                'role' => $request['role'],
                'email' => $request['email'],
                'password' => bcrypt($request['password'])
            ]);

            return ['success' => 1, 'result' => $user];

        } catch (\Throwable $th) {
            return ['error' => 0];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

        try {

            $this->validate($request, [
                'firstname' => ['required', 'string', 'max:255'],
                'lastname' => ['required', 'string', 'max:255'],
                'sex' => 'required',
                'birthdate' => 'required',
                'phone_number' => 'required',
                'role' => 'required',
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'string', 'min:8'],
            ]);

            $user = User::find($id);

            $user->update([
                'firstname' => $request['firstname'],
                'lastname' => $request['lastname'],
                'sex' => $request['sex'],
                'birthdate' => $request['birthdate'],
                'address' => $request['address'],
                'phone_number' => $request['phone_number'],
                'username' => $request['username'],
                'role' => $request['role'],
                'email' => $request['email'],
                'password' => bcrypt($request['password'])
            ]);

            return ['success' => 1, 'result' => $user];

        } catch (\Throwable $th) {
            return $th;
            return ['error' => 0];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return ['success' => 1, $user];
    }
}
