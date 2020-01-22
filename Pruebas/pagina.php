<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="pagina.php" method="post">
        <p>Introduzca la actual hora por teclado: <input type="number" name="hour" required /></p>
        <p><input type="submit" /></p>
    </form>
<?php 
   /**  Ejercicio 2. 
    * Realiza un programa que pida una hora por teclado y que muestre luego buenos días,
    * buenastardes o buenas noches según la hora.
    *  Se utilizarán los tramos de 6 a 12, de 13 a 20 y de 21 a 6respectivamente.
    * Solamente se tienen en cuenta las horas, los minutos no se deben introducir por teclado.*/

    if (!empty($_POST['hour'])) {
        $resultado = $_POST['hour'];
        if ($resultado > 6 && $resultado <= 12 ) {
          echo "Buenos días";
        } elseif($resultado >= 13 && $resultado <= 20 ) {
            echo "Buenos tardes";
        }elseif($resultado <= 6 && $resultado >= 21 ){
            echo "Buenos noches";
        }
        else {
            echo "Formato de hora no admitido";
        }
        
    } else {
        echo "Introduzca una hora";
    }
    

?>


</body>

</html>