{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Compras' )

@section('content_header')
    <h1>Compras </h1><br>

El Valor Total Reservado es de : <b>{{ $monto_total }} </b><br>

El Valor Actual de su compra es : <b>{{ $monto_acumulado }} </b><br>

Le queda por gastar : <b>{{ $resto }} </b><br>
@stop

@section('content')


<div class='container'>
	<div class='row'>
		<div class='col-md-8 col-md-offset-22'>
			<div class='panel panel-default'>
				<div class='panel-heading'>
				Listado de Productos Seleccionados
				<td width='100%'> 

 				@if( $canasta_id>0)
				<a href='{{route('carritos.create')}}' class='btn btn-sm btn-success pull-right'>Nuevo</a>

				@endif
 
				

				</td>
				</div>


				<div class='panel-body1'>
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

					@foreach($carritos as $carrito)
						<tr>
						<td> {{$carrito->id}} </td>
					    <td colspan=2> {{ $carrito->producto->descripcion }} </td>	
						<td > {{$carrito->cantidad}} </td>				    	
										

						<td width='10px'>  
						<a href='{{route('carritos.edit', $carrito->id)}}' class='btn btn-sm btn-warning'>Editar</a>
						</td>			
						<td width='10px'>  
						{!! Form::open(['route'=>['carritos.destroy',$carrito->id ], 'method'=> 'DELETE']) !!}
							<button class='btn btn-sm btn-danger'> 
								Eliminar
							</button>

						{!! Form::close() !!}
						</td>			

						</tr>

					@endforeach
					</tbody>
					</table>

					{{$carritos->render()}}
				</div>	
			</div>			
		</div>
	</div>
</div>

@endsection

  

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop


