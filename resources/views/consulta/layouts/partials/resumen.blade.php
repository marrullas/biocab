<section class="content">

    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <div class="box-header with-border">
                        <h3 class="box-title">Campos de busqueda</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::model(['nombre'=>$nombre,'tipoformacion'=>$tipoformacion],['route'=> 'consulta.index', 'method'=>'GET', 'class'=>'search-form-full', 'role'=>'search' ]) !!}
                        {{--<form method="get" role="form" class="search-form-full">--}}
                            <div class="form-group">
                                {{ Form::text('nombre',$nombre,['class'=>'form-control','id'=>'nombre','placeholder'=>'Buscar por nombre...']) }}
                                {{--<input type="text" class="form-control" name="s" id="search-input" placeholder="Buscar por nombre...">--}}
                                <i class="entypo-search"></i>
                            </div>
                            <div class="form-group">
                                {{ Form::select('tipoformacion', $tipoformacionList,$tipoformacion,['class' => 'form-control','id'=>'tipoformacion', 'placeholder'=>'Seleccione un tipo de formacion']) }}
                            </div>
                        <div class="form-group">
                            <div>
                                <div class="checkbox">
                                    <label>
                                        @if(isset($pedagogia))
                                            {{ Form::checkbox('pedagogia', null, $pedagogia) }} pedagogía
                                        @else
                                            {{ Form::checkbox('pedagogia') }} Pedagogía
                                        @endif
                                    </label>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <div>
                                <div class="checkbox">
                                    <label>
                                        @if(isset($ingles))
                                            {{ Form::checkbox('ingles',null, $ingles) }} Ingles
                                        @else
                                            {{ Form::checkbox('ingles') }} Ingles
                                        @endif
                                    </label>
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-default">Buscar</button>
                        <a class="btn btn-warning" href="{{ URL::to('/consulta/') }}">Limpiar</a>
                        {{--</form>--}}
                        {!! Form::close() !!}
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->

            <!-- About Me Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Acerca de mi</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    @if(Auth::user()->hasBio())
                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Descripción</strong>
                    <p>{{Auth::user()->descripcion}}</p>
{{--                    <hr>
                    <strong><i class="fa fa-book margin-r-5"></i>  Education</strong>
                    <p class="text-muted">
                        B.S. in Computer Science from the University of Tennessee at Knoxville
                    </p>--}}

                    <hr>

                    <strong><i class="fa fa-map-marker margin-r-5"></i> Residencia</strong>
                    <p class="text-muted">{{ Auth::user()->bio->citires->name }}, {{ Auth::user()->bio->citires->region->name }}</p>
                    <p class="text-muted">{{ Auth::user()->bio->direccion }}</p>

{{--                    <hr>

                    <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>
                    <p>
                        <span class="label label-danger">UI Design</span>
                        <span class="label label-success">Coding</span>
                        <span class="label label-info">Javascript</span>
                        <span class="label label-warning">PHP</span>
                        <span class="label label-primary">Node.js</span>
                    </p>

                    <hr>

                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>--}}
                    @else
                        <strong><i class="fa fa-file-text-o margin-r-5"></i> No hay datos registrados</strong>
                        <a href="{{url('bio/create')}}" class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span> Ingresar datos </a>
                    @endif
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
        <div class="col-md-9">

                    @include('admin.layouts.partials.listuser')


        </div><!-- /.col -->
    </div><!-- /.row -->

</section><!-- /.content -->

@section('custom-scripts')

    {{--<script src="{{ asset('plugins/iCheck/icheck.js') }}"></script>--}}
    <script>
/*        $(document).ready(function(){
            $('#pedagogia').iCheck({
                checkboxClass: 'icheckbox_square',
                radioClass: 'iradio_square',
                increaseArea: '20%' // optional
            });
            $('#ingles').iCheck({
                checkboxClass: 'icheckbox_square',
                radioClass: 'iradio_square',
                increaseArea: '20%' // optional
            });
        });*/
    </script>

@endsection