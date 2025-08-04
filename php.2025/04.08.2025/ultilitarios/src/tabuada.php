<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabuada</title>


</head>
<body>
    <?php
   $numero = $_POST['numero'];
   echo "<h1>Tabuada do numero: $numero (by Daneil) </h1>";
   echo "<table>";

   echo "<thead>";


   echo "<tr>";
    echo "<th>multiplicaçao</th>";
    echo "<th> resultado</th>";
   echo "</tr>";
   echo "</thead>";

   echo "<tbody>";
   for ($i = 1; $i <=10; $i++){
    $resultado = $numero * $i;
    echo "<tr>";
    echo "<td> $numero x $i </td>";
    echo "<td> $resultado</td>";
    echo "</tr>";
   }
   echo "</tbody>";

   echo "</table>";

   

    ?>
</body>
</html>