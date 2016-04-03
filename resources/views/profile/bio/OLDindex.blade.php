
<div class="container">
	<div class="row">
		<div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
			<div class="well profile">
				<div class="col-sm-12">
					<div class="col-xs-12 col-sm-8">
						<h2>{{Auth::user()->name}}</h2>
						<p><strong>Identificación: </strong> {{(isset($bio->identifiacion)? $bio->identificacion : 'Sin datos') }} </p>
						<p><strong>Lugar Expedición documento: </strong> {{(isset($bio->lugarexp)? $bio->citiexp->name : 'Sin datos') }} </p>
						<p><strong>Sexo: </strong> {{(isset($bio->sexo)? $bio->sexo : 'Sin datos') }} </p>
						<p><strong>Fecha de nacimiento: </strong> {{(isset($bio->fechanacimiento)? $bio->fechanacimiento : 'Sin datos') }} </p>
						<p><strong>Ciudad de nacimiento: </strong> {{(isset($bio->ciudadnacimiento)? $bio->citinac->name : 'Sin datos') }} </p>
						<p><strong>Correo SENA: </strong> {{(isset($bio->correosena)? $bio->correosena : 'Sin datos') }} </p>
						<p><strong>Correo personal: </strong> {{(isset($bio->correopersonal)? $bio->correopersonal : 'Sin datos') }} </p>
						<p><strong>Telefono: </strong> {{(isset($bio->telefono)? $bio->telefono : 'Sin datos') }} </p>
						<p><strong>Telefono 2: </strong> {{(isset($bio->telefono1)? $bio->telefono1 : 'Sin datos') }}</p>
						<p><strong>Ciudad de residencia: </strong> {{(isset($bio->ciudad)? $bio->citires->name : 'Sin datos') }} </p>
						<p><strong>Dirección de residencia: </strong> {{(isset($bio->direccion)? $bio->direccion : 'Sin datos') }} </p>
						<p><strong>Dependencia de trabajo: </strong> {{(isset($bio->dependencia)? $bio->dependenciauser->nombre : 'Sin datos') }} </p>
						<p><strong>Banco: </strong> {{(isset($bio->banco)? $bio->banco : 'Sin datos') }} </p>
						<p><strong>Numero de cuenta: </strong> {{(isset($bio->numerocuenta)? $bio->numerocuenta : 'Sin datos') }} </p>
						<p><strong>Cuenta de Ahorros: </strong> {{(isset($bio->ahorros)? 'SI' : 'NO') }} </p>
{{--							<span class="tags">html5</span>
							<span class="tags">css3</span>
							<span class="tags">jquery</span>
							<span class="tags">bootstrap3</span>--}}
						</p>
					</div>
					<div class="col-xs-12 col-sm-4 text-center">
						<figure>
							<img src="{{ asset('/images/catalog/'.Auth::user()->imagen) }}" alt="" class="img-circle img-responsive">
{{--							<figcaption class="ratings">
								<p>Ratings
									<a href="#">
										<span class="fa fa-star"></span>
									</a>
									<a href="#">
										<span class="fa fa-star"></span>
									</a>
									<a href="#">
										<span class="fa fa-star"></span>
									</a>
									<a href="#">
										<span class="fa fa-star"></span>
									</a>
									<a href="#">
										<span class="fa fa-star-o"></span>
									</a>
								</p>
							</figcaption>--}}
						</figure>
					</div>
				</div>
				<div class="col-xs-12 divider text-center">
					<div class="col-xs-12 col-sm-4 emphasis">
{{--						<h2><strong> 20,7K </strong></h2>
                                                <p><small>Followers</small></p>
                                                --}}
						@if($bio == 0)
						<a href="{{url('bio/create')}}" class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span> Ingresar datos </a>
						@endif
					</div>
					<div class="col-xs-12 col-sm-4 emphasis">
{{--						<h2><strong>245</strong></h2>
						<p><small>Following</small></p>--}}
						<a href="{{url('bio/'.Auth::user()->id.'/edit')}}" class="btn btn-info btn-block"><span class="fa fa-user"></span> Editar Datos </a>
					</div>
{{--					<div class="col-xs-12 col-sm-4 emphasis">
						<h2><strong>43</strong></h2>
						<p><small>Snippets</small></p>
						<div class="btn-group dropup btn-block">
							<button type="button" class="btn btn-primary"><span class="fa fa-gear"></span> Options </button>
							<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
								<span class="caret"></span>
								<span class="sr-only">Toggle Dropdown</span>
							</button>
							<ul class="dropdown-menu text-left" role="menu">
								<li><a href="#"><span class="fa fa-envelope pull-right"></span> Send an email </a></li>
								<li><a href="#"><span class="fa fa-list pull-right"></span> Add or remove from a list  </a></li>
								<li class="divider"></li>
								<li><a href="#"><span class="fa fa-warning pull-right"></span>Report this user for spam</a></li>
								<li class="divider"></li>
								<li><a href="#" class="btn disabled" role="button"> Unfollow </a></li>
							</ul>
						</div>
					</div>--}}
				</div>
			</div>
		</div>
	</div>
</div>