<section class="content">

    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{{ asset('/images/catalog/'.Auth::user()->imagen) }}" alt="User profile picture">
                    <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                    {{--<p class="text-muted text-center">Software Engineer</p>--}}

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Correo</b> <a class="pull-right">{{ Auth::user()->email }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Tipo de usuario</b> <a class="pull-right">{{ Auth::user()->name }}</a>
                        </li>
                    </ul>

                    <a href="{{url('profile/'.Auth::user()->id.'/edit')}}" class="btn btn-primary btn-block"><b>Editar Información Usuario</b></a>
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
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#activity" data-toggle="tab">Experiencia</a></li>
                    <li><a href="#timeline" data-toggle="tab">Formación</a></li>
                    <li><a href="#settings" data-toggle="tab">Datos básicos</a></li>
                </ul>
                <div class="tab-content">
                    @include('profile.skills.partials.experienciatab')
                    @include('profile.education.partials.formaciontab')
                    @include('profile.bio.partials.biotab')

                </div><!-- /.tab-content -->
            </div><!-- /.nav-tabs-custom -->
        </div><!-- /.col -->
    </div><!-- /.row -->

</section><!-- /.content -->