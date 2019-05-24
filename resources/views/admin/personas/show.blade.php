@extends('layouts.app')

@section('content')

<div class='container'>
	<div class='row'>
		<div class='col-md-8 col-md-offset-2'>
			<div class='panel panel-default'>
				<div class='panel-heading'>
					Ver Entrada
				</div>


				<div class='panel-body'>
				<p> <strong> Nombre </strong> {{$cuota->descripcion}} </p>
				<p> <strong> Valor </strong> {{$cuota->valor}} </p>
				<p> <strong> Fecha </strong> {{$cuota->fecha}} </p>

				</div>	
			</div>			
		</div>
	</div>
</div>


@endsection
