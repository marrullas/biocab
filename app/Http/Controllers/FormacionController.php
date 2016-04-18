<?php

namespace App\Http\Controllers;

use App\countrie;
use App\Formacion;
use App\Tipoformacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class FormacionController extends Controller
{
    //
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
        $educas = Formacion::where('user','=',Auth::user()->id)->get();

        $activartab = true;
        return view('profile.education',compact('educas','activartab'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $countries = countrie::lists('name','id')->all();
        $tipoformacion = Tipoformacion::lists('nombre','id')->all();
        return view('profile.education.create',compact('countries','tipoformacion'));
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
        //
        //dd($request->all());
        $messages = [
            'email.regex' => 'Revise el e-mail debe ser el correo misena!',
            'archivo.image' => 'Las evidencias solo se pueden subir en imagenes (jpg, png)',
            'archivo.max' => 'El tamaño del archivo no debe superar los 1000kb',
        ];
        $this->validate($request,[
            'titulo'=>'required',
            'archivo'=>'mimes:jpeg,jpg,png,pdf|max:1000',
            'institucion' => 'required',
            'fechaterminado' => 'date',
            'ciudad' => 'required',
        ],$messages);

        $data = $request->all();
        //dd($data);
        $educa =  new Formacion($data);
        $educa->user = Auth::user()->id;
        if(isset($data['archivo'])) {
            $imageName = Auth::user()->id . '_' .  preg_replace('/\s+/', '', $data['titulo']) .str_random(8).'.' .
                $request->file('archivo')->getClientOriginalExtension();

            $request->file('archivo')->move(
                base_path() . '/public/images/edu/', $imageName
            );
            $educa->archivo = $imageName;
        }
        $educa->terminado = (Input::has('terminado')) ? true : false;
        $educa->virtual = (Input::has('virtual')) ? true : false;
        $educa->distacia = (Input::has('distacia')) ? true : false;
        $educa->pedagogia = (Input::has('pedagogia')) ? true : false;
        $educa->ingles = (Input::has('ingles')) ? true : false;
        $educa->save();
        return redirect('education');
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
        $educa = Formacion::where('id',$id)->first();
        $countries = countrie::lists('name','id')->all();
        $tipoformacion = Tipoformacion::lists('nombre','id')->all();
        //dd($educa);
        return view('profile.education.edit',compact('educa','countries','tipoformacion'));
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
        $messages = [
            'email.regex' => 'Revise el e-mail debe ser el correo misena!',
            'archivo.image' => 'Las evidencias solo se pueden subir en imagenes (jpg, png)',
            'archivo.max' => 'El tamaño del archivo no debe superar los 1000kb',
        ];
        $this->validate($request,[
            'titulo'=>'required',
            'archivo'=>'mimes:jpeg,jpg,png,pdf|max:1000',
            'institucion' => 'required',
            'fechaterminado' => 'date',
            'ciudad' => 'required',
        ],$messages);

        //dd($data);
        $educa =  Formacion::findOrFail($id);
        $data = $request->all();
        $educa->fill($data);
        if(isset($data['archivo'])) {
            $imageName = Auth::user()->id . '_' . preg_replace('/\s+/', '', $data['titulo']) .str_random(8).'.' .
                $request->file('archivo')->getClientOriginalExtension();

            $request->file('archivo')->move(
                base_path() . '/public/images/edu/', $imageName
            );
            $educa->archivo = $imageName;
        }
        $educa->terminado = (Input::has('terminado')) ? true : false;
        $educa->virtual = (Input::has('virtual')) ? true : false;
        $educa->distacia = (Input::has('distacia')) ? true : false;
        $educa->pedagogia = (Input::has('pedagogia')) ? true : false;
        $educa->ingles = (Input::has('ingles')) ? true : false;
        $educa->save();
        return redirect('education');
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
