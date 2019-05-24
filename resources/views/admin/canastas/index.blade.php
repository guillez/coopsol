{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Canastas')

@section('content_header')
    <h1>Canastas</h1>
@stop

@section('content')


<div class='container'>
	<div class='row'>
		<div class='col-md-8 col-md-offset-22'>
			<div class='panel panel-default'>
				<div class='panel-heading'>
				Listado de Canastas
				<td width='100%'> 

 				@if( auth()->id()<4)
				<a href='{{route('canastas.create')}}' class='btn btn-sm btn-success pull-right'>Nuevo</a>
				@endif
 
				

				</td>
				</div>


				<div class='panel-body1'>
					<table class='table table-striped table-hover1'>
					<thead>
						<tr>
							<th width='5%'> ID </th>
							<th colspan=2, width='45%'> Descripcion</th>							
<th width='20%'> INICIO </th>		
							<th width='10%'> FIN </th>
							<th width='2%'> ENTREGA </th>																			<th width='20%'> MONTO </th>			
	<th width='20%'> ACTIVA </th>	
							<th colspan=2, width='30%'> ACCIONES </th>						
						</tr>
					</thead>

					<tbody> 

					@foreach($canastas as $canasta)
						<tr>
						<td> {{$canasta->id}} </td>
					    <td colspan=2> {{$canasta->descripcion}} </td>	
						<td >{{$canasta->iniciocompra}}  </td>								    	
						<td > {{$canasta->fincompra}} </td>	
						<td>  {{$canasta->fechaentrega}}</td>	
<td>  {{$canasta->monto}}</td>		
						<td> {{$canasta->activa}} </td>												

						<td width='10px'>  
						<a href='{{route('canastas.edit', $canasta->id)}}' class='btn btn-sm btn-warning'>Editar</a>
						</td>			
						<td width='10px'>  
						{!! Form::open(['route'=>['canastas.destroy',$canasta->id ], 'method'=> 'DELETE']) !!}
							<button class='btn btn-sm btn-danger'> 
								Eliminar
							</button>

						{!! Form::close() !!}
						</td>			

						</tr>

					@endforeach
					</tbody>
					</table>

					{{$canastas->render()}}
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


