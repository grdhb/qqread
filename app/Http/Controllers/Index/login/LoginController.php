<?php

namespace App\Http\Controllers\Index\login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function logins()
    {
        return view('index.login.login');
    }
}
