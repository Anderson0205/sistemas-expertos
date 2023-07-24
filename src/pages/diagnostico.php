<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener los valores seleccionados del formulario
    $dolorAbdominal = $_POST["dolor_abdominal"];
    $malSabor = $_POST["mal_sabor"];
    $alcohol = $_POST["alcohol"];
    $ardorEstomago = $_POST["ardor_estomago"];
    $analgesicos = $_POST["analgesicos"];
    $eructos = $_POST["eructos"];
    $inflamacionEstomacal = $_POST["inf_esto"];
    $perdidaApetito = $_POST["perd_apetito"];
}

if (
    !isset($_POST["dolor_abdominal"]) ||
    !isset($_POST["mal_sabor"]) ||
    !isset($_POST["alcohol"]) ||
    !isset($_POST["ardor_estomago"]) ||
    !isset($_POST["analgesicos"]) ||
    !isset($_POST["eructos"]) ||
    !isset($_POST["inf_esto"]) ||
    !isset($_POST["perd_apetito"])
) {
    header("Location: cuestionario.html");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnóstico</title>
    <link rel="stylesheet" href="../../public/css/diagnóstico.css">
</head>

<body>
    <div class="plan">
        <div class="inner">
            <span class="pricing">
                <span id="fecha"></span>
            </span>
            <p class="title">Diagnóstico</p>
            <p class="info"><b>Estimado usuario,</b><br>
                Basado en los síntomas y datos proporcionados, se ha generado una recomendación para su consideración.
                Nuestro sistema experto indica que probablemente usted se encuentra en una de las siguientes situaciones:</p>
            <ul class="features">
                <li>
                    <span class="icon">
                        <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path fill="currentColor" d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
                        </svg>
                    </span>
                    <span>
                        <strong>
                            <?php
                            // Evaluar las respuestas y mostrar los resultados
                            if ($ardorEstomago === "si" && $eructos === "grave") {
                                echo "Usted tiene gastritis.";
                            } elseif ($ardorEstomago === "si" && $eructos === "normal") {
                                echo "Es probable al 70% que tiene gastritis.";
                            } elseif ($dolorAbdominal === "no" && $malSabor === "no") {
                                echo "No tiene gastritis.";
                            } elseif ($dolorAbdominal === "si" && $inflamacionEstomacal === "si") {
                                echo "Usted tiene gastritis.";
                            } else {
                                echo "No tiene gastritis.";
                            }
                            ?>
                        </strong>
                    </span>
                </li>
            </ul>
            <div class="action">
                <div class="button">
                    <a href="cuestionario.html">Volver al diagnóstico</a>
                </div>
                <div class="button">
                    <a href="../../index.html">Inicio</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Fecha
        function actualizarFecha() {
            const spanFecha = document.getElementById("fecha");
            const fechaActual = new Date();
            const dia = fechaActual.getDate();
            const mes = fechaActual.getMonth() + 1;
            const anio = fechaActual.getFullYear();
            const fechaFormateada = `${dia}/${mes}/${anio}`;
            spanFecha.textContent = fechaFormateada;
        }
        // Llamar a la función para que se actualice cada segundo
        setInterval(actualizarFecha, 1000);
        // También llamamos a la función una vez para que la fecha se muestre de inmediato
        actualizarFecha();
    </script>
</body>

</html>