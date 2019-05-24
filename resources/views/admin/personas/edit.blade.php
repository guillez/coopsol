@extends('layouts.app')

@section('content')

<div class='container'>
	<div class='row'>
		<div class='col-md-8 col-md-offset-2'>
			<div class='panel panel-default'>
				<div class='panel-heading'>
					Editar Grupo
				</div>


				<div class='panel-body'>

				{!! Form::model($sidcer, ['route'=> ['sidcers.update', $sidcer->id] , 'method'=> 'PUT' ]) !!}

					@include('admin.sidcers.partials.form')

				{!! Form::close() !!}
				</div>	
			</div>			
		</div>
	</div>
</div>


@endsection
