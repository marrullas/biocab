@extends('profile.layouts.app')

@section('htmlheader_title')
	Editar experiencia
@endsection

@section('contentheader_title')
	Editar datos
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
						<h3 class="box-title">Editar información</h3>
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
					{!! Form::model($skill,array('route' => ['skill.update',$skill],'method'=>'put','files'=> true, 'id'=>'formeskill')) !!}
					@include('profile.skills.partials.fields')
					{!! Form::close() !!}
					</div><!-- .boxbody-->
				</div><!-- /.box -->
			</div><!--/.col (right) -->
		</div>   <!-- /.row -->
	</section><!-- /.content -->
	<div id="divloading" name="divloading" class="loading" hidden></div>
@endsection

