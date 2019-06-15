<img src="img/coop.png" alt="Smiley face" height="100" width="600">

<br><br>
<table border="2" >
LISTADO DE PRODUCTOS
<tbody>
<tr>
<td >Producto</td>
<td style="width: 20px;  ">Gs x Unidad </td>
<td style="width: 20px;  text-align: left;">Cant. Comprada</td>


</tr>
    @foreach ($carritos as $carrito)


<tr>
<td >{{ $carrito->producto }}</td>
<td style="width: 20px; ">{{ $carrito->unidad }} </td>
<td style="width: 20px;  text-align: center;">{{ $carrito->cantidad }}</td>


</tr>
        @endforeach
</tbody>
</table>
<br>
{{ date_default_timezone_set('America/Argentina/Buenos_Aires') }}- 
 IDENTIFICACION: {{ $carrito->nombre }}-{{ $carrito->email }}<br>
FECHA/HORA: {{ date("d/m/Y h:m") }} 



