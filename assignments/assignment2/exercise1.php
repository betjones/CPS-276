<?php
$mainlist = 5;
$sublist = 6;
for ($i = 1; $i < $mainlist; $i++){
    echo "<li>$i<br>";
    echo "<ul>";
    for ($j = 1; $j < $sublist; $j++){
        echo "<li>&nbsp;&nbsp;&nbsp;&nbsp;$j</li>";
    }
    echo "</ul>"; 
    echo "</li>";
}
echo "</ul>";
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nested List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    
 </body>
</html>