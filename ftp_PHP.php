<?php

    set_time_limit(0);

    function leerDierctorio($ruta){
        if($dir = opendir($ruta)){ 
            chdir($ruta);
            //Creamos los array de archivos y carpetas 
            $archivos=array();
            $carpetas=array();
            //Leemos todos los elementos del directorio 
            while (($leerDir = readdir($dir)) !== false){
                if(!is_dir ($leerDir)) array_push($archivos,$leerDir);
                else array_push($carpetas,$leerDir);
            }
            //Mostrar carpetas 
            foreach($carpetas as $aux){
                if ( $aux == '.' || $aux == '..' ) {
                # nada
                } else {
                    $new[] = $aux;
                    echo $ruta . $aux . "<br />";
            }
        } 
        //Mostrar Archivos 
        //foreach($archivos as $aux) echo "$aux<br />";
        //Cerrar directorio 
        closedir($dir);
        }

        return array($new);
    }

    

    function subirDirectorios( $dest, $source ){
        $server = "*****"; //address of ftp server (leave out ftp://)
        $ftp_user_name = "*****"; // Username
        $ftp_user_pass = "*****"; // Password
        $mode="FTP_BINARY";
        $connection = ftp_connect($server);
        $login = ftp_login($connection, $ftp_user_name, $ftp_user_pass);
        if (!$connection || !$login) { die('Connection attempt failed!'); }
        $upload = ftp_put($connection, $dest, $source, FTP_BINARY);
        if (!$upload) { $temp = $source . 'FTP upload failed!'; }
        ftp_close($connection);
        $temp =  $source . " done";

        return $temp;
    }

    function bajarDirectorios( $dest, $source ){
        $server = "*****"; //address of ftp server (leave out ftp://)
        $ftp_user_name = "*****"; // Username
        $ftp_user_pass = "*****"; // Password
        $mode="FTP_BINARY";
        $connection = ftp_connect($server);
        $login = ftp_login($connection, $ftp_user_name, $ftp_user_pass);
        if (!$connection || !$login) { die('Connection attempt failed!'); }
        // intenta descargar $server_file y guardarlo en $local_file
        $upload = ftp_get($connection, $dest, $source, FTP_BINARY);
        if (!$upload) { $temp = $source . 'FTP download failed!'; }
        ftp_close($connection);
        $temp =  $source . " download done";

        return $temp;
    }

    function copiarArchivo( $dirAnt, $dirNuevo ){
        if ( !copy( $dirAnt , $dirNuevo ) ) {
            $mensaje = "No se ha podido copiar - " . $dirAnt;
        } else {
            $mensaje = "Se copio con exito - " . $dirAnt;
        }
        return $mensaje;
        
    }

    $doc = leerDierctorio( 'C:/wamp/www/DOMINIOS-FULL/NACIONALINGLES/' );

    $dirActual = 'C:/wamp/www/DOMINIOS-FULL/NACIONALINGLES/';
    $archivo[0] = 'C:/wamp/www/DOMINIOS-FULL/NACIONALINGLES/*****/img/close2.png';
    $archivo[1] = 'C:/wamp/www/DOMINIOS-FULL/NACIONALINGLES/*****/404.php';
    $archivo[2] = 'C:/wamp/www/DOMINIOS-FULL/NACIONALINGLES/*****/.htaccess';
    $archivo[3] = 'C:/wamp/www/DOMINIOS-FULL/NACIONALINGLES/*****/robots.txt';
    $archivo[4] = 'C:/wamp/www/DOMINIOS-FULL/NACIONALINGLES/*****/sitemap.xml';
    $archivo[5] = 'C:/wamp/www/DOMINIOS-FULL/NACIONALINGLES/*****/img/promos/publi_side.jpg';
    $archivo[6] = 'C:/wamp/www/DOMINIOS-FULL/NACIONALINGLES/*****/img/contacto.gif';
    $archivo[7] = 'C:/wamp/www/DOMINIOS-FULL/NACIONALINGLES/*****/img/tache.png';
    $archivo[8] = 'C:/wamp/www/DOMINIOS-FULL/NACIONALINGLES/*****/js/inicio.js';
    $archivo[9] = 'C:/wamp/www/DOMINIOS-FULL/NACIONALINGLES/*****/include/tiempo.php';


    $archDestino[0] = '/img/close2.png';
    $archDestino[1] = '/404.php';
    $archDestino[2] = '/.htaccess';
    $archDestino[3] = '/robots.txt';
    $archDestino[4] = '/sitemap.xml';
    $archDestino[5] = '/img/promos/publi_side.jpg';
    $archDestino[6] = '/img/contacto.gif';
    $archDestino[7] = '/img/tache.png';
    $archDestino[8] = '/js/inicio.js';
    $archDestino[9] = '/include/tiempo.php';

    var_dump($doc);

    foreach ($doc as $key) {
        foreach ($key as $key2) {

            $destino = $dirActual . $key2;

            for ($i=0; $i <= 9 ; $i++) { 
                $destinoCopiar = $destino . $archDestino[$i];
                /*$temp2 = copiarArchivo( $archivo[$i], $destinoCopiar  );
                echo $temp2 . '<br />';*/
                echo $destinoCopiar . '<br />';
            }
        }
    }

    /*foreach ($doc as $key) {
        foreach ($key as $key2) {
            $source = '/' . $key2 . $archivoTrans;
            $destino = $dirActual . $key2 . $archivoTrans;

            $temp2 = bajarDirectorios( $destino, $source );

            echo $source;
            echo ' ';
            echo $destino;
            echo '<br>';

            echo $temp2;
            echo '<br>';
        }
    }*/

    /*foreach ($doc as $key) {
        foreach ($key as $key2) {
            $source = '/' . $key2 . $archivoTrans;
            $destino = $dirActual . $key2 . $archivoTrans;

            $temp2 = subirDirectorios( $source, $destino );

            echo $source;
            echo ' ';
            echo $destino;
            echo '<br>';

            echo $temp2;
            echo '<br>';
        }
    }*/

?>
