<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.2/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;


/**
 * Class HomeController
 * @package App\Http\Controllers
 */
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
     * @return Response
     */
    public function index()
    {
        //return view('home');
        if(Gate::denies('isAdmin')) {
            //return view('profile.home', compact('user', 'skills', 'educas', 'bio', 'activartab'));
            return redirect()->action('ProfileController@index');
        }else{
            return redirect()->action('ConsultaController@index');
        }

    }
}