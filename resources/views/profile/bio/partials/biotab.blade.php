
@if($activartab)
    <div class="tab-pane active" id="settings">
@else
            <div class="tab-pane" id="settings">
@endif
                <div class="post">
                    <div class="user-block">
                        <div class="col-md-4">
                        <p><strong>Identificación: </strong> {{(isset($bio->identificacion)? $bio->identificacion : 'Sin datos') }} </p>
                        <p><strong>Lugar Expedición documento: </strong> {{(isset($bio->lugarexp)? $bio->citiexp->name : 'Sin datos') }} </p>
                        <p><strong>Sexo: </strong> {{(isset($bio->sexo)? $bio->sexo : 'Sin datos') }} </p>
                        <p><strong>Fecha de nacimiento: </strong> {{(isset($bio->fechanacimiento)? $bio->fechanacimiento : 'Sin datos') }} </p>
                        <p><strong>Ciudad de nacimiento: </strong> {{(isset($bio->ciudadnacimiento)? $bio->citinac->name : 'Sin datos') }} </p>
                        <p><strong>Correo SENA: </strong> {{(isset($bio->correosena)? $bio->correosena : 'Sin datos') }} </p>

                            @if(!empty($bio->imagendocumento))
                               <p> <strong>Archivo identificacion: </strong> <a href="{{asset('/images/docs/'.$bio->imagendocumento)}}" target="_blank" class="btn btn-sm btn-success text-sm"> ver archivo </a></p>

                            @endif
                        <p><strong>Correo personal: </strong> {{(isset($bio->correopersonal)? $bio->correopersonal : 'Sin datos') }} </p>
                        <p><strong>Telefono: </strong> {{(isset($bio->telefono)? $bio->telefono : 'Sin datos') }} </p>
                        <p><strong>Telefono 2: </strong> {{(isset($bio->telefono1)? $bio->telefono1 : 'Sin datos') }}</p>
                        </div>
                        <div class="col-md-4">
                        <p><strong>Ciudad de residencia: </strong> {{(isset($bio->ciudad)? $bio->citires->name : 'Sin datos') }} </p>
                        <p><strong>Dirección de residencia: </strong> {{(isset($bio->direccion)? $bio->direccion : 'Sin datos') }} </p>
                        <p><strong>Dependencia de trabajo: </strong> {{(isset($bio->dependencia)? $bio->dependenciauser->nombre : 'Sin datos') }} </p>
                        <p><strong>Banco: </strong> {{(isset($bio->banco)? $bio->banco : 'Sin datos') }} </p>
                        <p><strong>Numero de cuenta: </strong> {{(isset($bio->numerocuenta)? $bio->numerocuenta : 'Sin datos') }} </p>
                        <p><strong>Cuenta de Ahorros: </strong> {{(isset($bio->ahorros)? 'SI' : 'NO') }} </p>
                        </div>

                        </p>
                    </div>

                        <div class="col-xs-12 col-sm-4 emphasis">
                            @if($bio->count() == 0)
                                <a href="{{url('bio/create')}}" class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span> Ingresar datos </a>
                            @endif
                        </div>
                        <div class="col-xs-12 col-sm-4 emphasis">

                            <a href="{{url('bio/'.Auth::user()->id.'/edit')}}" class="btn btn-danger btn-block"><span class="fa fa-user"></span> Editar Datos </a>
                        </div>


                </div>


            </div>