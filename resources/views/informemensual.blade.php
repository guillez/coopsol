
<table style="height: 239px; width: 476px; border: none !important; " >
<tbody>
    @foreach ($personas as $persona)


<tr>
<td style="width: 5px; ">{{ $persona->id }}&nbsp;</td>
<td style="width: 10px; text-align: left;">{{ $persona->documento }}&nbsp;</td>
<td style="width: 20px; ">&nbsp;{{ $persona->apellido }} </td>
<td style="width: 20px; ">&nbsp;{{ $persona->nombre }} </td>
<td style="width: 10px; ">&nbsp;{{ $persona->fechanac }} </td>
<td style="width: 10px; ">&nbsp;{{ $persona->nacionalidad }} </td>
</tr>
        @endforeach
</tbody>
</table>
<p style="text-align: right;">&nbsp;</p>
<p>&nbsp;</p>
</div>
