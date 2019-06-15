{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Compra de Producto')

@section('content_header')
    <h1>Compra de Producto</h1>
@stop

@section('content')

<div class='container'>
	<div class='row'>
		<div class='col-md-8 col-md-offset-1'>
			<div class='panel panel-default'>
				<div class='panel-heading'>
					Editar Compra de producto
				</div>


				<div class='panel-body'>

				{!! Form::model($carrito, ['route'=> ['carritos.update', $carrito->id] , 'method'=> 'PUT' ]) !!}

					@include('admin.carritos.partials.form')

				{!! Form::close() !!}
				</div>	
			</div>			
		</div>
	</div>
</div>




<table class='table table-striped table-hover1'>
					<thead>
						<tr>
							<th width='5%'> ID </th>
							<th colspan=2, width='45%'> Producto</th>							
<th width='20%'> Cantidad </th>		
							
							<th colspan=2, width='30%'> ACCIONES </th>						
						</tr>
					</thead>

					<tbody> 

					@foreach($carritos1 as $carrito1)
						<tr>
						<td> {{$carrito1->id}} </td>
					    <td colspan=2> {{ $carrito1->producto->descripcion }}-{{ $carrito1->producto->unidad }} </td>	
						<td > {{$carrito1->cantidad}} </td>				    	
										

								
						<td width='10px'>  
						{!! Form::open(['route'=>['carritos1.destroy',$carrito->id ], 'method'=> 'DELETE']) !!}
							<button class='btn btn-sm btn-danger'> 
								Eliminar
							</button>

						{!! Form::close() !!}
						</td>			

						</tr>

					@endforeach
					</tbody>
					</table>

					{{$carritos1->render()}}






@endsection












 <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')

