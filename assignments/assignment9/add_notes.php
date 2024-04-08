<?php
require_once 'classes/Crud.php';
$crud = new Crud();
$output = $crud->init();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Add Note</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="css/main.css" rel="stylesheet">

</head>

<body>
    <div class="container">
        <header>
            <h1>Add Note</h1>
            <li><a href="display_notes.php">Display Notes</a></li>
        </header>

        <main>

            <p>
                <?php echo $output; ?>
            </p>

            <form method="post" action="add_notes.php">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Date and Time</label>
                    <input type="datetime-local" class="form-control" id="dataTime" name="dateTime"
                        placeholder="mm/dd/yyyy">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Note</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="mb-3"> <!-- Add this div to contain the button -->
                    <input type="submit" class="btn btn-primary" name="addNote" id="addNote" value="Add Note">
                </div>
            </form>
        </main>

    </div>
</body>

</html>