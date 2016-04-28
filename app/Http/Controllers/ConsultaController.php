<?php

namespace App\Http\Controllers;

use App\Bio;
use App\Experiencia;
use App\Formacion;
use App\Tipoformacion;
use App\User;
use Illuminate\Http\Request;
use Gate;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ConsultaController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');  
        if(Gate::denies('allow-consulta'))
            abort(403);
    }

    public function index()
    {

        $ingles = (Input::has('ingles')) ? true : false;
        $pedagogia = (Input::has('pedagogia')) ? true : false;
        $nombre = request()->get('nombre');
        $tipoformacion =  request()->get('tipoformacion');
        $page =  request()->get('page');
        $userslist = User::filtroPaginación($nombre,$tipoformacion,$ingles,$pedagogia);
        $bio = Bio::where('user','=',Auth::user()->id)->get()->first();
        if($bio == null) {
            $bio = array();
        }
        $tipoformacionList = Tipoformacion::lists('nombre','id')->all();
        return view('consulta.home', compact('ingles','pedagogia','nombre','user','userslist','tipoformacion', 'tipoformacionList', 'bio','page'));
    }
    public function verusuario($id)
    {
        $user = User::find($id);
        //dd($user->tipouser->descripcion);
        $skills = Experiencia::where('user','=',$user->id)->get();
        $educas = Formacion::where('user','=',$user->id)->get();
        $bio = Bio::where('user','=',$user->id)->get()->first();
        if($bio == null) {
            $bio = array();
        }
        $activartab = false;
        return view('profile.home', compact('user', 'skills', 'educas', 'bio', 'activartab'));
    }
}
