<?php
//Quita los errores y warnings de php
    error_reporting(1);
//funciona para inicializar las variables de tipo $_SESSION
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Validar Formulario</title>
    <!-- metas for device -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- include my style -->
    <style>
        .TextCenter {
            text-align: center;
        }

        .HeaderPaddingTop {
            padding-top: 50px;
        }
    </style>
    <!-- 
        include cdn bootstrap
        quita esta linea si deseas remove el diseño de la pagina 
    -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
   
   
</head>
<body>
    <div class="HeaderPaddingTop">
        <h1 class="TextCenter">
            Enviar POST y Array de SESSIONES 
            <br>
            <small>
                Practica 2
            </small>
        </h1>
    </div>
    <div class="container HeaderPaddingTop">
    
    <!-- 
        Creamos el formulario con los atributos de name y id para poder referenciarlos en script 
        Añadimos el atributo method para definir el metodo de envio del formulario POST (POST, GET, PUT, DELETE)
        Action para referenciar la ruta donde sera enviado el formulario en el metodo definido 
    -->

    <form id="MyFormToValidate" name="MyFormToValidate" method="POST" action="loadData.php">
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control validate" id="Name" name="Name" placeholder="Nombre" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Apellidos:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control validate" id="LastName" name="LastName" placeholder="Apellidos" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Telefono:</label>
            <div class="col-sm-10">
                <input type="tel" class="form-control validate" id="Phone" name="Phone" placeholder="878101009" required>
            </div>
        </div> 
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Email:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control validate" id="Email" name="Email" placeholder="tu_correo@gmail.com" required>
            </div>
        </div> 
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Contrasena:</label>
            <div class="col-sm-10">
                <input type="password" class="form-control validate" id="Password" name="Password" placeholder="Contraseña" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Confirmar Contrasena:</label>
            <div class="col-sm-10">
                <input type="password" class="form-control validate" id="ConfirmPassword" name="ConfirmPassword" placeholder="Confirmar Contraseña" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary" id="MyButton" name="MyButton">Enviar</button>
            </div>
        </div>
    </form>
    </div>

    <!-- 
        inicializamos nuestra tabla 
        si deseas que se vea diferente solo copia y pega a la
        la siguiente linea 
        class="table table-responsive"
    -->
    
    <table class="table table-sm table-hover table-responsive">
        
        <?php
        /*
            creamos un array para poder descomponerlo con los nombres de cada uno de los campos que 
            tenemos en nuestro formulario que y que seteamos en las $_SESSION[] y asi mostrarlas
        */
        $ArragloNameValues = array('#','Name', 'LastName', 'Phone', 'Email', 'Password', 'ConfirmPassword', 'Delete');
        
        /* 
            creamos un ciclo for para poder saber cuanto registro en sesion tenemos creados 
            y eso viene de la $_SESSION['Row'] que creamos en el documento loadData.php

        */
        for($im = 1; $im <= $_SESSION['Row']; $im++){
            /*
                imprimimos el encabesado de la tabla 
            */
            echo '<thead>';

            /*
                creamos un cliclo for para poder descomponer el array de $ArragloNameValues y para poder
                saber cuantas posiciones contiene el ciclo tenemos que usar el metodo count()
             */
            for($row = 0; $row < count($ArragloNameValues); $row++){
                /*
                    imprimimos el encabezado con los valores los nombre de cada campo
                */
                echo '<th>'.$ArragloNameValues[$row].'</th>';
            }

            /* 
                imprimimos el final del encabezado </thead>
                empezamos en el cuerpo de la tabla <tbody>
                dentro de los <td></td> tenemos las <b></b> que son para hacer mas negritas las letras "bold"
                la variable hace referencia al numero de vueltas que lleva el cliclo 
            */
            echo '
            </thead>
            <tbody>
                <td><b>' . $im . '</b></td>
            ';

            /* 
                creamos un cliclo para descomponer los valores que tenemos en nuestras $_SESSION[]
                y asi poder crear cada <td></td> con el valor que enviamos desde nuestros inputs
            */
            for($i = 0; $i < count($ArragloNameValues); $i++){

                /*
                    validamos que $i en la posicion cero no se muestre ya que en el $ArragloNameValues en esa 
                    posicion tenemos el signo de # que no contiene ningun valor en nuestras $_SESSION[]
                    solo se añadio para poder mostrarlo en la tabla en el con el valor de $im
                    
                 */
                if($i != 0){

                    /*
                        mostramos cada valor que contiene la $_SESSION[]
                        dentro de la sesion $_SESSION[] tenemos un variable que hace referencia a 
                        $ArragloNameValues = ['#','Name', 'LastName', 'Phone', 'Email', 'Password', 'ConfirmPassword'];
                        despues tenemos corchetes que referencian a $i que es la pocion de el ciclo para poder acceder
                        a cada posicion
                        ejemplo: seria igual $_SESSION[$ArragloNameValues[$i]] equivalente $_SESSION['Name']
                        y asi como en todo el arreglo
                        en el segundo parametro estamos concatenando la variable $im
                        (concatenado anadir un punto para unir cadenas de texto con variables o variables con variables)
                        en la posicion que se encuentra el ciclo
                        ejemplo: $_SESSION['Name'] que equivale a $_SESSION[[$ArragloNameValues[$i]]
                        uniremos concatenando con un punto la variable $im
                        $_SESSION[$ArragloNameValues[$i].$im]
                        que equivale en el ejemplo a
                        $_SESSION[$ArragloNameValues[$i].$im] equivalente $_SESSION['Name1']
                        y asi para cada uno de los valores del array 
                     */
                    echo '<td>' . $_SESSION[$ArragloNameValues[$i] . $im] . '</td>';
                    
                    if($i == 7){
                        echo '
                            <td>
                                <a class="btn btn-danger" href="deleteData.php?id='.$im.'">Eliminar</a>
                            </td>';
                    }
                    
                    /*
                        descomenta esta linea y la de 
                        echo json_encode($arr)
                        para poder ver el objeto JavaScript equivalente a como se forma la tabla
                    */
                    //$arr[$im][$i] = $_SESSION[$ArragloNameValues[$i] . $im];
            
                }

              
            }
            
            //finalizamos el cuerpo de la tabla
            echo '</tbody>';
            
        } 
        //descomente esta linea para ver el objeto json que se crea  
        //echo json_encode($arr);
            
        ?>
    </table>
   

<!-- include scripts  -->
<!-- no quites estos scripts son los que nos permiten usar los metodos 
    de la libreria de jquery 
--> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   
<!-- quita estos si quieres quitar el diseno -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    
<!-- no quites estos scripts son los que nos permiten usar los metodos 
    de la libreria de validaciones validate 
--> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
    <!-- include my script -->
    <script>
    // creamos un funcion anonima de auto carga, se inicializa cuando carga la pagina
        $(document).ready(function () {
            $("#MyFormToValidate").validate({
                rules: {
                    Name: {
                        required: true,
                        minlength: 2
                    }
                }
            });
        })

    </script>

</body>
</html>
