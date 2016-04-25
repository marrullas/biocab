
                    <!-- form start -->
                   {{-- <form class="form">--}}
                    <div class="col-md-4">
                        <div class="form-group">

                            <label for="inputName" class="control-label">Identificación</label>
                            <div>
                                {{--<input type="text" class="form-control" id="identificacion" name="identificacion" placeholder="Identificación">--}}
                                {!! Form::text('identificacion', null, [ 'class' => 'form-control', 'placeholder' => 'Digite identificación' ] ) !!}
                            </div>
                        </div>
                        <div class="form-group">

                            <label for="inputName" class="control-label">Imagen Identificación (Imagen o PDF, Máximo 1000kb)</label>
                            @if(isset($bio))
                                @if($bio['imagendocumento'])
                            <div>
                                <a href="{{asset('/images/docs/'.$bio['imagendocumento'])}}" class="btn btn-sm btn-success" target="_blank"> Ver archivo</a>
                            </div>
                                    @endif
                            @endif
                            <div>
                                {!! Form::file('imagendocumento','',[ 'class' => 'form-control', 'placeholder' => 'Imagen documento' ]) !!}
                            </div>
                        </div>
                        <div class="form-group">
{{--
                            <div>
                                <input type="text" class="form-control" id="paisexp" placeholder="Pais Expedición">
                            </div>--}}
                            <label for="inputName" class="control-label">Pais de Expedición</label>
                            <div>

