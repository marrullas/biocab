
<!-- form start -->
{{-- <form class="form">--}}
<div class="col-md-4">
    <div class="form-group">

        <label for="inputName" class="control-label">Titulo</label>
        <div>
            {{--<input type="text" class="form-control" id="identificacion" name="identificacion" placeholder="Identificación">--}}
            {!! Form::text('titulo', null, [ 'class' => 'form-control', 'placeholder' => 'Digite titulo obtenido' ] ) !!}
        </div>
    </div>
    <div class="form-group">

        <label for="inputName" class="control-label">Descripción del titulo</label>
        <div>
            {{ Form::textarea('descripcion', null,['class' => 'form-control','id'=>'funciones', 'placeholder'=>'Descripcion del titulo']) }}                            </div>
    </div>
    <div class="form-group">
        <label for="inputName" class="control-label">Institucion educativa</label>
        <div>
            {!! Form::text('institucion', null, [ 'class' => 'form-control', 'placeholder' => 'Digite IE' ] ) !!}
        </div>
    </div>
    <div class="form-group">
        <label for="inputName" class="control-label">Tipo Formación</label>
        <div>
            {{ Form::select('tipoformacion', $tipoformacion,null,['class' => 'form-control','id'=>'tipoformacion', 'placeholder'=>'seleccione tipo formacion']) }}
        </div>
    </div>

</div>

<div class="col-md-4">

    <div class="form-group">

        <label for="inputName" class="control-label">Pais</label>
        <div>

            {{ Form::select('countries', $countries,null,['class' => 'form-control','id'=>'countries', 'placeholder'=>'seleccione un pais']) }}
        </div>
    </div>
    <div class="form-group">
        <label for="inputName" class="control-label">Departamento/Región</label>
        <div>
            {{ Form::select('region',[], null,['class' => 'form-control','id'=>'region']) }}
        </div>
    </div>
    <div class="form-group">
        <label for="inputName" class="control-label">Ciudad</label>
        <div>
            {{ Form::select('ciudad',[], null,['class' => 'form-control','id'=>'ciudad']) }}
        </div>
    </div>
    <div class="form-group">
        <div>
            <div class="checkbox">
                <label>

                    @if(isset($educa))
                        {{ Form::checkbox('terminado', $educa['terminado']) }} Terminado
                    @else
                        {{ Form::checkbox('terminado') }} Terminado
                    @endif
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="inputName" class="control-label">Fecha finalización</label>
        <div>
            {!! Form::date('fechaterminado', null, [ 'class' => 'form-control', 'placeholder' => 'Fecha termino de estudios','id'=>'fechaterminado' ] ) !!}
        </div>
    </div>


</div>
<div class="col-md-4">
    <div class="form-group">
        <div>
            <div class="checkbox">
                <label>

                    @if(isset($educa))
                        {{ Form::checkbox('virtual', $educa['virtual']) }} Formacion virtual
                    @else
                        {{ Form::checkbox('virtual') }} Formacion virtual
                    @endif
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div>
            <div class="checkbox">
                <label>

                    @if(isset($educa))
                        {{ Form::checkbox('distacia', $educa['distacia']) }} Formacion a distacia
                    @else
                        {{ Form::checkbox('distacia') }} Formacion a distacia
                    @endif
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div>
            <div class="checkbox">
                <label>

                    @if(isset($educa))
                        {{ Form::checkbox('pedagogia', $educa['pedagogia']) }} Formación pedagogia
                    @else
                        {{ Form::checkbox('pedagogia') }} Formación pedagogia
                    @endif
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div>
            <div class="checkbox">
                <label>

                    @if(isset($educa))
                        {{ Form::checkbox('ingles', $educa['ingles']) }} Formacion en Ingles
                    @else
                        {{ Form::checkbox('ingles') }} Formacion En ingles
                    @endif
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="inputName" class="control-label">Evidencia/Diploma (Solo imagenes, Maximo 1000kb)</label>
        @if(isset($educa))
            @if($educa['archivo'])
                <div>
                    <a href="{{asset('/images/edu/'.$educa['archivo'])}}" class="btn btn-success" target="_blank"> Ver archivo</a>
                </div>
            @endif
        @endif
        <div>
            {!! Form::file('archivo','',[ 'class' => 'form-control', 'placeholder' => 'Documento evidencia' ]) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="panel">
            <button type="submit" class="btn btn-success">Guardar</button>

            <a href="{{url('/education')}}" type="cancel" class="btn btn-info pull-right">Volver sin guardar</a>
        </div>
    </div>
</div>
</div>

{{--</form>--}}
@section('custom-scripts')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/css-spinning-spinners/1.1.0/load3.css" />
    <script language="JavaScript">
        $(document).ready(function () {
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
                @if(isset($educa))
                 $('#countries').val({{ $educa->citiinstitucion->countrie->id }}).trigger("change");
                @endif
            }

        });
        /********************************************CIUDAD EMPRESA ********************************************/
        // se inicia el componente select2 sobre los select normales
        $('#countries').select2();
        $('#region').select2({
            placeholder: "Seleccione una region"
        });
        $('#ciudad').select2({
            placeholder: "Seleccione una ciudad"
        });
        //Encaso de que seleccione un pais se carga el select de regiones.
        $('#countries').on('change',function (e) {
            cargarpais('#countries','#region','{{old('region')}}');
        });
        //si se cambia la region se ejecuta para cargar los datos de las ciudades y zonas
        $('#region').on('change',function (e) {
            cargaciudad('#region','#ciudad','{{old('ciudad')}}');
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

                @if(isset($educa)) //solo para update
                switch (selectchange){
                    case '#region':
                        $(selectdest).val({{ $educa->ciudad }}).trigger("change");
                        flagregion = true;
                        break;
                }
                @endif
                @if(!isset($educa))
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
                @if(isset($educa)) //solo para update
                //alert('entro a seleccionar region');
                switch (selectregion){
                    case '#region':
                        $(selectregion).val({{ $educa->citiinstitucion->region->id }}).trigger("change");
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
