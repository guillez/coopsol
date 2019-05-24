{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Seguros')

@section('content_header')
    <h1>Seguros</h1>
@stop

@section('content')


<div class='container'>
	<div class='row'>
		<div class='col-md-8 col-md-offset-22'>
			<div class='panel panel-default'>
				<div class='panel-heading'>
				Listado de Aseguradoras
				<td width='100%'> 

 				@if( auth()->id()<4)
				<a href='{{route('seguros.create')}}' class='btn btn-sm btn-success pull-right'>Nuevo</a>
				@endif
 
				

				</td>
				</div>


				<div class='panel-body1'>
					<table class='table table-striped table-hover1'>
					<thead>
						<tr>
							<th width='5%'> ID </th>
							<th colspan=2, width='45%'> Descripcion</th>							
<th width='20%'> DIRECCION </th>		
							<th width='10%'> EMAIL </th>
							<th width='2%'> TELEFONO </th>																			<th width='20%'> CELULAR </th>			
	
							<th colspan=2, width='30%'> ACCIONES </th>						
						</tr>
					</thead>

					<tbody> 

					@foreach($seguros as $seguro)
						<tr>
						<td> {{$seguro->id}} </td>
					    <td colspan=2> {{$seguro->descripcion}} </td>	
						<td > {{$seguro->direccion}} </td>								    	
						<td > {{$seguro->email}} </td>	
						<td> {{$seguro->telefono}} </td>		
						<td> {{$seguro->celular}} </td>												
	
						<td width='10px'>  
						<a href='{{route('seguros.edit', $seguro->id)}}' class='btn btn-sm btn-warning'>Editar</a>
						</td>			
						<td width='10px'>  
						{!! Form::open(['route'=>['seguros.destroy',$seguro->id ], 'method'=> 'DELETE']) !!}
							<button class='btn btn-sm btn-danger'> 
								Eliminar
							</button>

						{!! Form::close() !!}
						</td>			

						</tr>

					@endforeach
					</tbody>
					</table>

					{{$seguros->render()}}
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


