<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tress;

class TreesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userDetails=Tress::orderBy('created_at','desc')->paginate(10);
        return view('appmain.index')->with('usersData',$userDetails);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('appmain.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
        'title'=>'required',
        'body'=>'required']);

        $user=new Tress;
        $user->title=$request->input('title');
        $user->body=$request->input('body');
        $user->user_id=auth()->user->id();
        $user->save();
        return redirect('/trees')->with('success','Bio Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $singleUser= Tress::find($id);
        return view('appmain.singleDetail')->with('singleDetail',$singleUser);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $singleUser= Tress::find($id);
        return view('appmain.editSingle')->with('singleDetail',$singleUser);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
        'title'=>'required',
        'body'=>'required']);

        $user=Tress::find($id);
        $user->title=$request->input('title');
        $user->body=$request->input('body');
        $user->save();
        return redirect('/trees')->with('success','Bio Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=Tress::find($id);
        $user->delete();
        return redirect('/trees')->with('error','Bio Removed');

    }
}
