<?php

namespace App\Http\Controllers;

use App\Banco;
use App\Bio;
use App\Centro;
use App\Citie;
use App\countrie;
use App\Dependencia;
use App\region;
use App\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class BioController extends Controller
{
    private $userLogueado;
    public function __construct()
    {
        $this->middleware('auth');
        if (Auth::check()) {
            $this->userLogueado = User::find(Auth::id());
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

        $activartab = true;
        //$bio = Bio::where('user','=',Auth::user()->id)->count();
        $bio = Bio::where('user','=',Auth::user()->id)->get()->first();
        //dd(count($bio));
        $user = $this->userLogueado;
        if(count($bio) > 0) {
            //$bio = array();
            //dd($bio->identificacion);
            return view('profile.bio', compact('user','bio', 'activartab'));
        }
        else {
            //dd($bio);
            return redirect()->action('BioController@create');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $user = $this->userLogueado;
        $bio  = Bio::where('user','=',Auth::user()->id)->get();
        if(count($bio=!0)) {
            $dependencias = Dependencia::lists('nombre', 'id')->all();
            $bancos = Banco::lists('nombre', 'id')->all();
            $centros = Centro::lists('nombre', 'id')->all();
            $countries = countrie::lists('name', 'id')->all();
            //$countries = countrie::orderBy('name', 'asc')->get();
            return view('profile.bio.create', compact('user','countries', 'dependencias', 'bancos', 'centros'));
        }else
            return redirect('profile');
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
        //dd($request->all());
        $messages = [
            'identificacion.unique' => 'Ya hay un usuario registrado con esa identificacion',
        ];
        $this->validate($request,[
            'identificacion'=>'required|unique:bio',
            'imagendocumento'=>'mimes:jpeg,jpg,png,pdf|max:1000',
            'lugarexp' => 'required',
            'fechanacimiento' => 'required|date_format:d/m/Y',
            'ciudadnacimiento' => 'required',
            'sexo' => 'required',
            'correosena' => 'required|unique:bio|email|regex:/(.*)sena.edu\.co$/i',
            'correopersonal' => 'required|unique:bio|email',
            'telefono' => 'required',
            'ciudad' => 'required',
            'direccion' => 'required',
            'dependencia' => 'required',
            'banco' => 'required',
            'numerocuenta' => 'required',
        ],$messages);

        $data = $request->all();
        //dd(isset($data['imagendocumento']));
        $bio =  new Bio($data);
        $bio->user = Auth::user()->id;
        if(isset($data['imagendocumento'])) {
            $imageName = $data['identificacion'] . '.' .
                $request->file('imagendocumento')->getClientOriginalExtension();
            $imageName = str_replace(' ','',$imageName);
            $request->file('imagendocumento')->move(
                base_path() . '/public/images/docs/', $imageName
            );
            $bio->imagendocumento = $imageName;
        }
        $bio->save();
        return redirect('home');
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
        dd('estoy mostrando');
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
        $bio = Bio::where('user',$id)->first();

        $dependencias = Dependencia::lists('nombre','id')->all();
        $bancos = Banco::lists('nombre','id')->all();
        $centros = Centro::lists('nombre','id')->all();
        $countries = countrie::lists('name','id')->all();
        if($bio != null)
            return view('profile.bio.edit',compact('bio','countries','dependencias','bancos','centros'));
        else
            return view('profile.bio.create',compact('bio','countries','dependencias','bancos','centros'));


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
        //equired|email|unique:users,email,'.$user->id,
        $bio = Bio::findOrfail($id);
        //dd($request->all());
        $this->validate($request,[
            'identificacion'=>'required',
            'imagendocumento'=>'mimes:jpeg,jpg,png,pdf|max:1000',
            'lugarexp' => 'required',
            'fechanacimiento' => 'required|date_format:d/m/Y',
            'ciudadnacimiento' => 'required',
            'correosena' => 'required|email:regex:/(.*)sena\.edu\.co$/i|unique:bio,correosena,'.$bio->id,
            'correopersonal' => 'required|email|unique:bio,correopersonal,'.$bio->id,
            'telefono' => 'required',
            'ciudad' => 'required',
            'direccion' => 'required',
            'dependencia' => 'required',
            'banco' => 'required',
            'numerocuenta' => 'required',
        ]);

        //$bio = Bio::where('user',$id)->first();
        //$bio = Bio::findOrfail($id);
        $data = $request->all();
        $bio->fill($data);
        if(isset($data['imagendocumento'])) {
            $imageName = $data['identificacion'] . '.' .
                $request->file('imagendocumento')->getClientOriginalExtension();

            $request->file('imagendocumento')->move(
                base_path() . '/public/images/docs/', $imageName
            );
            $bio->imagendocumento = $imageName;
        }
        $bio->save();
        return redirect()->back();
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

    public function getRegion(Request $request)
    {
        $reg_id = $request->get('reg_id');
        $regions = region::whereRegion($reg_id);
        return $regions;
    }
    public function getCitie(Request $request)
    {
        $citi_id = $request->get('citi_id');
        $regions = Citie::whereCitie($citi_id);
        return $regions;
    }

}
