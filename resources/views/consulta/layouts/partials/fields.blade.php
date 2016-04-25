        <div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
            <div class="well profile">
                <div class="col-sm-12">
                    <div class="col-md-12">
                        <div class="form-group">
                            <figure>
                                <img src="{{ asset('/images/catalog/'.Auth::user()->imagen) }}" alt="" class="img-circle img-responsive">
                            </figure>
                            <div>
                                {!! Form::file('imagen','',[ 'class' => 'form-control', 'placeholder' => 'Imagen documento' ]) !!}
                            </div>
                        </div>
                        <div class="form-group">

                            <label for="inputName" class="control-label">Nombre</label>
                            <div>
                                {{--<input type="text" class="form-control" id="identificacion" name="identificacion" placeholder="Identificación">--}}
                                {!! Form::text('name', null, [ 'class' => 'form-control', 'placeholder' => 'Nombre' ] ) !!}
                            </div>
                        </div>
                        <div class="form-group">

                            <label for="inputName" class="control-label">Acerca de</label>
                            <div>
                                {{ Form::textarea('descripcion', null,['class' => 'form-control','id'=>'descripcion', 'placeholder'=>'Escrioba una breve descripcion']) }}                            </div>
                        </div>
                        <div class="form-group">

                            <label for="inputName" class="control-label">Correo</label>
                            <div>
                                {{--<input type="text" class="form-control" id="identificacion" name="identificacion" placeholder="Identificación">--}}
                                {{--{!! Form::text('email', null, [ 'class' => 'form-control', 'placeholder' => 'Nombre' ] ) !!}--}}
                                <h3 class="profile-username text-center">{{ Auth::user()->email }}</h3>
                            </div>
                        </div>
                        <div class="form-group">

                            <label for="inputName" class="control-label">Tipo usuario</label>
                            <div>
                                <h3 class="profile-username text-center">{{ Auth::user()->tipouser->descripcion }}</h3>
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="panel">
                                <button type="submit" class="btn btn-success">Guardar</button>

                                <a href="{{url('/profile')}}" type="cancel" class="btn btn-info pull-right">Volver sin guardar</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>