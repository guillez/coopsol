<img src="img/coop.png" alt="Smiley face" height="100" width="600">

<br><br>
<table border="2" >
LISTADO DE PRODUCTOS
<tbody>
    @foreach ($carritos as $carrito)


<tr>
<td >{{ $carrito->producto }}</td>
<td style="width: 20px; border:none; ">&nbsp; </td>
<td style="width: 20px;  text-align: left;">{{ $carrito->cantidad }}</td>


</tr>
        @endforeach
</tbody>
</table>
<br>
 IDENTIFICACION: {{ $carrito->nombre }}-{{ $carrito->email }}<br>
FECHA/HORA: {{ date("d/m/Y h:m") }} 



