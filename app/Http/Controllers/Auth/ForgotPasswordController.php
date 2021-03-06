<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Resetar senha controller
    |--------------------------------------------------------------------------
    */

    use SendsPasswordResetEmails;

    /**
     * Construtor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
}
