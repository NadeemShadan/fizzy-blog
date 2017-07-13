<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/test',function(){
    return response()->json(
['user'=>[
    'firstName'=>'Nadeem',
    'lastName'=>'Shadan'
]]);
});
