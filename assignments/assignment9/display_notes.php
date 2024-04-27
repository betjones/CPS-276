<?php
require_once 'classes/Crud.php';
$crud = new Crud();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Display Notes</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="css/main.css" rel="stylesheet">
</head>

<body>
    <div id="wrapper" class="container">
        <header>
            <h1>Display Notes</h1>
            <li><a href="add_notes.php">Add Note</a></li>
        </header>
        <main>
            <p>
                <?php echo $output; ?>
            </p>
            <div>
            </div>
            <form method="post" action="">
                <label for="begDate">Beginning Date:</label>
                <input type="date" class="form-control" id="begDate" name="begDate">
                <label for="endDate">Ending Date:</label>
                <input type="date" class="form-control" id="endDate" name="endDate">
                <input type="submit" value="Get Notes">
            </form>
        </main>

    </div>
</body>

</html>