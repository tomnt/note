<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotesController extends Controller
{
    //
    public function read(Request $request){

        return \Response::json($request->all(),200);
    }
}
