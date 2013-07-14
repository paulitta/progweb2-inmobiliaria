<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" media="screen" href="../css/style.css">
	<title>Untitled Document</title>
</head>

<body>
<table width="200" border="1" class="tabla-inmuebles">
	  <tr class="tabla-titulo">
		<td>Categoria</td>
		<td>Tipo</td>
	    <td>Ambientes</td>
	    <td>Direccion</td>
		<td>Ciudad</td>
	    <td>Descripcion</td>
	    <td>Operacion</td>
		<td>Precio</td>
		<td>Eliminar</td>
	    <td>Modificar</td>
      </tr>

<?php
	include_once("timeLogout.php");
	include_once("conexion.php");
	
	// Conectar a la base de datos
	mysql_connect ($server, $username, $password);
	mysql_select_db($database) or die('Cannot select database');
	
	$query = mysql_query("select i.cod, c.nombre as categoria, t.nombre as tipo, i.ambientes, i.direccion, ciu.nombre as ciudad, i.descripcion, i. operacion, i.moneda, i.precio, i.fecha_publi
							from inmueble i, categoria c, tipo t, ciudad ciu
							where i.id_cat = c.id_cat
							and i.id_tipo = t.id_tipo
							and i.id_ciudad = ciu.id_ciudad") or die(mysql_error());
		
	while($data = mysql_fetch_array($query))
	{
		echo "<tr>";
		echo "<td>".$data['categoria']."</td>";
		echo "<td>".$data['tipo']."</td>";
		echo "<td>".$data['ambientes']."</td>";
		echo "<td>".$data['direccion']."</td>";
		echo "<td>".$data['ciudad']."</td>";
		echo "<td>".$data['descripcion']."</td>";
		echo "<td>".$data['operacion']."</td>";
		
		if ($data['moneda'] == 'pesos'){
			echo "<td>$".$data['precio']."</td>";
		}else{
			echo "<td>U$"."S".$data['precio']."</td>";
		}
		
		echo "<td><a href="."../php/inmueble_eliminar.php"."><img src="."../images/delete.jpg"."></a></td>";
		echo "<td><a href="."../php/inmueble_editar.php"."><img src="."../images/edit.png"."></a></td>";
		echo " </tr>";	
	}
?>
</table>
</body>
</html>