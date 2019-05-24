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
				<a href='{{route('personas.create')}}' class='btn btn-sm btn-success pull-right'>Nueva</a>
				@endif
 
				

				</td>
				</div>


				<div class='panel-body1'>
					<table class='table table-striped table-hover1'>
					<thead>
						<tr>
							<th width='5%'> ID </th>
							<th colspan=2, width='45%'> Descripcion</th>							

							<th width='10%'> CANTIDAD </th>
							<th width='2%'> ESTADO </th>																			<th width='20%'> ACTUAL </th>			
	
							<th colspan=2, width='30%'> ACCIONES </th>						
						</tr>
					</thead>

					<tbody> 

					@foreach($personas as $persona)
						<tr>
						<td> {{$persona->id}} </td>
					    <td colspan=2> {{$persona->descripcion}} </td>	
							    	
						<td >  </td>	
						<td>  </td>		
						<td>  </td>												
						<td colspan=2, width='30px'>  
	    
						</td>	
						<td width='10px'>  
						<a href='{{route('personas.edit', $persona->id)}}' class='btn btn-sm btn-warning'>Editar</a>
						</td>			
						<td width='10px'>  
						{!! Form::open(['route'=>['personas.destroy',$persona->id ], 'method'=> 'DELETE']) !!}
							<button class='btn btn-sm btn-danger'> 
								Eliminar
							</button>

						{!! Form::close() !!}
						</td>			

						</tr>

					@endforeach
					</tbody>
					</table>

					{{$personas->render()}}
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




