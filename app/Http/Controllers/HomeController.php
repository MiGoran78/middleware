<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


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
    public function index(Request $request)
    {

        //--  WRITE SESSION DATA
        session(['edwin'=>'teacher']);
        $request->session()->put(['goran'=>'administrator']);


        //--  DELETE SESSION DATA
//        $request->session()->flush();     //brise i podatke o logovanom korisniku
        $request->session()->forget('goran');
        $request->session()->forget('edwin');


        //---- FLASH DATA --
        $request->session()->flash('message', 'Post has been created');

//        $request->session()->reflash();
//        $request->session()->keep('message');


        //--  READ SESSION DATA
//        echo   $request->session()->get('goran');
        return $request->session()->all();


        return view('home');
    }
}
