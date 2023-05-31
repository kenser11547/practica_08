<?php
require '../../modelos/Clientes.php';


if($_POST['cliente_nombre'] != '' && $_POST['cliente_nit'] != ''){



    try {
        $cliente = new Cliente($_POST);
        $resultado = $cliente->guardar();
        $error = "NO se guardó correctamente";
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
}else{
    $error = "Debe llenar todos los datos";
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
            margin: 15;
            padding: 5;
            box-sizing: border-box;
        }
        /*aqui se diseña el cuerpo de la pagina*/

        body {
            background-image: url(./fondo.jpg);
            background-size:cover;
            background-attachment: fixed;
            margin-left:0px;

        }

        /*diseño del contenedor*/
        .container {

            justify-content: center;
            width: 100px;
            margin-top: 15px;
            margin-left: 450px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <?php if($resultado): ?>
                    <div class="alert alert-success" role="alert">
                        Guardado exitosamente, el nit es válido!
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
                <a href="/practica_08/vistas/productos/index.php" class="btn btn-info">Volver al formulario</a>
            </div>
        </div>
    </div>
</body>
</html>
