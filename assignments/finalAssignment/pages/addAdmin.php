<?php
session_start();
require_once 'Pdo_methods.php';

$errors = [];
$success = '';
$name = $email = $password = $status = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $status = $_POST['status'] ?? '';

    // Validation logic here
    if (empty($name) || empty($email) || empty($password) || empty($status)) {
        $errors['general'] = "All fields must be filled";
    } else {
        $pdo = new PdoMethods();

        // Check for duplicate email
        $sql = "SELECT id FROM admins WHERE email = ?";
        $bindings = [[$email, 'str']];
        $records = $pdo->selectBinded($sql, $bindings);

        if (!empty($records)) {
            $errors['email'] = "Email already exists";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO admins (name, email, password, status) VALUES (?, ?, ?, ?)";
            $bindings = [[$name, 'str'], [$email, 'str'], [$hashedPassword, 'str'], [$status, 'str']];
            $result = $pdo->otherBinded($sql, $bindings);

            if ($result == 'noerror') {
                $success = "Admin added successfully";
                // Clear form fields after successful insertion
                $name = $email = $password = $status = '';
            } else {
                $errors['general'] = "There was an error adding the admin";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Add Admin</h2>
        <?php if (!empty($success)): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <?php foreach ($errors as $error): ?>
                    <p><?php echo $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <form action="addAdmin.php" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="admin" <?php echo ($status === 'admin' ? 'selected' : ''); ?>>Admin</option>
                    <option value="staff" <?php echo ($status === 'staff' ? 'selected' : ''); ?>>Staff</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Admin</button>
        </form>
    </div>
</body>
</html>