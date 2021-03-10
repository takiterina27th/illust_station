<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    
    public function show($id) {

        $user = Auth::user();

        return view('users.show', compact('user'));

    }
    
    public function edit() {

        $user = Auth::user();

        return view('users.edit', compact('user'));

    }

    public function update(Request $request, $id) {

    }

    public function destroy($id)
    {

    }
}
