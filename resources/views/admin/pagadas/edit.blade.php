{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Compras')

@section('content_header')
    <h1>Compras</h1>
@stop

@section('content')

<div class='container'>
	<div class='row'>
		<div class='col-md-8 col-md-offset-1'>
			<div class='panel panel-default'>
				<div class='panel-heading'>
					Editar Reserva
				</div>


				<div class='panel-body'>

				{!! Form::model($compra, ['route'=> ['reservas.update', $compra->id] , 'method'=> 'PUT' ]) !!}

					@include('admin.compras.partials.form')

				{!! Form::close() !!}
				</div>	
			</div>			
		</div>
	</div>
</div>


@endsection

 <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')

