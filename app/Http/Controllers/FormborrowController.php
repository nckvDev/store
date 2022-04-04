<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormborrowController extends Controller
{
    function index(){
        return view('user.form.index');
    }
}