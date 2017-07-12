<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function index(){
        $userDetails=array('Name'=>'User');
        return view('forms.index')->with($userDetails);
    }
    public function register(){
        $name='Nadeem Shadan';
        return view('forms.Register')->with('vue',$name);
    }
    public function services(){
        return view('forms.services');
    }


}
