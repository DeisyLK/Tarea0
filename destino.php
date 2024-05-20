<?php
    $datos = $_GET;
    $n_datos = ['dato1', 'dato2', 'dato3', 'dato4', 'dato5'];
    $datos_completos = [];
    $error = false;
    $divisor = 0;

    if (count($datos) > 5) {
        echo "Error: Se han recibido más de 5 datos.";
    } else {
        foreach ($n_datos as $n) {
            
            if (!empty($datos[$n])) {

                if (is_numeric($datos[$n])) {
                    $datos_completos[$n] = $datos[$n];
                    $divisor++;
                } else {
                    $error = true;
                    echo "Error: El valor ingresado para $n no es numérico.<br>";
                }

            } else {
                $datos_completos[$n] = 0;
            }
        }

        if ($error) {
            echo "Por favor, ingresa solo valores numéricos.";
        } else {
            //var_dump($datos_completos);
            echo "<br>";
            echo "Los valores registrados son: ";
            foreach ($datos_completos as $n => $valor) {
                echo "$valor ";
            }
            echo "<br>";

            $suma = array_sum(array_values($datos_completos));
            if ($divisor > 0) {
                $promedio = $suma / $divisor;
                echo "La suma total de los datos numéricos es: $suma<br>";
                echo "El promedio de los datos numéricos es: $promedio";
            } else {
                echo "No se ingresaron datos numéricos para calcular la suma y el promedio.";
            }
        }
    }
?>

