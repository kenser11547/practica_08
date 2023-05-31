<?php
require '../../modelos/Clientes.php';


    try {
        $cliente = new Cliente($_GET);
        $resultado = $cliente->eliminar();

    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }



// if($resultado){
//     echo "Guardado exitosamente";
// }else{
//     echo "Ocurrió un error: $error";
// }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Resultados</title>
    <style>
                * {
            margin: 25;
            padding: 5;
            box-sizing: border-box;
        }
        /*aqui se diseña el cuerpo de la pagina*/

        body {
            background-image: url(./fondo.jpg);
            background-size:cover;
            background-attachment: fixed;

        }

        /*diseño del tipo de texto h1*/
        h1 {
            color: rgba(255, 255, 255, 0.948);
            font-family: 'ALGERIAN';
            text-shadow:2px 2px 1px rgb(1, 1, 1);
        
        }
        /*diseño del tipo de texto h2*/
        h2 {
            color: rgb(0, 0, 0);
            text-align: center;
            text-shadow: 2px 2px 2px whitesmoke;
            border-color: azure;
            border-radius: 4px;
            font-family: 'calibri';
            background: rgba(204, 202, 204, 0.705);
            opacity: 0.7;
            box-shadow: 1px 1px 10px gold;
        }
        /*diseño del contenedor*/
        .container {

            justify-content: center;
            width: 600px;
            margin-top: 75px;
            margin-left: 450px;
        }
        #alert{
            margin-left:60px;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <?php if($resultado): ?>
                    <div class="alert alert-success" role="alert">
                        Eliminado exitosamente!
                    </div>
                <?php else :?>
                    <div class="alert alert-danger" role="alert">
                        Ocurrió un error: <?= $error ?>
                    </div>
                <?php endif ?>
              
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <a href="/practica_08/controladores/productos/buscar.php" class="btn btn-info">Volver al formulario</a>
            </div>
        </div>
    </div>
</body>
</html>