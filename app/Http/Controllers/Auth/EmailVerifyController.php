<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailVerifyController extends Controller
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

    // GET /email/verify/{id}/{hash}
    public function verifyEmail(EmailVerificationRequest $request)
    {
        $request->fulfill();
    
        return redirect('/');
    }

    // POST /email/verify
    public function resendVerification(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
    
        return back()->with('message', 'Verification link sent!');
    }

    // GET /email/verify
    public function showEmailNotVerified()
    {
        return view('auth.verify-email');
    }
}
