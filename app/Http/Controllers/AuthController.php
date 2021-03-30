<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Alert;

class AuthController extends Controller
{
    public function indexAdmin() {
        return view('admin.login');
    }

    public function authAdmin(Request $request) {
        Validator::validate($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $auth = Employee::where('email', $email)->first();

        if ($auth && Hash::check($password, $auth->password)) {
            session([
                'auth.admin' => [
                    'fullname' => $auth->fullname,
                    'email' => $auth->email,
                ],
            ]);
            return redirect()->route('admin.dashboard');
        } else {
            Alert::error('Login', 'Email or Password does not match');
            return redirect()->back();
        }
    }

    public function logoutAdmin() {
        session(['auth.admin' => []]);
        return redirect()->route('admin.login');
    }
}
