<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ImpersonateController extends Controller
{
    public function index()
    {
        return view('admin.impersonate');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users'
        ]);

        $user = User::where('email', $request->email)->first();

        session()->put('impersonate', $user->id);

        return redirect('/home');
    }

    public function destroy()
    {
        session()->forget('impersonate');

        return redirect('/home');
    }
}
