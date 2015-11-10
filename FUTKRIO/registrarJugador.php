<?php
	if(isset($_POST["crearJugador"])){
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$nickname=$_POST['nick'];
		$numCamiseta=$_POST['numCamiseta'];
		$nacionalidad=$_POST['nacionalidad'];
		$genero=$_POST['genero'];

		$genero=0;
		$numCamiseta=1;

		include ("conexion.php");
		$conn = OCILogon($user, $pass, $db);

		$outrefc = ocinewcursor($conn); //Declare cursor variable

		$stid = oci_parse($conn, "begin :ret :=getSequencePlayer(); end;");
		oci_bind_by_name($stid, ':ret', $id_persona, 200);
		oci_execute($stid);

		$stid = oci_parse($conn, "begin :ret :=getIDPais('$nacionalidad'); end;");
		oci_bind_by_name($stid, ':ret', $ciudad, 200);
		oci_execute($stid);

		$lob = oci_new_descriptor($conn, OCI_D_LOB);
		$imagen="imagenNueva";
		$stmt = oci_parse($conn, 'INSERT INTO Player (BLOBDATA,ID_PLAYER,FIRST_NAME,LAST_NAME,NICKNAME,T_SHIRT_NUM,FK_COUNTRY_ID,GENRE) '
             .'VALUES(EMPTY_BLOB(),:id,:nom,:ape,:nickna,:shirt,:ciu,:gene) RETURNING BLOBDATA INTO :BLOBDATA');
	      oci_bind_by_name($stmt, ':id', $id_persona);
	      oci_bind_by_name($stmt, ':nom', $nombre);
	      oci_bind_by_name($stmt, ':ape', $apellido);
	      oci_bind_by_name($stmt, ':nickna', $nickname);
	      oci_bind_by_name($stmt, ':shirt', $numCamiseta);
	      oci_bind_by_name($stmt, ':ciu', $ciudad);
	      oci_bind_by_name($stmt, ':gene', $genero);
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


	    $pagina="Players.php";
	    echo"<script>window.location='$pagina';</script>";

	    OCILogoff($conn);
	}
?>