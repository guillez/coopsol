{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Personas')

@section('content_header')
    <h1>Personas </h1>
@stop

@section('content')


<div class='container'>
	<div class='row'>
		<div class='col-md-8 col-md-offset-22'>
			<div class='panel panel-default'>
				<div class='panel-heading'>
				Listado de Personas
				<td width='100%'> 

 				@if( auth()->id()<4)
				<a href='{{route('personas.create')}}' class='btn btn-sm btn-success pull-right'>ACTUALIZAR SAO</a>
				@endif
 
				

				</td>
				</div>


				<div class='panel-body1'>

					{{ Form::open(['route' => ['personas.index'], 'method' => 'GET']) }}
					  <p>{{ Form::text('search', old('search'), array('placeholder'=>'Search')) }}</p>
					  <p>{{ Form::submit('Buscar') }}</p>
					{{ Form::close() }}

					<table class='table table-striped table-hover1'>
					<thead>
						<tr>
							<th width='5%'> ID </th>
							<th colspan=2, width='5%'> Documento</th>							

							<th width='10%'> Apellido </th>
							<th width='10%'> Nombre </th>																			<th width='20%'> Sedes </th>	<th width='20%'> A_Activo </th>		
	
							<th colspan=2, width='30%'> ACCIONES </th>						
						</tr>
					</thead>

					<tbody> 

					@foreach($personas as $persona)


@if (($persona->alumnoactivo != 0) and ($persona->alumno_aseg != 1))
    <tr class="danger">
@elseif(($persona->alumnoactivo != 0) and ($persona->alumno_aseg != 0))
    <tr class="success">
@else
    <tr>
@endif

						
						<td> {{$persona->id}} </td>
					    <td colspan=2> {{$persona->documento}} </td>	
							    	
						<td > {{$persona->apellido}} </td>	
						<td> {{$persona->nombre}} </td>		
						<td> {{$persona->alumno_sedes}} </td>						
<td> {{$persona->alumnoactivo}} </td>
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




