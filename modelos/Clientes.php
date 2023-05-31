<?php
require 'Conexion.php';

class Cliente extends Conexion{
    public $cliente_id;
    public $cliente_nombre;
    public $cliente_nit;
    public $cliente_situacion;


    public function __construct($args = [] )
    {
        $this->cliente_id = $args['cliente_id'] ?? null;
        $this->cliente_nombre = $args['cliente_nombre'] ?? '';
        $this->cliente_nit = $args['cliente_nit'] ?? '';
        $this->cliente_situacion = $args['cliente_situacion'] ?? '';
    }

    public function guardar(){
        // Validar el NIT antes de guardar los datos
        if (!$this->validarNit($this->cliente_nit)) {
            echo "<center><h1>El NIT ingresado es inválido. No se guardarán los datos.</h1><center>";
            // Detener la ejecución del código o redirigir a otra página, según sea necesario
            echo '<div class="row">
                    <div class="col-lg-4">
                        <a href="/practica_08/vistas/productos/index.php" class="btn btn-info w-100">Volver al formulario</a>
                    </div>
                </div>';
            exit();
        }
    
        $sql = "INSERT INTO clientes (cliente_nombre, cliente_nit) VALUES ('$this->cliente_nombre','$this->cliente_nit')";
        $resultado = self::ejecutar($sql);

           
        if ($resultado) {
        } else {
            echo "Error al guardar los datos.";
        }
        
        return $resultado;
    }
    

    public function buscar(){
        $sql = "SELECT * from clientes where cliente_situacion = 1 ";

        if($this->cliente_nombre != ''){
            $sql .= " and cliente_nombre like '%$this->cliente_nombre%' ";
        }

        if($this->cliente_nit != ''){
            $sql .= " and cliente_nit = $this->cliente_nit ";
        }

        if($this->cliente_id != null){
            $sql .= " and cliente_id = $this->cliente_id ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE clientes  SET cliente_nombre = '$this->cliente_nombre', cliente_nit = $this->cliente_nit where cliente_id = $this->cliente_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "UPDATE clientes  SET cliente_situacion = 0 where cliente_id = $this->cliente_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function validarNit($cliente_nit){
        // Eliminar cualquier guión o espacio en blanco del NIT
        $cliente_nit = str_replace(['-', ' '], '', $cliente_nit);
    
        // Verificar si el NIT tiene 8 dígitos
        if (strlen($cliente_nit) !== 8) {
            return false;
        }
    
        // Realizar la validación del NIT según el algoritmo dado
        $suma = 0;
        for ($i = 0; $i < 7; $i++) {
            $suma += intval($cliente_nit[$i]) * (8 - $i);
        }
        $residuo = $suma % 11;
        $respuesta = 11 - $residuo;
    
        $digitoVerificador = intval($cliente_nit[7]);
    
        // Comprobar si el residuo es igual al dígito verificador
        if ($respuesta == $digitoVerificador || ($respuesta == 10 && $digitoVerificador == 0)) {
            return true;
        } else {
            return false;
        }
    }
    
    
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
    body {
        background-image: url(./images.jfif);
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
    .row {
        justify-content: center;
        width: 600px;
        margin-left:0px;
        margin-top:25px;
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
            </div>
        </div>
    </div>
</body>
</html>