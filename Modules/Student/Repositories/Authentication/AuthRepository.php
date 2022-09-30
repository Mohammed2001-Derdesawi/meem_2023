<?php

namespace Modules\Student\Repositories\Authentication;

use Illuminate\Support\Facades\Auth;
use Modules\Student\Entities\Student\Student;

class AuthRepository implements AuthInterface {

    public function register($request) {
        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
            'gender' => $request->gender,
        ]);
        // return to view
    }


    public function login($request , $guard) {
        $remmber_me = $request->has('remmber_me') ? true : false;
        if (Auth::guard($guard)->attempt(['phone' => $request->phone , 'password' => $request->password] , $remmber_me)) {
            // return to dashboard home
        }
        return redirect()->route('student.ShowLogin');
    }


    public function logout($request , $guard) {
        Auth::guard($guard)->logout();
        $request->session()->invalidate();
        return redirect()->route('student.ShowLogin');
    }
}