{{--                                <select class="form-control" id="countries" name="countries">
                                    <option value="">Selecccione un pais</option>
                                    @foreach($countries as $countrie)
                                        <option value="{{ $countrie->id }}"> {{$countrie->name}}</option>
                                    @endforeach
                                </select>--}}
                                {{ Form::select('countries', $countries,null,['class' => 'form-control','id'=>'countries', 'placeholder'=>'seleccione un pais']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="control-label">Departamento de Expedición</label>
                            <div>
                                {{ Form::select('region',[], null,['class' => 'form-control','id'=>'region']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="control-label">Ciudad de Expedición</label>
                            <div>
                                {{ Form::select('lugarexp',[], null,['class' => 'form-control','id'=>'lugarexp']) }}
                            </div>
                        </div>
                        <div class="form-group">

                            <label for="inputName" class="control-label">Sexo</label>
                            <div>
                                {{ Form::select('sexo', ['M'=>'Masculino','F'=>'Femenino','Otro'=>'Otro'],null,['class' => 'form-control','id'=>'sexo', 'placeholder'=>'seleccione sexo']) }}                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="control-label">Fecha de nacimiento (dd/mm/aaaa) Ej. (10/03/1970)</label>
                            <div>
                                {!! Form::text('fechanacimiento', null, [ 'class' => 'form-control datepicker', 'placeholder' => 'Fecha Nacimiento','id'=>'fechanacimiento' ] ) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="control-label">Pais de Nacimiento</label>
  {{--                          <select class="form-control" id="countries2" name="countries2">
                                <option value="">Selecccione un pais nacimiento</option>
                                @foreach($countries as $countrie)
                                    <option value="{{ $countrie->id }}"> {{$countrie->name}}</option>
                                @endforeach
                            </select>--}}
                            {{ Form::select('countries2', $countries,null,['class' => 'form-control','id'=>'countries2', 'placeholder'=>'seleccione un pais']) }}
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="control-label">Departamento de nacimiento</label>
                            <div>
                                {{ Form::select('region2', [],null,['class' => 'form-control','id'=>'region2']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="control-label">Ciudad de nacimiento</label>
                            <div>
                                {{ Form::select('ciudadnacimiento', [],null,['class' => 'form-control','id'=>'ciudadnacimiento']) }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="inputEmail" class="control-label">Correo SENA</label>
                            <div>
                                {!! Form::email('correosena', null, [ 'class' => 'form-control', 'placeholder' => 'Digite correo sena.edu.co' ] ) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="control-label">Correo personal</label>
                            <div>
                                {!! Form::email('correopersonal', null, [ 'class' => 'form-control', 'placeholder' => 'Digite correosena' ] ) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="control-label">Telefono contacto</label>
                            <div>
                                {!! Form::text('telefono', null, [ 'class' => 'form-control', 'placeholder' => 'Digite telefono' ] ) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="control-label">Telefono alternativo</label>
                            <div>
                                {!! Form::text('telefono1', null, [ 'class' => 'form-control', 'placeholder' => 'Digite telefono alternativo' ] ) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="control-label">Pais de residencia</label>
{{--                            <select class="form-control" id="countries3" name="countries3">
                                <option value="">Selecccione un pais recidencia</option>
                                @foreach($countries as $countrie)
                                    <option value="{{ $countrie->id }}"> {{$countrie->name}}</option>
                                @endforeach
                            </select>--}}
                            {{ Form::select('countries3', $countries,null,['class' => 'form-control','id'=>'countries3', 'placeholder'=>'seleccione un pais']) }}
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="control-label">Departamento de residencia</label>
                            <div>
                                {{ Form::select('region3', array(' '=>'Seleccionar una región'),null,['class' => 'form-control','id'=>'region3']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="control-label">Ciudad de residencia</label>
                            <div>
                                {{ Form::select('ciudad', array(' '=>'Seleccionar lugar de nacimiento'),null,['class' => 'form-control','id'=>'ciudad']) }}
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="inputName" class="control-label">Dirección</label>
                            <div>
                                {!! Form::text('direccion', null, [ 'class' => 'form-control', 'placeholder' => 'Digite direccion' ] ) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="control-label">Dependencia/Area</label>
                            <div>
                                {{ Form::select('dependencia', $dependencias,null,['class' => 'form-control','id'=>'dependencia', 'placeholder'=>'seleccione Area/Dependencia']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="control-label">Centro</label>
                            <div>
                                {{ Form::select('centro', $centros,null,['class' => 'form-control','id'=>'centro', 'placeholder'=>'seleccione Centro/empresa']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="control-label">banco</label>
                            <div>
                                {{ Form::select('banco', $bancos,null,['class' => 'form-control','id'=>'banco', 'placeholder'=>'seleccione banco']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="control-label">Numero cuenta</label>
                            <div>
                                {!! Form::text('numerocuenta', null, [ 'class' => 'form-control', 'placeholder' => 'Digite numero de cuenta' ] ) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <div class="checkbox">
                                    <label>
                                        @if(isset($bio))
                                            {{ Form::checkbox('ahorros', $bio['ahorros']) }} Ahorros
                                        @else
                                            {{ Form::checkbox('ahorros') }} Ahorros
                                        @endif
                                    </label>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="panel">
                                <button type="submit" class="btn btn-success">Guardar</button>

                                <a href="{{url('/bio')}}" type="cancel" class="btn btn-info pull-right">Volver sin guardar</a>
                            </div>
                        </div>
                        {{--						<div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>--}}

                    </div>


                    {{--</form>--}}
@section('custom-scripts')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/css-spinning-spinners/1.1.0/load3.css" />
    <script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/datepicker/locales/bootstrap-datepicker.es.js') }}" type="text/javascript"></script>
    <script language="JavaScript">
        $(document).ready(function () {
            var flagregion = true;
            var flagregion2 = true;
            var flagregion3 = true;

            $('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
                autoclose: true,
                language: 'es'

            });
            //se valida que no sea una recarga de un formulario con errores de datos ingresados por usuarios
            if("{{old('countries')}}" != '')
            {
                //si viene desde una recarga de datos se dispara el evento para que cargue el select de regiones
                $('#countries').trigger("change");
            }else
            {
                /*
                 en caso de que no se este creando registro se valida si se esta updateando, en este caso
                 se valida que venga el objeto modelo y se cargan los select correspondientes con las relaciones
                 de la tabla
                 */
                @if(isset($bio))
                 $('#countries').val({{ $bio->citiexp->countrie->id }}).trigger("change");
                @endif
            }
            if("{{old('countries2')}}" != '')
            {
                $('#countries2').trigger("change");
            }else
            {
                @if(isset($bio))
                 $('#countries2').val({{ $bio->citinac->countrie->id }}).trigger("change");
                @endif
            }
            if("{{old('countries3')}}" != '')
            {
                $('#countries3').trigger("change");
            }else
            {
                @if(isset($bio))
                 $('#countries3').val({{ $bio->citires->countrie->id }}).trigger("change");
                @endif
            }
            @if(isset($bio))
                flagregion = false;
                flagregion2 = false;
                flagregion3 = false;
            @endif
        });
        /********************************************EXPEDICION ********************************************/
        // se inicia el componente select2 sobre los select normales
        $('#countries').select2();
        $('#region').select2({
            placeholder: "Seleccione una region"
        });
        $('#lugarexp').select2({
            placeholder: "Seleccione una ciudad"
        });
        //Encaso de que seleccione un pais se carga el select de regiones.
        $('#countries').on('change',function (e) {
            cargarpais('#countries','#region','{{old('region')}}');
        });
        //si se cambia la region se ejecuta para cargar los datos de las ciudades y zonas
        $('#region').on('change',function (e) {
            cargaciudad('#region','#lugarexp','{{old('lugarexp')}}');
        });

        /******************************************NACIMIENTO**********************************************/
        // se inicia el componente select2 sobre los select normales
        $('#countries2').select2();
        $('#region2').select2({
            placeholder: "Seleccione una region"
        });
        $('#ciudadnacimiento').select2({
            placeholder: "Seleccione una ciudad"
        });
        //Encaso de que seleccione un pais se carga el select de regiones.
        $('#countries2').on('change',function (e) {
            cargarpais('#countries2','#region2','{{old('region2')}}');
        });
        //si se cambia la region se ejecuta para cargar los datos de las ciudades y zonas
        $('#region2').on('change',function (e) {
            cargaciudad('#region2','#ciudadnacimiento','{{old('ciudadnacimiento')}}');
        });

        /******************************************RESIDENCIA**********************************************/
        // se inicia el componente select2 sobre los select normales
        $('#countries3').select2();
        $('#region3').select2({
            placeholder: "Seleccione una region"
        });
        $('#ciudad').select2({
            placeholder: "Seleccione una ciudad"
        });
        //Encaso de que seleccione un pais se carga el select de regiones.
        $('#countries3').on('change',function (e) {
            cargarpais('#countries3','#region3','{{old('region3')}}');
        });
        //si se cambia la region se ejecuta para cargar los datos de las ciudades y zonas
        $('#region3').on('change',function (e) {
            cargaciudad('#region3','#ciudad','{{old('ciudad')}}');
        });

        function cargaciudad(selectchange, selectdest,oldciudad) {

            var citi = $(selectchange).val();
            $('#divloading').show();
            $.get("/bio/api/getCities", {citi_id: citi}).done(function (data) {

                $(selectdest).empty();
                $(selectdest).val(null).trigger("change");

                $('#ciudad').append($('<option>').text('Seleccione lugar expedición').attr('value', ''));
                $.each(data, function (i, value) {
                    //console.log(value.name);
                    $(selectdest).append($('<option>').text(value.name).attr('value', value.id));
                });
                if(oldciudad != '' && oldciudad != null){
                    /*codigo para setiar valor anterior en caso de error y recarga de los datos del formulario
                     y ademas se dispara el evento para cargar las ciudades y zonas de la region
                     */
                    //$(selectregion).val(oldregion).trigger('change');
                    $(selectdest).val(oldciudad).trigger("change");
                }
                @if(isset($bio)) //solo para update
                        switch (selectchange){
                    case '#region':
                        $(selectdest).val({{ $bio->lugarexp }}).trigger("change");
                        flagregion = true;
                        break;
                    case '#region2':
                        $(selectdest).val({{ $bio->ciudadnacimiento }}).trigger("change");
                        flagregion2 = true;
                        break;
                    case '#region3':
                        $(selectdest).val({{ $bio->ciudad }}).trigger("change");
                        flagregion3 = true;
                        break;
                }
                @endif
                @if(!isset($bio))
                    $('#divloading').hide();
                @else
                    if(flagregion == true && flagregion2 == true && flagregion3 == true )
                    $('#divloading').hide();
                @endif
            });


        }
        function cargarpais(selectcountri,selectregion,oldregion) {
            $('#divloading').show(); //se muestra el gif de carga
            var country = $(selectcountri).val();
            var depto = $(selectregion).val();
            $.get("/bio/api/getRegions", {reg_id: country}).done(function (data) {//se cargan las regiones del pais
                //si la region/dpto esta vacia no se dispara el evento sobre el select para cargar las
                //las ciudades
                if(depto != null) {
                    $(selectregion).empty();
                    $(selectregion).val(null);
                }else{
                    $('#div'+selectregion).hide();// se oculta el gif de carga
                }

                //se agrega primer valor en blanco a select
                $(selectregion).append($('<option>').text('Escoja una región').attr('value', ''));
                $.each(data, function (i, value) {//se cargan las regiones en el select

                    $(selectregion).append($('<option>').text(value.name).attr('value', value.id));
                });
                /*
                selecciona la region dependiendo del select expedicion, nacimiento, residencia
                 */
                @if(isset($bio)) //solo para update
                    //alert('entro a seleccionar region');
                    switch (selectregion){
                        case '#region':
                            $(selectregion).val({{ $bio->citiexp->region->id }}).trigger("change");
                        break;
                        case '#region2':
                            $(selectregion).val({{ $bio->citinac->region->id }}).trigger("change");
                        break;
                        case '#region3':
                            $(selectregion).val({{ $bio->citires->region->id }}).trigger("change");
                        break;
                    }

                @endif
                /*en caso de recarga del formulario por errores en los datos se selecciona el que tenia el usuario
                 escogido cuando envio el a guardar
                 */
                if(oldregion != '' && oldregion != null){
                    /*codigo para setiar valor anterior en caso de error y recarga de los datos del formulario
                     y ademas se dispara el evento para cargar las ciudades y zonas de la region
                     */
                    $(selectregion).val(oldregion).trigger('change');
                }
                @if(!isset($bio))
                $('#divloading').hide();
                @endif
            });

        }
    </script>
@endsection
