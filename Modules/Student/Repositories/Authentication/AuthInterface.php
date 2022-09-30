<?php

namespace Modules\Student\Repositories\Authentication;

interface AuthInterface {
    
    public function register($request);
    public function login($request , $guard);
    public function logout($request , $guard);
}


