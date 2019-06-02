{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Reservas')

@section('content_header')
    <h1>Reservas</h1>
@stop

@section('content')


USUARIO COMPRADOR: <b>{{ auth()->user()->name }}</b><br><br>
EMAIL COMPRADOR:<b>{{ auth()->user()->email }}</b><br><br>

<div class='container'>
	<div class='row'>
		<div class='col-md-8 col-md-offset-22'>
			<div class='panel panel-default'>
				<div class='panel-heading'>
				Listado de Compras
				<td width='100%'> 



 				
                                  @if(count($controlcanasta)==0)
				<a href='{{route('reservas.create')}}' class='btn btn-sm btn-success pull-right'>Nueva</a>
                                  @endif
				
				

				</td>
				</div>


				<div class='panel-body1'>
					<table class='table table-striped table-hover1'>
					<thead>
						<tr>
							<th width='3%'> ID </th>
							<th width='8%'> CANASTA</th>
							<th width='3%'> Cant.</th>
							<th width='5%'> Monto </th>			
							<th width='3%'> Conf </th>
							<th colspan=2, width='5%'> ACCIONES </th>						
						</tr>
					</thead>

					<tbody> 

					@foreach($compras as $compra)
						<tr>
						<td> {{$compra->id}} </td>
					    <td> {{ $compra->canasta->descripcion }}  </td>
						<td >{{$compra->cantidad}}  </td>
						<td>  {{$compra->monto}}</td>	
						<td> @if($compra->confirmada) {{'SI'}}  @endif </td>	
						<td width='10px'>  
						@if(!$compra->confirmada) 
						<a href='{{route('reservas.edit', $compra->id)}}' class='btn btn-sm btn-warning'>Editar</a>
						<a href='{{route('reservas.show', $compra->id)}}' class='btn btn-sm btn-success'>Confirmar</a>
						@endif
						</td>			

						</tr>

					@endforeach
					</tbody>
					</table>

					{{$compras->render()}}
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


