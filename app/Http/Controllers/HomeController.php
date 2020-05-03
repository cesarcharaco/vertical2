<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/*use Mail;
use App\Mail\EmergencyCallReceived;*/
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /*Mail::to('jcesarchg9@gmail.com')->send(new EmergencyCallReceived());*/
        return view('home');
    }
}
