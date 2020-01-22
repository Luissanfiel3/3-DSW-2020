<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    $num = 0;
    $message = "";
    $desabilitado = " ";
    $tipo = "hidden";
    if (isset($_POST['numero'])) {
        $num = $_POST['numero'];
        $numIntentos = $_POST['numintentos'];
        $nrand = $_POST['nrandom'];

        if ($numIntentos < 0) {
            $message = " <div class='alert alert-primary' role='alert' >  El número introducido es " . $num . "  </div>
                <div class='alert alert-primary' role='alert' >  No ha acertado el número  </div>
                <div class='alert alert-primary' role='alert' >  Se le han agotado los intentos </div>
                <div class='alert alert-info' role='alert' >  Juguemos Nuevamente </div> ";
            $desabilitado = "disabled";
            refreshPage();
        } else {
            if ($num > 0 && $num < $nrand && $num <= 10) {
                $message = "<div class='alert alert-primary' role='alert' >  El número introducido es " . $num . "  </div>
                <div class='alert alert-primary' role='alert' >  El número introducido es menor que el número a adivinar  </div>
                <div class='alert alert-primary' role='alert' >  Le quedan " . $numIntentos . " intentos </div> ";
               
            } elseif ($num > 0 && $num > $nrand && $num <= 10) {
                $message = " <div class='alert alert-primary' role='alert' >  El número introducido es " . $num . "  </div>
                <div class='alert alert-primary' role='alert' >  El número introducido es mayor que el número a adivinar  </div>
                <div class='alert alert-primary' role='alert' >  Le quedan " . $numIntentos . " intentos </div>";
               
            } elseif ($num > 0 && $num == $nrand && $num <= 10) {
                $message = "<div class=' h4 alert alert-success' role='alert' >¡Ha acertado el número!</div>
                <div class='h4 alert alert-success' role='alert' >El número es " . $nrand . "</div>";
               
                $desabilitado = "disabled";
                refreshPage();
            } else {
                $message =  " <div class='alert alert-primary' role='alert' >  El número introducido es incorrecto  </div>";
            }
        }
    } else {
        $numIntentos = 4;
        $nrand = rnd();
    }
   

    function refreshPage()
    {
        header("Refresh:2");
    }
    function rnd()
    {
        return rand(1, 10);
    }
   //echo "Intentos: " . $numIntentos;
   echo "Aleatorio: " .$nrand;

    ?>
    <div class="container">
        <div class="row ">
            <form class=" align-self-center" action="" method="post" autocomplete="off">
                <div class="form-group">
                    <label class="h1">Introduzca un número (1..20)</label>
                    <input type="number" class="form-control" placeholder="Introduzca un número" name="numero" required>
                </div>
               
                <input type="hidden" name="nrandom" id="random" value="<?php echo $nrand ?>" />
                <input type="hidden" name="numintentos" id="intentos" value="<?php echo ($numIntentos - 1); ?>" />
                <input type="submit" class="btn btn-primary" value="Adivinar" <?php echo $desabilitado ?> />

            </form>
            <div class="row ">
                <form action="#" method="post">
                    <input type='<?php echo $tipo; ?>' class='btn btn-primary' value='Empezar de Nuevo' />
                </form>
            </div>
        </div>
        <div class="row">
            <div class=" align-self-center">
                <?php echo $message ?>
            </div>
        </div>
    </div>
</body>

</html>