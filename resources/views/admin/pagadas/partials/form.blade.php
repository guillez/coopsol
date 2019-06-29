@include('flash-message')



{{ Form::hidden('usuario_id', auth()->user()->id ) }}

{{ Form::hidden('monto', 0 ) }}
{{ Form::hidden('confirmada', 0 ) }}

<div class="form-group"> 
	{{ Form::label('canasta_id','Canasta') }}
	{{ Form::select('canasta_id', $canastas, null, ['class'=>'form-control']) }}
</div>


<div class="form-group"> 
	{{ Form::label('cantidad','Cantidad: ') }}<br />
{{ Form::radio('cantidad', '1', true, ['checked' => 'checked']) }}  1 Canasta (  500 $)<br />
{{ Form::radio('cantidad', '2', false) }}  2 Canastas ( 1000 $)<br />
{{ Form::radio('cantidad', '3', false) }}  3 Canastas ( 1500 $)<br />
{{ Form::radio('cantidad', '4', false) }}  4 Canastas ( 2000 $)<br />
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
