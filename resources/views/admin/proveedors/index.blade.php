{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Proveedores')

@section('content_header')
    <h1>Proveedores</h1>
@stop

@section('content')


<div class='container'>
	<div class='row'>
		<div class='col-md-8 col-md-offset-22'>
			<div class='panel panel-default'>
				<div class='panel-heading'>
				Listado de Proveedores
				<td width='100%'> 

 				@if( auth()->id()<4)
				<a href='{{route('proveedors.create')}}' class='btn btn-sm btn-success pull-right'>Nuevo</a>
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

					@foreach($proveedors as $proveedor)
						<tr>
						<td> {{$proveedor->id}} </td>
					    <td colspan=2> {{$proveedor->denominacion}} </td>	
						<td >  </td>								    	
						<td >  </td>	
						<td>  </td>		
						<td>  </td>												
	
						<td width='10px'>  
						<a href='{{route('proveedors.edit', $proveedor->id)}}' class='btn btn-sm btn-warning'>Editar</a>
						</td>			
						<td width='10px'>  
						{!! Form::open(['route'=>['proveedors.destroy',$proveedor->id ], 'method'=> 'DELETE']) !!}
							<button class='btn btn-sm btn-danger'> 
								Eliminar
							</button>

						{!! Form::close() !!}
						</td>			

						</tr>

					@endforeach
					</tbody>
					</table>

					{{$proveedors->render()}}
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


