
<div class="form-group"> 
	{{ Form::label('descripcion','descripcion') }}
	{{ Form::text('descripcion', null, ['class'=>'form-control','descripcion'=>'descripcion']) }}
</div>

<div class="form-group"> 
	{{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) }}
</div>


