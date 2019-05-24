{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Seguros')

@section('content_header')
    <h1>Seguros</h1>
@stop

@section('content')

<div class='container'>
	<div class='row'>
		<div class='col-md-8 col-md-offset-1'>
			<div class='panel panel-default'>
				<div class='panel-heading'>
					Nueva Entidad Aseguradora
				</div>


				<div class='panel-body'>

				{!! Form::open(['route'=>'seguros.store', 'files'=> true ]) !!}

					@include('admin.seguros.partials.form')

				{!! Form::close() !!}
				</div>	
			</div>			
		</div>
	</div>
</div>


@endsection
