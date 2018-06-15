<?php
//Quita los errores y warnings de php
    error_reporting(1);

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
            Validar Formulario POST
            <br>
            <small>
                Practica 1
            </small>
        </h1>
    </div>
    <div class="container HeaderPaddingTop">
    
    <!-- 
        Creamos el formulario con los atributos de name y id para poder referenciarlos en script 
        Añadimos el atributo method para definir el metodo de envío del formulario POST (POST, GET, PUT, DELETE)
        Action para referenciar la ruta donde será enviado el formulario en el método definido 
    -->

    <form id="MyFormToValidate" name="MyFormToValidate" method="POST" action="#">
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
            // validamos que el recibamos el envio de las variables para mostrarlas de lo contrario no muestra nada
            if (isset($_POST['Name'], $_POST['LastName'], $_POST['Phone'], $_POST['Email'], $_POST['Password'], $_POST['ConfirmPassword'])) {
     
                /*
                    creamos un array para poder descomponerlo con los nombres de cada uno de los campos que 
                    tenemos en nuestro formulario que y asi mostrarlos
                */
                $ArragloNameValues = ['Name', 'LastName', 'Phone', 'Email', 'Password', 'ConfirmPassword'];
            
                    /* 
                        creamos un cliclo para descomponer los valores que tenemos en nuestro array $ArragloNameValues
                        y asi poder crear cada <td></td> con el valor que enviamos desde nuestros inputs
                */
                    for($i = 0; $i < count($ArragloNameValues); $i++){

                        /*
                            mostramos cada valor que contiene la $_POST[]
                            dentro de los campos de formulario tipo $_POST[] tenemos un variable que hace referencia a 
                            $ArragloNameValues = [Name', 'LastName', 'Phone', 'Email', 'Password', 'ConfirmPassword'];
                            despues tenemos corchetes que referencian a $i que es la pocion de el ciclo para poder acceder
                            a cada posicion
                            ejemplo: seria igual $_POST[$ArragloNameValues[$i]] equivalente $_POST['Name']
                            y asi como en todo el arreglo
                            */
                            echo '<th>'.$ArragloNameValues[$i].'</th>
                            <td>'.$_POST[$ArragloNameValues[$i]].'</td>';
                            
                    
                    }
                    //finalizamos el cuerpo de la tabla
                    echo '</tbody>';
            }
    
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
