<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BoxController extends Controller
{
    public function index(){
        return view('customize.step_one');
    }

    public function second(){
        return view('customize.step_two');
    }
    public function third(){
        return view('customize.step_three');
    }

    public function faurth(){
        return view('customize.step_faur');
    }
}