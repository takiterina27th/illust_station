<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function show($id) {

        return view('users.show');

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
