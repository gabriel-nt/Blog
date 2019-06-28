<?php

namespace App\Http\Controllers;

use App\Model\Email;
use Illuminate\Http\Request;
use Session;

class EmailsController extends Controller
{
    public function store( Request $request){
        Email::create($request->all());
        Session::flash('status','Email cadastrado com sucesso');
        return redirect()->back();
    }
}
