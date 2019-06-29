{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Compras Confirmadas')

@section('content_header')
    <h1>Compras Confirmadas</h1>
@stop

@section('content')


<div class='container'>
	<div class='row'>
		<div class='col-md-8 col-md-offset-22'>
			<div class='panel panel-default'>
				<div class='panel-heading'>
				Listado de Compras Confirmadas
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
							<th width='8%'> Comprador</th>
							<th width='3%'> Cant.</th>
							<th width='5%'> Monto </th>			
							<th width='3%'> Pagada </th>
							<th colspan=2, width='5%'> ACCIONES </th>						
						</tr>
					</thead>

					<tbody> 

					@foreach($compras as $compra)
						<tr>
						<td> {{$compra->id}} </td>
					    <td> {{ $compra->name }}  </td>
						<td >{{$compra->cantidad}}  </td>
						<td>  {{$compra->monto}}</td>	
						<td> @if($compra->pagada) {{'SI'}}  @endif </td>	
						<td width='10px'>  
						
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


