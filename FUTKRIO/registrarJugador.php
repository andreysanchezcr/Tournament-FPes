<?php
	if(isset($_POST["crearJugador"])){
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$nickname=$_POST['nick'];
		$numCamiseta=$_POST['numCamiseta'];
		$nacionalidad=$_POST['nacionalidad'];
		$imagen=$_FILES['upload']['tmp_name'];
		$genero=$_POST['genero'];

		$genero=0;
		$ciudad=1;
		$numCamiseta=1;

		include ("conexion.php");
		$conn = OCILogon($user, $pass, $db);


		insert into Player(Id_Player,First_Name,Last_Name,Nickname,t_Shirt_Num,Photo,Fk_Country_Id,Genre)
 	 VALUES(SEQ_PLAYER.Nextval,pName,pLast,pNick,pShirt,pPhoto,pCountry,pGenre);


		$stmt = oci_parse($conn, 'INSERT INTO Player (BLOBDATA,FK_PERSON_ID,IMGPOS) '
             .'VALUES(EMPTY_BLOB(),:MYBLOBID,:POS) RETURNING BLOBDATA INTO :BLOBDATA');
	      oci_bind_by_name($stmt, ':MYBLOBID', $id_person);
	      oci_bind_by_name($stmt, ':POS', $pos);
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
	    //echo"<script>window.location='$pagina';</script>";
	}
?>