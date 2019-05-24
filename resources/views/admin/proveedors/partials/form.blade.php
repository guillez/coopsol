@include('flash-message')

<div class="form-group"> 
	{{ Form::label('descripcion','descripcion') }}
	{{ Form::text('descripcion', null, ['class'=>'form-control','descripcion'=>'descripcion']) }}
</div>
<div class="form-group"> 
	{{ Form::label('direccion','direccion') }}
	{{ Form::text('direccion', null, ['class'=>'form-control','direccion'=>'direccion']) }}
</div>
<div class="form-group"> 
	{{ Form::label('email','email') }}
	{{ Form::text('email', null, ['class'=>'form-control','email'=>'email']) }}
</div>
<div class="form-group"> 
	{{ Form::label('telefono','telefono') }}
	{{ Form::text('telefono', null, ['class'=>'form-control','telefono'=>'telefono']) }}
</div>
<div class="form-group"> 
	{{ Form::label('celular','celular') }}
	{{ Form::text('celular', null, ['class'=>'form-control','celular'=>'celular']) }}
</div>

<div class="form-group"> 
	{{ Form::submit('Guardar', ['class'=>'btn btn-sm btn-primary']) }}
</div>

@section('scripts')

<script src="{{ asset('vendors/stringToSlug/jquery.stringToSlug.js') }}"></script>

<script>
$(document).ready(function(){
	$("#descripcion, #direccion, #email, #telefono, #celular").stringToSlug({
		callback:function(text){
			$("#slug").val(text)
		}
	});
});
CKEDITOR.config.height = 400;
CKEDITOR.config.width = 'auto';
CKEDITOR.replace('body');
</script>

@endsection
