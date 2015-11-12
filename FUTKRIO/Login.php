
	<head>
		<title> Futball</title>
		<title>Jugadores</title> 
		<meta charset = "utf-8"/>
		<meta description ="Love Ink una pagina web que no robara tu informacion para conquistar el mundo">

		<link  rel="stylesheet" type="text/css" href="css/MenuPrincipaJugadores.css"/>
		<link  rel="stylesheet" type="text/css" href="css/input-Style.css"/>
		<link rel="stylesheet" type="text/css" href="css/select-Style.css">

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script language="javascript" type="text/javascript" src="js/InputAnimation.js">
		</script>
	</head>
	<body>
		<div>
			<form action='comprobarLogin.php' method='POST' enctype="multipart/form-data">
				<div class="mat-div">
					<div id="Label_Usuario">
		    			<label for="first-name" class="mat-label">Usuario</label>
		    			<input type="text" class="mat-input" name="user" id="usuario"></input>
	  				</div>
				</div>
				<div class="mat-div">
					<div id="Label_Contraseña">
		    			<label for="first-name" class="mat-label">Contraseña</label>
		    			<input type="password" class="mat-input" name="contra" id="contraseña"></input>
	  				</div>
				</div>
				<input type="submit" value="Entrar" name="entrar" id="Login"></input>
			</form>
		</div>
	</body>