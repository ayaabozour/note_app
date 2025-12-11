<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Users::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            ['name'=>'required|string|max:255',
              'email'=>'required|email|unique:users,email',
              'password'=>'required|min:8'
            ]
        );
        
        return Users::create($data);
        return response()-> json($note,201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Users::findOrFial($id);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
      $user = Users:: findOrFail($id);

      $data = $request->validate([
        'name'=> 'sometimes|string|max:255',
        'email'=> 'sometimes|email|unique:users,email,{$id}',
        'password'=>'sometimes|min:8',
      ]);

      $user->update($data);
      return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user= Users::findOrFail($id);
        $user->delete();
        return response()->json(['message'=> 'User deleted successfully']);
    }
}
