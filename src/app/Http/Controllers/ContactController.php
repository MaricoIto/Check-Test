<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    function register()
    {
        return view('register');
    }

    function login()
    {
        return view('login');
    }

    function admin()
    {
        return view('admin');
    }
}
