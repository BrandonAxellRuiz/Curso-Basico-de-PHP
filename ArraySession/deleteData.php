<?php 
    session_start();
    if($_GET['id']){
        
        //creamos un arreglo con el nombre de los campos para posteriormente crear las sesiones con su valor del $_POST
        $ArragloNameValues = [$_GET['id'], 'Name'.$_GET['id'], 'LastName'.$_GET['id'], 'Phone'.$_GET['id'], 'Email'.$_GET['id'], 'Password'.$_GET['id'], 'ConfirmPassword'.$_GET['id']];
        for($i = 0; $i < count($ArragloNameValues); $i++){
            unset($_SESSION[$ArragloNameValues[$i]]);
        }
    }
    header("Location: index.php")
?>
