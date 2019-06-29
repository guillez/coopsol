@include('flash-message')

<div class="form-group"> 
	{{ Form::label('descripcion','descripcion') }}
	{{ Form::text('descripcion', null, ['class'=>'form-control','descripcion'=>'descripcion']) }}
</div>
<div class="form-group"> 
	{{ Form::label('monto','monto') }}
	{{ Form::text('monto', null, ['class'=>'form-control','monto'=>'monto']) }}
</div>
<div class="form-group"> 
	{{ Form::label('unidad','unidad') }}
	{{ Form::text('unidad', null, ['class'=>'form-control','unidad'=>'unidad']) }}
</div>
<div class="form-group"> 
	{{ Form::label('proveedor_id','Proveedor') }}
	{{ Form::select('proveedor_id', $proveedores, null, ['class'=>'form-control']) }}
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
