<?php
$row = 15;
$col = 5;
$table = "<table class='table table-bordered'>";
for ($i = 1; $i <= $row; $i++) {
    $table .= "<tr>";
    for ($j = 1; $j <= $col; $j++) {
        $table .= "<td>Row $i, Col $j</td>";
    }
    $table .= "</tr>";
}
$table .= "</table>";
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
    <div class="container">

        <?php echo $table; ?>
    </div>
</body>
</html>
