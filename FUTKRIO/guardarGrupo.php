<?php
	include ("conexion.php");
    $conn = OCILogon($user, $pass, $db);
    $nombre=$_GET["nombre"];
    $descripcion=$_GET["descripcion"];
    $feInicio=$_GET["fechaIni"];
    $fecFinal=$_GET["fechaFin"];
    $genero=$_GET["genero"];
    if($genero=="H"){
    	$genero=0;
    }else{
    	$genero=1;
    }
	$stid = oci_parse($conn, "begin lu.insert_Event('$nombre','$descripcion','$feInicio','$fecFinal','$genero'); end;");
	oci_execute($stid);

	$stid = oci_parse($conn, "begin :ret :=getSequenceactualevent(); end;");
	oci_bind_by_name($stid, ':ret', $idEvento, 200);
	oci_execute($stid);

	$array = $_GET['grupos'];
	$array=explode('!!',$array);
	for($i=0;$i<count($array);$i++){
		$subArray=explode('$$',$array[$i]);
		$nomGrupo=$subArray[0];
		//CREO Y GUARDO GRUPO
		$stid = oci_parse($conn, "begin lu.insert_Groupp('$nomGrupo'); end;");
		oci_execute($stid);

		$stid = oci_parse($conn, "begin :ret :=getSequenceactualgroupp(); end;");
		oci_bind_by_name($stid, ':ret', $idgrupo, 200);
		oci_execute($stid);

		for($j=1;$j<count($subArray);$j++){
			$nomEquipo=$subArray[$j];
			$stid = oci_parse($conn, "begin :ret :=getIDTeam('$nomEquipo'); end;");
			oci_bind_by_name($stid, ':ret', $idteam, 200);
			oci_execute($stid);
			//GUARDO EQUIPO POR GRUPO
			$stid = oci_parse($conn, "begin lu.insert_EventxTeam('$idEvento','$idteam','$idgrupo'); end;");
			oci_execute($stid);
		}
	}
	
	$array = $_GET['partidos'];
	$array=explode('!!',$array);
	for($i=0;$i<count($array);$i++){
		$subArray=explode('$$',$array[$i]);
		$equi1=$subArray[0];
		$equi2=$subArray[1];
		$stid = oci_parse($conn, "begin :ret :=getIDTeam('$equi1'); end;");
		oci_bind_by_name($stid, ':ret', $idteam1, 200);
		oci_execute($stid);
		$stid = oci_parse($conn, "begin :ret :=getIDTeam('$equi2'); end;");
		oci_bind_by_name($stid, ':ret', $idteam2, 200);
		oci_execute($stid);
		$fechaPartido=$subArray[2];
		$stid = oci_parse($conn, "begin lu.insert_Match('$idteam1','$idteam2','$fechaPartido'); end;");
		oci_execute($stid);
	}

	OCILogoff($conn);

	$pagina="Eventos.php";
	echo "<script type='text/javascript'>window.location='$pagina';</script>";
?>