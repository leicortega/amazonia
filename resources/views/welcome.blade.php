@extends('layouts.app')

@section('title') Inicio @endsection

@section('content')
<div class="main-header main-header-fullwidth main-header-has-header-standard">

	
	<!-- Header Standard Landing  -->
	
	@include('layouts.header')
	
	<!-- ... end Header Standard Landing  -->
	<div class="header-spacer--standard"></div>

	<div class="content-bg-wrap bg-landing"></div>

	<div class="container mt-5">
		<div class="row display-flex">
			<div class="col col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
				<div class="landing-content">
					<h1>Amazonia <br>Consultoria & Logistica SAS</h1>
					<p>
                        Amazonia C&L se dedicada a la prestación del servicio de transporte de pasajeros por carretera en todas sus modalidades, transporte especial y carga. Haz tu cotizacion ahora mismo!
					</p>
					<a href="#" data-toggle="modal" data-target="#modal-cotizacion" class="btn btn-md btn-border c-white">Cotizar Ahora!</a>
				</div>
			</div>

			<div class="col col-xl-5 ml-auto col-lg-6 col-md-12 col-sm-12 col-12">

				
				<!-- Login-Registration Form  -->
				
				<div class="registration-login-form">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item h-50 @auth h-100 @endauth">
							<a class="nav-link active" data-toggle="tab" href="#home" role="tab">
								<svg class="olymp-week-calendar-icon"><use xlink:href="{{ asset('assets/svg-icons/sprites/icons.svg#olymp-week-calendar-icon') }}"></use></svg>
							</a>
						</li>
						@guest
						<li class="nav-item h-50">
							<a class="nav-link" data-toggle="tab" href="#profile" role="tab">
								<svg class="olymp-happy-face-icon"><use xlink:href="{{ asset('assets/svg-icons/sprites/icons.svg#olymp-happy-face-icon') }}"></use></svg>
							</a>
						</li>	
						@endguest
						
					</ul>
				
					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane active" id="home" role="tabpanel" data-mh="log-tab">
							<div class="title h6">Realizar Cotización</div>
							<form class="content form_cotizacion-welcome" method="POST" action="/create/cotizacion" >
								@csrf

								<div class="row">
									
									<div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="form-group label-floating">
											<label class="control-label">Nombre Completo</label>
											<input class="form-control" name="nombre" placeholder="" type="text" required>
                                        </div>
                                        <div class="form-group label-floating">
											<label class="control-label">Correo electronico</label>
											<input class="form-control" name="correo" placeholder="" type="email" required>
										</div>
										<div class="form-group label-floating">
											<label class="control-label">Telefono</label>
											<input class="form-control" name="telefono" placeholder="" type="number">
										</div>
									</div>
									
									<div class="col-12">
										<label>Origen</label>
									</div>
                                    <div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
										<div class="form-group date-time-picker label-floating">
											<label class="control-label">Departamento</label>
											<select name="departamento_origen" class="departamento_origen" onchange="dptOrigen(this.value)" class="form-control" required>
												<option value=""></option>
											</select>
										</div>
									</div>
									<div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
										<div class="form-group date-time-picker label-floating">
											<label class="control-label">Ciudad</label>
											<select name="ciudad_origen" class="ciudad_origen" class="form-control" required>
												<option value=""></option>
											</select>
										</div>
									</div>

									<div class="col-12">
										<label>Destino</label>
									</div>
									<div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
										<div class="form-group date-time-picker label-floating">
											<label class="control-label">Departamento</label>
											<select name="departamento_destino" class="departamento_destino" onchange="dptDestino(this.value)" class="form-control" required>
												<option value=""></option>
											</select>
										</div>
									</div>
									<div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
										<div class="form-group date-time-picker label-floating">
											<label class="control-label">Ciudad</label>
											<select name="ciudad_destino" class="ciudad_destino" class="form-control" required>
												<option value=""></option>
											</select>
										</div>
									</div>
                                    
                                    <div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
										<div class="form-group date-time-picker label-floating">
											<label class="control-label">Fecha de Ida</label>
											<input name="fecha_ida" class="class_datetimepicker" autocomplete="off" required/>
											<span class="input-group-addon">
												<svg class="olymp-calendar-icon"><use xlink:href="{{ asset('assets/svg-icons/sprites/icons.svg#olymp-calendar-icon') }}"></use></svg>
											</span>
										</div>
									</div>
									<div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
										<div class="form-group date-time-picker label-floating">
											<label class="control-label">Fecha Regreso</label>
											<input name="fecha_regreso" class="class_datetimepicker" autocomplete="off" required/>
											<span class="input-group-addon">
												<svg class="olymp-calendar-icon"><use xlink:href="{{ asset('assets/svg-icons/sprites/icons.svg#olymp-calendar-icon') }}"></use></svg>
											</span>
										</div>
									</div>

									<div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
										<div class="form-group date-time-picker label-floating">
											<label class="control-label">Tipo de servicio</label>
											<select name="tipo_servicio" id="tipo_servicio" class="form-control" required>
												<option value=""></option>
												<option value="Carga y/o Encomiendas">Carga y/o Encomiendas</option>
												<option value="Empresarial">Empresarial</option>
												<option value="Escolar">Escolar</option>
												<option value="Turismo">Turismo</option>
												<option value="Ocasional">Ocasional</option>
											</select>
										</div>
									</div>

									<div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
										<div class="form-group date-time-picker label-floating">
											<label class="control-label">Tipo de vehiculo</label>
											<select name="tipo_vehiculo" id="tipo_vehiculo" class="form-control" required>
												<option value=""></option>
												<option value="Station wagon">Station wagon</option>
												<option value="Buseta">Buseta</option>
												<option value="Bus">Bus</option>
												<option value="Campero">Campero</option>
												<option value="Micro Bus">Micro Bus</option>
												<option value="Volqueta">Volqueta</option>
												<option value="Camioneta Cerrada">Camioneta Cerrada</option>
												<option value="Camioneta Doble Cabina 4*4">Camioneta Doble Cabina 4*4</option>
												<option value="Camion">Camion</option>
												<option value="Camioneta de Estacas">Camioneta de Estacas</option>
												<option value="Vans">Vans</option>
												<option value="Camioneta VAN">Camioneta VAN</option>
											</select>
										</div>
									</div>

									<div class="col col-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
										<div class="radio">
											<label>
												<input type="radio" name="recorrido" value="Solo ida" required><span class="circle"></span><span class="check"></span>
												Solo ida
											</label>
										</div>
									</div>
									<div class="col col-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
										<div class="radio">
											<label>
												<input type="radio" name="recorrido" value="Ida y vuelta" required><span class="circle"></span><span class="check"></span>
												Ida y vuelta
											</label>
										</div>
									</div>
                                    
                                    <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="remember">
											<div class="checkbox">
												<label>
													<input name="optionsCheckboxes" type="checkbox" required>
													Acepto los <a href="#">Terminos y Condiciones</a> de la pagina.
												</label>
											</div>
										</div>
				
										<button type="submit" class="btn btn-primary btn-lg full-width">Cotizar!</button>
									</div>

									<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
										<div class="ui-block bg-primary d-none response-true">
											<div class="ui-block-title text-center">
												<h6 class="text-white">Cotizacion enviada correctamente. Nos pondremos en contacto</h6>
											</div>
										</div>
										<div class="ui-block bg-danger d-none response-false">
											<div class="ui-block-title text-center">
												<h6 class="text-white">Ocurrio un error, intentalo mas tarde</h6>
											</div>
										</div>
									</div>

								</div>
							</form>
						</div>

						@guest
						<div class="tab-pane" id="profile" role="tabpanel" data-mh="log-tab">
							<div class="title h6">Iniciar Sesión</div>
							<form class="content" method="POST" action="{{ route('login') }}">
								@csrf

								<div class="row">
									<div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="form-group label-floating">
											<label class="control-label">Correo</label>
											<input class="form-control @error('email') is-invalid @enderror" placeholder="" name="email" type="email" required>
										</div>
										<div class="form-group label-floating">
											<label class="control-label">Contraseña</label>
											<input class="form-control @error('password') is-invalid @enderror" placeholder="" name="password" type="password" required>
										</div>
										@error('email')
											<span class="invalid-feedback d-flex" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
										@error('password')
											<span class="invalid-feedback d-flex" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
				
										<div class="remember">
				
											<div class="checkbox">
												<label>
													<input name="optionsCheckboxes" type="checkbox">
													Recordarme
												</label>
											</div>
											{{-- <a href="#" class="forgot" data-toggle="modal" data-target="#restore-password">Olvide mi contraseña</a> --}}
										</div>
				
										<button type="submit" class="btn btn-lg btn-primary full-width">Ingresar</button>
				
										<div class="or"></div>
				
										<a href="/auth/redirect/google" class="btn btn-lg bg-google full-width btn-icon-left"><i class="fab fa-google" aria-hidden="true"></i>Ingresar con Google</a>
				
										<p>Aun no tienes una cuenta? <a href="#" data-toggle="modal" data-target="#registration-login-form-popup">Registrate Ahora!</a> Es realmente facil y disfruta de los beneficios.</p>
									</div>
								</div>
							</form>
						</div>
						@endguest
						

					</div>
				</div>
				
				<!-- ... end Login-Registration Form  -->
			</div>
		</div>
	</div>

