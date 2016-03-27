<?php

namespace App\Http\Controllers;

use App\Banco;
use App\Bio;
use App\Centro;
use App\Citie;
use App\countrie;
use App\Dependencia;
use App\region;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class BioController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bio = Bio::where('user','=',Auth::user()->id)->count();
        return view('profile.bio',compact('bio'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $dependencias = Dependencia::lists('nombre','id')->all();
        $bancos = Banco::lists('nombre','id')->all();
        $centros = Centro::lists('nombre','id')->all();
        $countries = countrie::lists('name','id')->all();
        //$countries = countrie::orderBy('name', 'asc')->get();
        return view('profile.bio.create',compact('countries','dependencias','bancos','centros'));
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
            'email.regex' => 'Revise el e-mail debe ser el correo misena!',
        ];
        $this->validate($request,[
            'identificacion'=>'required',
            'imagendocumento'=>'max:500',
            'lugarexp' => 'required',
            'fechanacimiento' => 'required|date',
            'ciudadnacimiento' => 'required',
            'sexo' => 'required',
            'correosena' => 'required|email|regex:/(.*)sena.edu\.co$/i',
            'correopersonal' => 'required|email',
            'telefono' => 'required',
            'telefono1' => 'required',
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

            $request->file('imagendocumento')->move(
                base_path() . '/public/images/docs/', $imageName
            );
            $bio->imagendocumento = $imageName;
        }
        $bio->save();
        return redirect('bio');
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
        return view('profile.bio.edit',compact('bio','countries','dependencias','bancos','centros'));


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
        $this->validate($request,[
            'identificacion'=>'required',
            'imagendocumento'=>'max:500',
            'lugarexp' => 'required',
            'fechanacimiento' => 'required|date',
            'ciudadnacimiento' => 'required',
            'correosena' => 'required|email:regex:/(.*)sena\.edu\.co$/i',
            'correopersonal' => 'required|email',
            'telefono' => 'required',
            'telefono1' => 'required',
            'ciudad' => 'required',
            'direccion' => 'required',
            'dependencia' => 'required',
            'banco' => 'required',
            'numerocuenta' => 'required',
        ]);

        //$bio = Bio::where('user',$id)->first();
        $bio = Bio::findOrfail($id);
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
