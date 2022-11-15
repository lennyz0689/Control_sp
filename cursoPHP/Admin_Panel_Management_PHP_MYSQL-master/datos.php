<?php 
$conexion=mysqli_connect('localhost','root','','db_csp');
$continente=$_POST['Departamento'];

	$sql="SELECT id,
			 idDepartamendo,
			 municipio 
		from tbl_municipio 
		where idDepartamendo='$continente'";

	$result=mysqli_query($conexion,$sql);

	$cadena="<label>Municipio</label> 
			<select id='lista2' name='idMunicipio' class='form-control'>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[2]).'</option>';
	}

	echo  $cadena."</select>";
	

?>