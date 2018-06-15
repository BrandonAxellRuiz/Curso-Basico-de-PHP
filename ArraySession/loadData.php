<?php 
    //Quita los errores y warnings de php
    error_reporting(1);
    //funciona para inicializar las variables de tipo $_SESSION
    session_start();

    if (isset($_POST['Name'], $_POST['LastName'], $_POST['Phone'], $_POST['Email'], $_POST['Password'], $_POST['ConfirmPassword'])) {
        //echo $_POST['Name'] . $_POST['LastName'] . $_POST['Phone'] . $_POST['Email'] . $_POST['Password'] . $_POST['ConfirmPassword'];

        // creamos un arreglo de los valores $_POST para poder usarlo en el ciclo y simplificar nuestro codigo
        $ArragloPOST = [$_POST['Name'], $_POST['LastName'], $_POST['Phone'], $_POST['Email'], $_POST['Password'], $_POST['ConfirmPassword']];

        //creamos un arreglo con el nombre de los campos para posteriormente crear las sesiones con su valor del $_POST
        $ArragloNameValues = ['Name', 'LastName', 'Phone', 'Email', 'Password', 'ConfirmPassword'];

        //validamos que la sesion de la nueva posicion enviada exista o no
        if (isset($_SESSION['Row'])) {
            //si existe se setea sumandole al valor actual 1 para que sea diferente de la anterior
            $_SESSION['Row'] = $_SESSION['Row'] + 1;
        } else {
            //en caso de no existir la inicializamos con el valor 1
            $_SESSION['Row'] = 1;
        }

        //cramos un ciclo para descoponer el arreglo de los valores $_POST e indexarlos a nuestras sesiones
        // el nombre de $ArragloNameValues en la posicion concatenando el $_SESSION['row'] 
        for($i = 0; $i < count($ArragloPOST); $i++){

            /*ejemplo: $ArragloNameValues[$i]. $_SESSION['Row'] equivale a  'Name1' y asi para cada valor dependiendo
              el valor de $_SESSION['Row'] en este caso del ejemplo equivale a 1 es por eso que es 'Name1'
            */
            $_SESSION[$ArragloNameValues[$i]. $_SESSION['Row']] = $ArragloPOST[$i];
        }

        // descomenta este cilco es solo para mostrar los valores del array que fuen enviado y como se indexo
        for($i = 0; $i < count($ArragloNameValues); $i++){
            echo $_SESSION[$ArragloNameValues[$i]. $_SESSION['Row'] ];
            echo $ArragloNameValues[$i] . $_SESSION['Row'] ;
        }
        
        //comenta esta linea si deseas ver el ciclo de arriba ya que funciona para enviar despues de todo al index de nuevo
        header('Location: index.php');
    }

    ?>
