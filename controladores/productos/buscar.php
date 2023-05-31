<?php
require '../../modelos/Clientes.php';
try {
    $cliente = new Cliente($_GET);
    
    $clientes = $cliente->buscar();
    // echo "<pre>";
    // var_dump($productos);
    // echo "</pre>";
    // exit;
    // $error = "NO se guardó correctamente";
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2){
    $error = $e2->getMessage();
}

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
            margin-left: 650px;
        }
        #alert{
            margin-left:60px;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>NO. </th>
                            <th>NOMBRE</th>
                            <th>NIT</th>
                            <th>MODIFICAR</th>
                            <th>ELIMINAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($clientes) > 0):?>
                        <?php foreach($clientes as $key => $cliente) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $cliente['CLIENTE_NOMBRE'] ?></td>
                            <td><?= $cliente['CLIENTE_NIT'] ?></td>
                            <td><a class="btn btn-warning w-100" href="/practica_08/vistas/productos/modificar.php?cliente_id=<?= $cliente['CLIENTE_ID']?>">Modificar</a></td>
                            <td><a class="btn btn-danger w-100" href="/practica_08/controladores/productos/eliminar.php?cliente_id=<?= $cliente['CLIENTE_ID']?>">Eliminar</a></td>
                        </tr>
                        <?php endforeach ?>
                        <?php else :?>
                            <tr>
                                <td colspan="3">NO EXISTEN REGISTROS</td>
                            </tr>
                        <?php endif?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <a href="/practica_08/vistas/productos/buscar.php" class="btn btn-info w-100">Volver al formulario</a>
            </div>
        </div>
    </div>
</body>
</html>