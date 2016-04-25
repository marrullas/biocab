<?php

namespace App\Http\Controllers;

use App\countrie;
use App\Experiencia;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class ExperienciaController extends Controller
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
        $skills = Experiencia::where('user','=',Auth::user()->id)->get();

        //dd($skills);
        return view('profile.skills',compact('skills'));
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
        return view('profile.skills.create',compact('countries'));
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
            'empresa'=>'required',
            'archivo'=>'mimes:jpeg,jpg,png,pdf|max:1000',
            'cargo' => 'required',
            'fechaingreso' => 'required|date_format:d/m/Y',
            'fechasalida' => 'date_format:d/m/Y',
            'ciudad' => 'required',
        ],$messages);

        $data = $request->all();
        //dd($request->all());
        //$data['fechaingreso'] = Carbon::createFromFormat('d/m/Y', $request->fechaingreso)->format('Y-m-d');
        //$data['fechasalida'] = Carbon::createFromFormat('d/m/Y', $request->fechasalida)->format('Y-m-d');
        //dd($data);
        $skill =  new Experiencia($data);
        //dd($skill);

        $skill->user = Auth::user()->id;
        if(isset($data['archivo'])) {
            $imageName = Auth::user()->id . '_' . $data['empresa'] .str_random(8).'.' .
                $request->file('archivo')->getClientOriginalExtension();

            $request->file('archivo')->move(
                base_path() . '/public/images/exp/', $imageName
            );
            $skill->archivo = $imageName;
        }
        $skill->publica = (Input::has('publica')) ? true : false;
        $skill->docente = (Input::has('docente')) ? true : false;
        $skill->save();
        return redirect('skill');
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
        $skill = Experiencia::where('id',$id)->first();
        $countries = countrie::lists('name','id')->all();
        //dd($skill);
        return view('profile.skills.edit',compact('skill','countries'));
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
            'empresa'=>'required',
            'archivo'=>'mimes:jpeg,jpg,png,pdf|max:1000',
            'cargo' => 'required',
            'fechaingreso' => 'required|date_format:d/m/Y',
            'fechasalida' => 'date_format:d/m/Y',
            'ciudad' => 'required',
        ],$messages);

        $data = $request->all();
        //dd($data);
        $skill =  Experiencia::findOrFail($id);
        $data = $request->all();
        $skill->fill($data);
        if(isset($data['archivo'])) {
            $imageName = Auth::user()->id . '_' . $data['empresa'] .str_random(8).'.' .
                $request->file('archivo')->getClientOriginalExtension();

            $request->file('archivo')->move(
                base_path() . '/public/images/exp/', $imageName
            );
            $skill->archivo = $imageName;
        }
        $skill->publica = (Input::has('publica')) ? true : false;
        $skill->docente = (Input::has('docente')) ? true : false;
        $skill->save();
        return redirect('skill');
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
