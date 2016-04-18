<?php

namespace App\Http\Controllers\admin;

use App\Bio;
use App\Experiencia;
use App\Formacion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Gate;


class UserController extends Controller
{

    public function __construct(\Illuminate\Http\Request $request)
    {
        $this->middleware('auth');
        $user = \App\User::find(Auth::User());
        if(Gate::denies('isAdmin',$user)){
            //dd('paila');
            abort(403,'No autorizado');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $skills = Experiencia::where('user','=',Auth::user()->id)->get();
        $educas = Formacion::where('user','=',Auth::user()->id)->get();
        $bio = Bio::where('user','=',Auth::user()->id)->get()->first();
        if($bio == null) {
            $bio = array();
        }
        $activartab = false;
        return view('admin.home',compact('skills','educas','bio','activartab'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = \App\User::find(Auth::User());
        if(Gate::denies('isAdmin',$user)){
            abort(403);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
