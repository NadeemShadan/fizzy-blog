<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TreesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userDetails=Tress::orderBy('created_at','desc')->paginate(5);
        return $userDetails;
        // return view('appmain.index')->with('usersData',$userDetails);
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
        'body'=>'required',
        'cover_image'=>'image|nullable|max:1999']);

        if ($request->hasFile('cover_image')) {
            $filename=$request->file('cover_image')->getClientOriginalName();
            $filename=pathinfo($filename,PATHINFO_FILENAME);
            $extension=$request->file('cover_image')->getClientOriginalExtension();
            $filename=$filename.'__'.time().'.'.$extension;
            $path=$request->file('cover_image')->storeAs('public/cover_images',$filename);
        }
        else {
            $filename="default.jpg";
        }
        $user=new Tress;
        $user->title=$request->input('title');
        $user->body=$request->input('body');
        $user->cover_image=$filename;
        $user->user_id=auth()->user()->id;
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
        if (auth()->user()->id !== $singleUser->user_id) {
            return redirect('/trees')->with('error',"You are not authorized to access that page");

        }
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
        'body'=>'required',
        'cover_image'=>'image|nullable|max:1999']);
        if ($request->hasFile('cover_image')) {
            $filename=$request->file('cover_image')->getClientOriginalName();
            $filename=pathinfo($filename,PATHINFO_FILENAME);
            $extension=$request->file('cover_image')->getClientOriginalExtension();
            $filename=$filename.'__'.time().'.'.$extension;
            $path=$request->file('cover_image')->storeAs('public/cover_images',$filename);
        }
        $user=Tress::find($id);
        $user->title=$request->input('title');
        $user->body=$request->input('body');
        if ($request->hasFile('cover_image')) {
            $user->cover_image=$filename;
        }
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
        if ($user->cover_image!=='default.jpg') {
            Storage::delete('public/cover_images/'.$user->cover_image);
        }
        $user->delete();
        return redirect('/trees')->with('error','Bio Removed');

    }
}
