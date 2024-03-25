<?php

require_once 'fileUploadProc.php';
$output = "";
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>File Upload</title>
</head>

<body>

    <div class="container">

        <h2>File Upload</h2>

        <?php
        $file = "linkDisplay.php";
        echo "<a href= $file>Show file list</a><br></li>";
       // echo $output;
        ?>

        <form action="index.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="fileName">File Name</label>
                <input type="text" class="form-control" name="fileName" id="fileName">
            </div>
            <div class="form-group">
                <label for="file"></label>
                <input type="file" name="file" id="file">
            </div>
            <input class="btn btn-primary" type="submit" name="submitButton" id="submitButton" value="Upload File">
        </form>
    </div>
</body>

</html>