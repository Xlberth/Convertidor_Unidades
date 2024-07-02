<?php
//Creando las variables...
$valor = '';
$desde = '';
$hasta = '';

//Convertiremos a metros...

function cmetros($valor, $unidad_desde){
    switch($unidad_desde){
        case 'Milimetro':
            return $valor / 1000;
        break;

        case 'Centimetro':
            return $valor / 100;
        break;

        case 'Decimetro':
            return $valor / 10;
        break;

        case 'Metro':
            return $valor * 1;
        break;

        case 'Decametro':
            return $valor * 10;
        break;

        case 'Hectometro':
            return $valor * 100;
        break;

        case 'Kilometro':
            return $valor * 1000;
        break;

        default:
            return 'No soportado';
        break;


    }

}

function convertir($valor, $unidad_hasta){
    switch($unidad_hasta){
        case 'Milimetro':
            return $valor * 1000;
        break;

        case 'Centimetro':
            return $valor * 100;
        break;

        case 'Decimetro':
            return $valor * 10;
        break;

        case 'Metro':
            return $valor * 1;
        break;

        case 'Decametro':
            return $valor / 10;
        break;

        case 'Hectometro':
            return $valor / 100;
        break;

        case 'Kilometro':
            return $valor / 1000;
        break;

        default:
            return 'No soportado';
        break;
    }
}

if (isset($_POST["convertir"])){

    //Obtenemos variables...
    $valor = $_POST['valor'];
    $desde = $_POST['desde'];
    $hasta = $_POST['hasta'];


}

$calculoD = cmetros($valor, $desde);

$calcularH = convertir($calculoD, $hasta);
$resultado = $calcularH;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <title>Conversor de Longitud</title>
    <!-- Agregando estilos al boton...  -->
    <style>
        .btn-morado {
            background-color: purple;
            color: white;
            border-color: purple;
        }

        .btn-morado:hover {
            background-color: darkviolet;
            border-color: darkviolet;
        }

        .titulo-grande {
            font-size: 6em; /* Puedes ajustar el tamaño según tus necesidades */
        }

        .texto-inferior-izquierda {
            position: fixed;
            bottom: 10px;
            left: 10px;
            font-size: 1em;
            color: gray;
        }
        
    </style>
    <!-- Un poco de JavaScript si el usuario no selecciona ambas mediadas de unidad...  -->
    <script>
        function validarFormulario() {
            var desde = document.forms["conversionForm"]["desde"].value;
            var hasta = document.forms["conversionForm"]["hasta"].value;
            if (desde == "--Seleccione un valor--" || hasta == "--Seleccione un valor--") {
                alert("Por favor, seleccione ambas medidas de unidad.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    
    <h1 class="text-center titulo-grande">Conversor de Longitud</h1>
 
    <div class="container">
        <form name="conversionForm" form method="POST" onsubmit="return validarFormulario();">
            <div class="row mt-4" >
                <div class="col-sm-4">
                    <label for="valor">VALOR: </label>
                    <input type="number" name="valor" class="form-control" value="">
 
                </div>
 
                <div class="col-sm-4">
                    <label for="desde" class="fomr-label">Desde: </label>
                    <select class="form-select" name="desde">
                        <option selected>--Seleccione un valor--</option>
                        <option value="Milimetro">Milímetro</option>
                        <option value="Centimetro">Centímetro</option>
                        <option value="Decimetro">Decímetro</option>
                        <option value="Metro">Metro</option>
                        <option value="Decametro">Decámetro</option>
                        <option value="Hectometro">Hectómetro</option>
                        <option value="Kilometro">Kilómetro</option>
                        
                      </select>
                </div>
 
                <div class="col-sm-4">
                    <label for="hasta" class="fomr-label">Hasta: </label>
                    <select class="form-select" name="hasta">
                        <option selected>--Seleccione un valor--</option>
                        <option value="Milimetro">Milímetro</option>
                        <option value="Centimetro">Centímetro</option>
                        <option value="Decimetro">Decímetro</option>
                        <option value="Metro">Metro</option>
                        <option value="Decametro">Decámetro</option>
                        <option value="Hectometro">Hectómetro</option>
                        <option value="Kilometro">Kilómetro</option>
                        
                      </select>
                </div>
 
            </div>
 
            <div class="row mt-4">
                <div class="col-sm-6">
                <button type="submit" name="convertir" class="btn btn-morado w-100 py-4">CONVERTIR</button>
                </div>
 
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="valor">RESULTADO: </label>
                        <input type="text" name="resultado" class="form-control" value="<?php  if(isset($resultado)) echo $resultado; ?>">
                    </div>
                </div>
            </div>
            <footer>
                <div class="texto-inferior-izquierda">© Alberto Arias Flores</div>
            </footer>
            
        </formform>
    </div>  
    
 
</body>
</html>
