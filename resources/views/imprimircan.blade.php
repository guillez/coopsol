<img src="img/coop.png" alt="Smiley face" height="110" width="720">

<br><br>
<table border="2" >
LISTADO DE PRODUCTOS
<tbody>
<tr>
<td style="width: 70px;  ">Producto</td>
<td style="width: 8px;  ">Gs x Unidad </td>
<td style="width: 8px;  ">Precio U.</td>
<td style="width: 8px;  text-align: left;">Cant. Comprada</td>
<td style="width: 8px;  ">Precio x Cant</td>
<?php $subtotal=0; ?>
</tr>
    @foreach ($carritos as $carrito)


<tr>
<td style="width: 70px;  ">{{ $carrito->producto }}</td>
<td style="width: 8px; ">{{ $carrito->unidad }} </td>
<td style="width: 8px; ">{{ $carrito->monto }} </td>
<td style="width: 8px;  text-align: center;">{{ $carrito->cantidad }}</td>

<?php $subtotal=$subtotal+($carrito->monto*$carrito->cantidad); ?>
<td style="width: 8px;  text-align: center;">{{ $carrito->monto*$carrito->cantidad }}</td>
</tr>
<?php
//$mensaje="";
//if($carrito->pagado!=1){
	//$mensaje="RECORDAR QUE SE DEBE HACER EFECTIVO EL PAGO PARA QUE LA COMPRA SE REALICE.";
//}
?>
        @endforeach
<tr>
<?php
//$mensaje="";
//if($carrito->pagado!=1){
	$mensaje="RECORDAR QUE SE DEBE HACER EFECTIVO EL PAGO PARA QUE LA COMPRA SE REALICE.";
//}
?>
<td style="width: 70px; border:none; " colspan=5  >{{ $mensaje }}</td>


</tr>
<tr>
<td style="width: 70px; border:none;" ></td>
<td style="width: 8px;border:none; "> </td>
<td style="width: 8px; border:none;"> </td>
<td style="width: 8px; "> Total: </td>
<td style="width: 8px; text-align: center;">{{ $subtotal }} </td>

</tr>
</tbody>
</table>
<br>
<?php date_default_timezone_set('America/Argentina/Buenos_Aires'); ?> 
 IDENTIFICACION: {{ $carrito->nombre }}-{{ $carrito->email }}<br>
FECHA/HORA: {{ date("d/m/Y h:m") }} 



