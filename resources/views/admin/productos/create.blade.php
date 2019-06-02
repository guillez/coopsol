{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>Productos</h1>
@stop

@section('content')

<div class='container'>
	<div class='row'>
		<div class='col-md-8 col-md-offset-1'>
			<div class='panel panel-default'>
				<div class='panel-heading'>
					Nueva Producto
				</div>


				<div class='panel-body'>

				{!! Form::open(['route'=>'productos1.store', 'files'=> true ]) !!}

					@include('admin.productos.partials.form')

				{!! Form::close() !!}
				</div>	
			</div>			
		</div>
	</div>
</div>


@endsection
