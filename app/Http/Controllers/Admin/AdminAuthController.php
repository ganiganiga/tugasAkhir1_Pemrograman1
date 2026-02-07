<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->where('role', 'admin')->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'email' => 'Email atau password salah'
            ]);
        }

        session([
            'admin_logged_in' => true,
            'admin_id' => $user->id,
            'admin_name' => $user->name
        ]);

        return redirect('/admin/dashboard');
    }

    public function logout()
    {
        session()->flush();
        return redirect('login');
    }
}
