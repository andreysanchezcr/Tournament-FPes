<?php
	include ("conexion.php");
	$conn = OCILogon($user, $pass, $db);
	$outrefc = ocinewcursor($conn); //Declare cursor variable
	if(isset($_POST["crear"])){
		$nombre=$_POST["nombre"];
		$capacidad=$_POST["capacidad"];
		$pais=$_POST["pais"];
		$ciudad=$_POST["ciudad"];
		$descripcion=$_POST["descripcion"];

		//GUARDO BANDERA
		$stid = oci_parse($conn, "begin :ret :=getSequenceflag(); end;");
		oci_bind_by_name($stid, ':ret', $id_flag, 200);
		oci_execute($stid);
		$lob = oci_new_descriptor($conn, OCI_D_LOB);
		$imagen="cargarBandera";
		$stmt = oci_parse($conn, 'INSERT INTO STADIUM (BLOBDATA,ID_FLAG) '
             .'VALUES(EMPTY_BLOB(),:id) RETURNING BLOBDATA INTO :BLOBDATA');
	      oci_bind_by_name($stmt, ':id', $id_flag);
	      oci_bind_by_name($stmt, ':BLOBDATA', $lob, -1, OCI_B_BLOB);
	      oci_execute($stmt, OCI_DEFAULT);
	      
	      if ($lob->savefile($_FILES[$imagen]['tmp_name'])) {
	        oci_commit($conn);
	      }else{
	        $error="Ha surgido un error, favor volver a intentar.";
	        echo"<script>alert('$error')</script>";
	      }
	      $lob->free();
	      oci_free_statement($stmt);

	}else if(isset($_POST["editar"])){

	}

	OCILogoff($conn);
?>