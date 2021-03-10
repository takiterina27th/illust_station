<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function show($id) {

        $user = Auth::user();

        return view('users.show', ['user' => $user]);

    }
    
    public function edit() {

        return view('users.edit');

    }

    public function update(Request $request, $id) {

    }

    public function destroy($id)
    {

    }
}
