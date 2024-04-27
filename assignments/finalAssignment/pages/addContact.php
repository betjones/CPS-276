<?php
session_start();
require_once 'Pdo_methods.php';

$errors = [];
$success = '';
$name = $address = $city = $state = $phone = $email = $dob = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];

    // Validation logic here
    if (empty($name)) {
        $errors['name'] = "Name cannot be blank";
    }
    // Additional validations for other fields

    if (empty($errors)) {
        $pdo = new PdoMethods();
        $sql = "INSERT INTO contacts (name, address, city, state, phone, email, dob) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $bindings = [[$name, 'str'], [$address, 'str'], [$city, 'str'], [$state, 'str'], [$phone, 'str'], [$email, 'str'], [$dob, 'str']];
        $result = $pdo->otherBinded($sql, $bindings);

        if ($result == 'noerror') {
            $success = "Contact Information Added";
            // Clear form fields after successful insertion
            $name = $address = $city = $state = $phone = $email = $dob = '';
        } else {
            $errors['general'] = "There was an error adding the record";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Contact</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Add Contact</h2>
        <?php if ($success): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>
        <form action="addContact.php" method="post">
            <!-- Form fields here -->
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>">
                <?php if (isset($errors['name'])): ?>
                    <div class="alert alert-danger"><?php echo $errors['name']; ?></div>
                <?php endif; ?>
            </div>
            <!-- Additional form fields with similar structure -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
