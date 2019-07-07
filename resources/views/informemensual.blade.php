<img src="img/coop.png" alt="Smiley face" height="90" width="700">
<?php 
$suma=0;
$total=0;
?>
<br><br>
<table border="2" >
LISTADO DE PRODUCTOS
<tbody>
<tr>
<td style="width: 25px;  " >PRODUCTO</td>
<td style="width: 2px; border:none; ">&nbsp; </td>
<td style="width: 8px;  text-align: left;">CANT</td>
<td style="width: 2px; border:none; ">&nbsp; </td>
<td style="width: 10px;  text-align: left;">MONTO</td>
<td style="width: 2px; border:none; ">&nbsp; </td>
<td style="width: 10px;  text-align: left;">RELEVAMIENTO</td>
<td style="width: 2px; border:none; ">&nbsp; </td>
<td style="width: 10px;  text-align: left;">RELEVAMIENTO</td>
</tr>
    @foreach ($carritos as $carrito)


<tr>
<td style="width: 25px; font-size:80%;">{{ $carrito->descripcion }}[{{ $carrito->pid }}]</td>
<td style="width: 2px; border:none; font-size:80%; ">&nbsp; </td>
<td style="width: 10px;  text-align: center; font-size:80%;">{{ $carrito->cantidad }}</td>
<td style="width: 2px; border:none;  font-size:80%;">&nbsp; </td>
<td style="width: 10px;  text-align: left; font-size:80%;">{{ $carrito->monto }}</td>
<td style="width: 2px; border:none;  font-size:80%;">&nbsp; </td>
<td style="width: 10px;  text-align: left;; font-size:80%;">&nbsp;&nbsp;&nbsp;</td>
<td style="width: 2px; border:none;  font-size:80%;">&nbsp; </td>
<td style="width: 10px;  text-align: left; font-size:80%;">&nbsp;&nbsp;&nbsp;</td>
</tr>
<?php 
$suma=$carrito->cantidad*$carrito->monto;
$total=$total+$suma;
?>
        @endforeach
</tbody>
</table>
<br>
SUMATORIA TOTAL:{{ $total }} - FECHA/HORA: {{ date("d/m/Y h:m") }} 



