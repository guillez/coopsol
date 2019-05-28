@include('flash-message')

{{ Form::hidden('usuario_id', auth()->user()->id ) }}

{{ Form::hidden('canasta_id', $canasta_id ) }}

<div class="form-group"> 
	{{ Form::label('producto_id','Producto') }}
	{{ Form::select('producto_id', $productos, null, ['class'=>'form-control']) }}
</div>

<div class="form-group"> 
	{{ Form::label('cantidad','Cantidad') }}
	{{ Form::select('cantidad', $cantidades, null, ['class'=>'form-control']) }}
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
