@extends('layouts.layout')
@section('content')
<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Error!</strong> Revise los campos obligatorios.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Nueva dirección</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('direcciones.store') }}"  role="form">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="calle" id="calle" class="form-control input-sm" placeholder="Calle">
									</div>
								</div>
								<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="colonia" id="colonia" class="form-control input-sm" placeholder="Colonia">
									</div>
								</div>
									
								</div>
							</div>

							<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
							<input type="text" name="delegacion" id="delegacion" class="form-control input-sm" placeholder="Delegacion">
							</div>
							</div>
							</div>

							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="numero" id="numero" class="form-control input-sm" placeholder="Numero">
									</div>
								</div>
							
							</div>

							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<select name="id_usuario">
											<option>Elege una opción</option>
												@foreach($usuarios as $usuario)
													<option value="{{$usuario->id}}">{{$usuario->nombre}}</option>
												@endforeach
										</select>
										
									</div>
								</div>
							
							</div>
							
							
							<div class="row">

								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Guardar" class="btn btn-success btn-block">
									<a href="{{ route('direcciones.create') }}" class="btn btn-info btn-block" >Atrás</a>
								</div>	

							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</section>
	@endsection