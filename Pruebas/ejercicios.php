<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Luis José Sanfiel Orsini</title>
</head>
<body>   
    <style>
        table {
            width :80%;
        }
    </style>

    <?php 
  $num = 0;
   $tabla = "<table cellspacing='10' cellpadding='10' border='3>' ";   
    for($i = 0,$z =0 ; $i <= 10, $z<=100 ;$i ++, $z++) {
        if ($i > 9 || $i=== 0 ) {
          $tabla .= "<tr></tr>"; 
          $i = 0;         
        } 
        if($i <= 9 || $i>0  ) {
          $tabla .= "<td>{$z}</td>"; 
        }                   
      }    
     $tabla .= "</table>";    
   echo $tabla;
    ?>
</body>
</html>