<?php

namespace Modules\Student\Http\Controllers\Authentication;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Request;
use Modules\Student\Http\Requests\Authentication\AuthLoginRequest;
use Modules\Student\Http\Requests\Authentication\AuthRegisterRequest;
use Modules\Student\Repositories\Authentication\AuthInterface;

class AuthController extends Controller
{
    private $AuthRepo;
    public function __construct(AuthInterface $AuthRepo)
    {
        $this->AuthRepo = $AuthRepo;
    }
    
    public function ShowRegister() {
        // return to view
    }

    public function register(AuthRegisterRequest $request) {
        $this->AuthRepo->register($request);
    }


    public function ShowLogin() {
        // return to view
    }

    public function login(AuthLoginRequest $request) {
        $this->AuthRepo->login($request , 'student');
    }


    public function logout(Request $request) {
        $this->AuthRepo->logout($request , 'student');
    }
}
