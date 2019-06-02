{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Carritos')

@section('content_header')
    <h1>Carrito</h1>
@stop

@section('content')

<div class='container'>
	<div class='row'>
		<div class='col-md-8 col-md-offset-1'>
			<div class='panel panel-default'>
				<div class='panel-heading'>
					Carrito de Compras
				</div>


				<div class='panel-body'>

				{!! Form::open(['route'=>'carritos.store', 'files'=> true ]) !!}

					@include('admin.carritos.partials.form')

				{!! Form::close() !!}
				</div>	
			</div>			
		</div>
	</div>
</div>


@if($resto<10) 
<?php $mensaje='<table align="center" color="RED"><tr><td><H3>CARRITO COMPLETO.</H3></td></tr></table>'; ?>
<?php echo $mensaje; ?>
@endif
<br>


<div class='container'>
	<div class='row'>
		<div class='col-md-8 col-md-offset-22'>
			<div class='panel panel-default'>
				<div class='panel-heading'>
				Listado de Productos Seleccionados
				<td width='100%'> 


 
				

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

					@foreach($carritos1 as $carrito1)
						<tr>
						<td> {{$carrito1->id}} </td>
					    <td colspan=2> {{ $carrito1->producto->descripcion }} </td>	
						<td > {{$carrito1->cantidad}} </td>				    	
										

							
						<td width='10px'>  
						{!! Form::open(['route'=>['carritos1.destroy',$carrito1->id ], 'method'=> 'DELETE']) !!}
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

</div>	
			</div>			
		</div>
	</div>
</div>








@endsection



 <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')