</div>


<!-- Section Img Scale Animation -->

<section class="align-center pt80 section-move-bg-top img-scale-animation scrollme">
	<div class="container">
		<div class="row">
			<div class="col col-xl-10 m-auto col-lg-10 col-md-12 col-sm-12 col-12">
				<img class="main-img" src="{{ asset('assets/img/page/parque_automotor/SOS717_1.png') }}" alt="SOS717_1">
			</div>
		</div>
	</div>
	<div class="content-bg-wrap bg-section2"></div>
</section>

<!-- ... end Section Img Scale Animation -->

<section class="medium-padding120">
	<div class="container">
		<div class="row">
			<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
				<img src="{{ asset('assets/img/page/parque_automotor/chevrolet1.jpg') }}" alt="Chevrolet">
			</div>

			<div class="col col-xl-4 col-lg-4 m-auto col-md-12 col-sm-12 col-12">
				<div class="crumina-module crumina-heading">
					<h2 class="heading-title">¿<span class="c-primary">Quienes somos</span>?</h2>
					<p class="heading-text">AMAZONIA C&L, es una Organización que le aporta significativamente a la economía de nuestro país mediante la Prestación del Servicio de Transporte Terrestre Especial de pasajeros de calidad y la implementación de medidas y prácticas que promueven la seguridad y salud de sus trabajadores.
                    </p>
                    <a href="/nosotros" class="btn btn-lg btn-primary full-width">Ver mas</a>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="medium-padding120">
	<div class="container">
		<div class="row">
			<div class="col col-xl-4 col-lg-4 m-auto col-md-12 col-sm-12 col-12">
				<div class="crumina-module crumina-heading">
					<h2 class="heading-title">Nuestros <span class="c-primary">Servicios</span></h2>
					<p class="heading-text">Entre nuestro portafolio de servivios tenemos el transporte especial: Empresarial, Escolar, Turismo y de Carga.
                    </p>
                    <a href="/servicios" class="btn btn-lg btn-primary full-width">Ver mas</a>
				</div>
			</div>

			<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
				<img src="{{ asset('assets/img/page/parque_automotor/hyundai1.jpg') }}" alt="Hyundai">
			</div>
		</div>
	</div>
</section>


<section class="medium-padding120">
	<div class="container">
		<div class="row">
			<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
				<img src="{{ asset('assets/img/page/parque_automotor/volkswagen1.jpg') }}" alt="Volkswagen">
			</div>

			<div class="col col-xl-4 col-lg-4 m-auto col-md-12 col-sm-12 col-12">
				<div class="crumina-module crumina-heading">
					<h2 class="heading-title">Realizar una <span class="c-primary">Cotización</span></h2>
					<p class="heading-text">
                        Realiza una cotización de forma facil y con una rapida respuesta, el personal competente se pondrá en contacto contigo de inmediato.
                    </p>
                    <a href="#" data-toggle="modal" data-target="#modal-cotizacion" class="btn btn-lg btn-primary full-width">Cotizar</a>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="medium-padding120">
	<div class="container">
		<div class="row">
			<div class="col col-xl-4 col-lg-4 m-auto col-md-12 col-sm-12 col-12">
				<div class="crumina-module crumina-heading">
					<h2 class="heading-title"><span class="c-primary">Contactenos</span></h2>
					<p class="heading-text">
                        ¿Preguntas, Quejas o Reclamos? Tenemos el personal capacitado para colaborarte, contactenos.                        
                    </p>
                    <a href="/contacto" class="btn btn-lg btn-primary full-width">Contactarnos</a>
				</div>
			</div>

			<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
				<img src="{{ asset('assets/img/page/parque_automotor/nomplus1.jpg') }}" alt="Nomplus">
			</div>
		</div>
	</div>
