<?php
	if(isset($_POST["crearJugador"])){
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$nickname=$_POST['nick'];
		$numCamiseta=$_POST['numCamiseta'];
		$nacionalidad=$_POST['nacionalidad'];
		$imagen=$_FILES['upload']['tmp_name'];

		include ("conexion.php");
		$conn = OCILogon($user, $pass, $db);
		$stid = oci_parse($conn, "begin le.DELETE_DRINKER('$idEliminar'); end;");
	    oci_execute($stid);

	    OCILogoff($conn);
	}
?>