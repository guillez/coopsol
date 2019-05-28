
<table style="height: 239px; width: 476px; border: none !important; " >
<tbody>
    @foreach ($canastas as $canasta)


<tr>
<td style="width: 25px; border:none; ">{{ $persona->id }}&nbsp;</td>
<td style="width: 20px; border:none; text-align: left;">{{ $persona->apellido }}&nbsp;</td>
<td style="width: 20px; ">{{ $canasta->id }}&nbsp; </td>
</tr>
        @endforeach
</tbody>
</table>
<p style="text-align: right;">&nbsp;</p>
<p>&nbsp;</p>
</div>
