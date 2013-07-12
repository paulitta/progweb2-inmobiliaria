<?php 


if ($_REQUEST['catego'] == 0) {
	echo "<div class='hidden'><label>Tipo</label>
	<select name='tipo' ><option value=0>Todos</option>
	</select></div>";
}


if ($_REQUEST['catego'] == 1) {
	echo "<label>Tipo</label>
	<select name='tipo' >
	<option value=0>Todos</option>
	<option value=1>casa</option>
	<option value=2>chalet</option>
	<option value=3>triplex</option>
	</select>";
}


if ($_REQUEST['catego'] == 2) {
	echo "<label>Tipo</label>
	<select name='tipo' >
	<option value=0>Todos</option>
	<option value=4>departamento</option>
	<option value=5>duplex</option>
	<option value=6>PH</option>
	</select>";
}
if ($_REQUEST['catego'] == 3) {
	echo "<label>Tipo</label>
	<select name='tipo' >
	<option value=7>local</option>
	</select>";
}

if ($_REQUEST['catego'] == 4) {
	echo "<label>Tipo</label>
	<select name='tipo' >
	<option value=8>lote</option>
	</select>";
}
?>