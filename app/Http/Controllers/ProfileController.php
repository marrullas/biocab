<?php

namespace App\Http\Controllers;


use App\Banco;
use App\Bio;
use App\Centro;
use App\countrie;
use App\Dependencia;
use App\Experiencia;
use App\Formacion;
use App\Http\Requests;
use App\Tipoformacion;
use App\Tipousuario;
use App\User;
use Illuminate\Support\Facades\Auth;
use Gate;
use Illuminate\Http\Request;


class ProfileController extends Controller
{

    private $userLogueado;

    public function __construct()
    {

        $this->middleware('auth');
        if (Auth::check()) {
            // The user is logged in...
            //$this->userLogueado = User::with('tipouser')->findOrFail(Auth::user()->id);
            $this->userLogueado = User::findOrFail(Auth::user()->id);

        }
    }
    //

    /**
     * Show the application profile.
     *
     * @return Response
     */
    public function index()
    {
        //dd(Auth::user()->bio);
        $user = $this->userLogueado;
        //dd($user->tipouser->descripcion);
        $skills = Experiencia::where('user','=',Auth::user()->id)->get();
        $educas = Formacion::where('user','=',Auth::user()->id)->get();
        $bio = Bio::where('user','=',Auth::user()->id)->get()->first();
        if($bio == null) {
            $bio = array();
        }
        $activartab = false;
        //if(Gate::denies('isAdmin')) {
            return view('profile.home', compact('user', 'skills', 'educas', 'bio', 'activartab'));
/*        }else{
            return redirect()->action('ConsultaController@index');
        }*/
    }

    public function edit($id)
    {

        return view('profile.layouts.edit');


        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'name'=>'required',
            'imagen'=>'max:500'
        ]);

        $user = User::findOrfail($id);
        //dd($bio);
        $user->fill($request->all());
        if($request->imagen != null) {
            $imageName = $user->id . str_random(8). '.' .
                $request->file('imagen')->getClientOriginalExtension();

            $request->file('imagen')->move(
                base_path() . '/public/images/catalog/', $imageName
            );
            $user->imagen = $imageName;
        }
        $user->save();
        return redirect()->back();
    }

}
