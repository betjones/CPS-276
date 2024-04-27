<?php
session_start();
require_once 'Pdo_methods.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    $selectedAdmins = $_POST['selectedAdmins'] ?? [];

    if (!empty($selectedAdmins)) {
        $pdo = new PdoMethods();

        // Prepare the placeholders for the query based on the number of selected admins
        $placeholders = implode(',', array_fill(0, count($selectedAdmins), '?'));

        // Prepare the SQL statement
        $sql = "DELETE FROM admins WHERE id IN ($placeholders)";

        // Execute the deletion
        $result = $pdo->otherBinded($sql, $selectedAdmins);

        if ($result === 'noerror') {
            $success = "Selected admin(s) have been deleted successfully.";
        } else {
            $error = "There was an error deleting the admin(s).";
        }
    } else {
        $error = "No admins selected for deletion.";
    }
}

// Fetch all admins to display, excluding the current logged-in admin to prevent self-deletion
$currentAdminId = $_SESSION['user_id'];
$pdo = new PdoMethods();
$sql = "SELECT id, name FROM admins WHERE id != ?";
$bindings = [[$currentAdminId, 'int']];
$admins = $pdo->selectBinded($sql, $bindings);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Admins</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Delete Admins</h2>
        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if ($success): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>
        <form action="deleteAdmins.php" method="post">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Select</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($admins as $admin): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($admin['name']); ?></td>
                            <td><input type="checkbox" name="selectedAdmins[]" value="<?php echo $admin['id']; ?>"></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <button type="submit" name="delete" class="btn btn-danger">Delete Selected</button>
        </form>
    </div>
</body>
</html>