@extends('profile.layouts.app')

@section('htmlheader_title')
	Editar datos biografia
@endsection

@section('contentheader_title')
	Ingresar datos
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
						<h3 class="box-title">Agregar información básica</h3>
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
					{!! Form::model($bio,array('route' => ['bio.update',$bio],'method'=>'put','files'=> true, 'id'=>'formbio')) !!}
					@include('profile.bio.partials.fields')
					{!! Form::close() !!}
					</div><!-- .boxbody-->
				</div><!-- /.box -->
			</div><!--/.col (right) -->
		</div>   <!-- /.row -->
	</section><!-- /.content -->
	<div id="divloading" name="divloading" class="loading" hidden></div>
@endsection

