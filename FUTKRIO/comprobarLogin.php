<?php
    if(isset($_POST["entrar"])){
        $frase = $_POST["user"];
        $clave = $_POST["contra"];
        $encriptado = encriptar_AES($frase, $clave);
        $frase = desencriptar_AES($encriptado, $clave);
        //echo $encriptado;
        include ("conexion.php");
        $conn = OCILogon($user, $pass, $db);
        $outrefc = ocinewcursor($conn); //Declare cursor variable
        $mycursor = ociparse ($conn, "begin getAdmin(:curs) ; end;"); // prepare procedure call
        ocibindbyname($mycursor, ':curs', $outrefc, -1, OCI_B_CURSOR); // bind procedure parameters
        $ret = ociexecute($mycursor); // Execute function
        $ret = ociexecute($outrefc); // Execute cursor
        $nrows = ocifetchstatement($outrefc, $data); // fetch data from cursor
        ocifreestatement($mycursor); // close procedure call
        ocifreestatement($outrefc); // close cursor
        $existe=0;
        for($i=0;$i<count($data['NICK_NAME']);$i++){
          $name=$data['NICK_NAME'][$i];
          $pass=$data['PASSWORD'][$i];
          $desencriptado=desencriptar_AES($name, $pass);
          if($pass==$clave && $frase==$desencriptado){
            $existe=1;
            $i=count($data['NICK_NAME']);
          }
        }

        $lugar="login.php";
        if($existe>0){
            $error="Bienvenido Admin!!";
            $lugar="index.php";
            echo "<script type='text/javascript'>alert('$error');</script>";
        }else{
            $error="Usuario no registrado";
            echo "<script type='text/javascript'>alert('$error');</script>";
        }
        echo "<script type='text/javascript'>window.location='$lugar';</script>";
        //$desencriptado = desencriptar_AES($encriptado, $clave);
        //echo $desencriptado;

        /*REFERENCIAS
        http://www.comdigitalpro.com/php/como-encriptar-en-php-encriptacion-cifrado-con-el-algoritmo-aes_179.html*/
    }
    function encriptar_AES($string, $key)
        {
            $td = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, '');
            $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_DEV_URANDOM );
            mcrypt_generic_init($td, $key, $iv);
            $encrypted_data_bin = mcrypt_generic($td, $string);
            mcrypt_generic_deinit($td);
            mcrypt_module_close($td);
            $encrypted_data_hex = bin2hex($iv).bin2hex($encrypted_data_bin);
            return $encrypted_data_hex;
        }

        function desencriptar_AES($encrypted_data_hex, $key)
        {
            $td = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, '');
            $iv_size_hex = mcrypt_enc_get_iv_size($td)*2;
            $iv = pack("H*", substr($encrypted_data_hex, 0, $iv_size_hex));
            $encrypted_data_bin = pack("H*", substr($encrypted_data_hex, $iv_size_hex));
            mcrypt_generic_init($td, $key, $iv);
            $decrypted = mdecrypt_generic($td, $encrypted_data_bin);
            mcrypt_generic_deinit($td);
            mcrypt_module_close($td);
            return $decrypted;
        }
?>	