{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Canastas')

@section('content_header')
    <h1>Reserva de Canastas</h1>
@stop

@section('content')

<div class='container'>
	<div class='row'>
		<div class='col-md-8 col-md-offset-1'>
			<div class='panel panel-default'>
				<div class='panel-heading'>
					Nueva Reserva de Canasta
				</div>


				<div class='panel-body'>

				{!! Form::open(['route'=>'reservas.store', 'files'=> true ]) !!}

					@include('admin.compras.partials.form')

				{!! Form::close() !!}
				</div>	
			</div>			
		</div>
	</div>
</div>


@endsection
