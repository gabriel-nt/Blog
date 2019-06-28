<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Model\Noticias;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * 
     * Funcao para renderizar as publicações feitas por um usuário.
     *
     */
    public function admin(){
        $noticias = Noticias::where('id_autor',auth()->user()->id)->get();
        return view('auth.admin')->with(['noticias'=>$noticias]);
    }
}
