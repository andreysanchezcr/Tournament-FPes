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
		$stid = oci_parse($conn, "begin :ret :=getIDCity('$ciudad','$pais'); end;");
		oci_bind_by_name($stid, ':ret', $id_city, 200);
		oci_execute($stid);

		$stid = oci_parse($conn, "begin :ret :=getSequencestadium(); end;");
		oci_bind_by_name($stid, ':ret', $id_stadio, 200);
		oci_execute($stid);
		$lob = oci_new_descriptor($conn, OCI_D_LOB);
		$imagen="foto";
		$stmt = oci_parse($conn, 'INSERT INTO STADIUM (BLOBDATA,ID_STADIUM,DESCRIPCION,NAME_STADIUM,CAPASITY,FK_CITY_ID) '
             .'VALUES(EMPTY_BLOB(),:id,:descrip,:nom,:capa,:ciudfk) RETURNING BLOBDATA INTO :BLOBDATA');
	      oci_bind_by_name($stmt, ':id', $id_stadio);
	      oci_bind_by_name($stmt, ':nom', $nombre);
	      oci_bind_by_name($stmt, ':capa', $capacidad);
	      oci_bind_by_name($stmt, ':ciudfk', $id_city);
	      oci_bind_by_name($stmt, ':descrip', $descripcion);
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

	      $pagina="Estadio.php";
	   	 echo"<script>window.location='$pagina';</script>";

	}else if(isset($_POST["editar"])){

	}

	OCILogoff($conn);
?>