@extends('profile.layouts.app')

@section('htmlheader_title')
	Agregar datos de experiencia
@endsection

@section('contentheader_title')
	Ingresar datos de experiencia
@endsection
@section('main-content')
		<!-- Main content -->
	<section class="content" xmlns="http://www.w3.org/1999/html">
		<div class="row">
			<!-- left column -->
			<div class="col-md-12">
				<!-- general form elements -->
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Agregar experiencia</h3>
					</div><!-- /.box-header -->
					<div class="box-body">
						@if (count($errors) > 0)
							<div class="alert alert-danger">
								<strong>Whoops!</strong> Hay problemas con los datos ingresados.<br><br>
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
					{!! Form::open(array('route' => 'skill.store','method'=>'post','files' => true)) !!}
					@include('profile.skills.partials.fields')
					{!! Form::close() !!}
					</div><!-- .boxbody-->
				</div><!-- /.box -->
			</div><!--/.col (right) -->
		</div>   <!-- /.row -->
	</section><!-- /.content -->
	<div id="divloading" name="divloading" class="loading" hidden style="position: fixed; left: 50%; top: 50%; display: none;"></div>
@endsection

