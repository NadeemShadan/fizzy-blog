<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tress;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $postCount=Tress::where('user_id',1)->get()->count();
        return view('home')->with('count',$postCount);
    }
}