</section>

<!-- Planer Animation -->

<section class="medium-padding120 bg-section3 background-cover planer-animation">
	<div class="container">
		<div class="row mb60">
			<div class="col col-xl-4 col-lg-4 m-auto col-md-12 col-sm-12 col-12">
				<div class="crumina-module crumina-heading align-center">
					<h2 class="h1 heading-title">Parque Automotor</h2>
					<p class="heading-text">Conoce aqui nuestro parque automotor.</p>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="swiper-container pagination-bottom" data-show-items="3">
				<div class="swiper-wrapper">
					<div class="ui-block swiper-slide">

						
						<!-- Testimonial Item -->
						
						<div class="crumina-module crumina-testimonial-item">
							<div class="testimonial-header-thumb"></div>
						
							<div class="testimonial-item-content">
						
								<div class="author-thumb">
									<img src="{{ asset('assets/img/page/parque_automotor/toyota1.jpg') }}" width="150" alt="Camionetas">
								</div>
						
								<h3 class="testimonial-title">Camionetas</h3>
						
								<ul class="rait-stars">
									<li>
										<i class="fa fa-star star-icon"></i>
									</li>
									<li>
										<i class="fa fa-star star-icon"></i>
									</li>
						
									<li>
										<i class="fa fa-star star-icon"></i>
									</li>
									<li>
										<i class="fa fa-star star-icon"></i>
									</li>
									<li>
										<i class="fa fa-star star-icon"></i>
									</li>
								</ul>
						
								<p class="testimonial-message">
                                    Conoce nuestro parque automotor, da clic en <span class="c-primary">ver mas</span> para conocer a detalle las <span class="c-primary">Camionetas</span> que tenemos listas para ti.
								</p>
						
								<div class="author-content">
									<a href="/parque_automotor/camionetas" class="btn btn-lg btn-primary ">Ver mas</a>
								</div>
							</div>
						</div>
						
						<!-- ... end Testimonial Item -->
					</div>

					<div class="ui-block swiper-slide">

						
						<!-- Testimonial Item -->
						
						<div class="crumina-module crumina-testimonial-item">
							<div class="testimonial-header-thumb"></div>
						
							<div class="testimonial-item-content">
						
								<div class="author-thumb">
									<img src="{{ asset('assets/img/page/parque_automotor/hyundai1.jpg') }}" width="150" alt="Vans">
								</div>
						
								<h3 class="testimonial-title">Vans</h3>
						
								<ul class="rait-stars">
									<li>
										<i class="fa fa-star star-icon"></i>
									</li>
									<li>
										<i class="fa fa-star star-icon"></i>
									</li>
						
									<li>
										<i class="fa fa-star star-icon"></i>
									</li>
									<li>
										<i class="fa fa-star star-icon"></i>
									</li>
									<li>
										<i class="fa fa-star star-icon"></i>
									</li>
								</ul>
						
								<p class="testimonial-message">
                                    Conoce nuestro parque automotor, da clic en <span class="c-primary">ver mas</span> para conocer a detalle las <span class="c-primary">Vans</span> que tenemos listas para ti.
								</p>
						
								<div class="author-content">
									<a href="/parque_automotor/vans" class="btn btn-lg btn-primary ">Ver mas</a>
								</div>
							</div>
						</div>
						
						<!-- ... end Testimonial Item -->

					</div>

					<div class="ui-block swiper-slide">

						
						<!-- Testimonial Item -->
						
						<div class="crumina-module crumina-testimonial-item">
							<div class="testimonial-header-thumb"></div>
						
							<div class="testimonial-item-content">
						
								<div class="author-thumb">
									<img src="{{ asset('assets/img/page/parque_automotor/nomplus1.jpg') }}" width="150" alt="Buses">
								</div>
						
								<h3 class="testimonial-title">Buses</h3>
						
								<ul class="rait-stars">
									<li>
										<i class="fa fa-star star-icon"></i>
									</li>
									<li>
										<i class="fa fa-star star-icon"></i>
									</li>
						
									<li>
										<i class="fa fa-star star-icon"></i>
									</li>
									<li>
										<i class="fa fa-star star-icon"></i>
									</li>
									<li>
										<i class="far fa-star star-icon"></i>
									</li>
								</ul>
						
								<p class="testimonial-message">
                                    Conoce nuestro parque automotor, da clic en <span class="c-primary">ver mas</span> para conocer a detalle los <span class="c-primary">Buses</span> que tenemos listas para ti.
								</p>
						
								<div class="author-content">
									<a href="/parque_automotor/buses" class="btn btn-lg btn-primary ">Ver mas</a>
								</div>
							</div>
						</div>
						
						<!-- ... end Testimonial Item -->
					</div>
				</div>

				<div class="swiper-pagination"></div>
			</div>
		</div>
	</div>

</section>

<!-- ... end Section Planer Animation -->

<!-- Section Subscribe Animation -->

<section class="medium-padding100 subscribe-animation scrollme" style="background:#83a96e;">
	<div class="container">
		<div class="row">
			<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
				<div class="crumina-module crumina-heading c-white custom-color">
					<h2 class="h1 heading-title">Amazonia Newsletter</h2>
					<p class="heading-text">Suscribete a nuestro newsletter para tenerte informado. Tranquilo, no es span :)
					</p>
				</div>

				
				<!-- Subscribe Form  -->
				
				<form class="form-inline subscribe-form" method="post">
					<div class="form-group label-floating is-empty">
						<label class="control-label">Ingresar Correo</label>
						<input class="form-control bg-white" placeholder="" type="email">
					</div>
				
					<button class="btn btn-primary btn-lg">Enviar</button>
				</form>
				
				<!-- ... end Subscribe Form  -->

			</div>
		</div>

		<img src="{{ asset('assets/img/paper-plane.png') }}" alt="plane" class="plane">
	</div>
</section>

<section class="medium-padding120 bg-body contact-form-animation scrollme">
	<div class="container">
		<div class="row mb60">
			<div class="col col-xl-4 col-lg-4 m-auto col-md-12 col-sm-12 col-12">
				<div class="crumina-module crumina-heading align-center">
					<h2 class="h1 heading-title">Contactenos</h2>
					<p class="heading-text">Envianos un mensaje.</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col col-xl-10 col-lg-10 col-md-12 col-sm-12  m-auto">

				
				<!-- Contacts Form -->
				<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="ui-block bg-primary d-none" id="response-true">
						<div class="ui-block-title text-center">
							<h6 class="title text-white">Mensaje enviado correctamente. Nos pondremos en contacto</h6>
						</div>
					</div>
					<div class="ui-block bg-danger d-none" id="response-false">
						<div class="ui-block-title text-center">
							<h6 class="title text-white">Ocurrio un error, intentalo mas tarde</h6>
						</div>
					</div>
				</div>
				
				<div class="contact-form-wrap">
					<div class="contact-form-thumb">
						{{-- <h2 class="title">Envianos un <span>Mensaje</span></h2> --}}
					</div>
					<form class="contact-form" id="form-contacto" action="/create/correo" type="POST">
						@csrf

						<div class="row">

							<div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
								<div class="form-group label-floating">
									<label class="control-label">Nombre</label>
									<input class="form-control" placeholder="" type="text" name="nombre" required/>
								</div>
							</div>
							<div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
								<div class="form-group label-floating">
									<label class="control-label">Apellido</label>
									<input class="form-control" placeholder="" type="text" name="apellido" required/>
								</div>
							</div>
							<div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
								<div class="form-group label-floating">
									<label class="control-label">Correo electronico</label>
									<input class="form-control" placeholder="" type="email" name="email" required/>
								</div>
				
								<div class="form-group label-floating">
									<label class="control-label">Asunto</label>
									<input class="form-control" placeholder="" type="text" name="asunto" required/>
								</div>
				
								<div class="form-group">
									<textarea class="form-control" placeholder="Escriba su mensaje" name="mensaje" required></textarea>
								</div>
				
								<button type="submit" id="btn-correo" class="btn btn-primary btn-lg full-width">Enviar</button>
							</div>
						</div>
					</form>
				</div>
				
				<!-- ... end Contacts Form -->

			</div>
		</div>
	</div>

	<div class="half-height-bg bg-white"></div>
</section>

@endsection