<?php
session_start();
require_once 'Pdo_methods.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    $selectedContacts = $_POST['selectedContacts'] ?? [];

    if (!empty($selectedContacts)) {
        $pdo = new PdoMethods();

        // Prepare the placeholders for the query based on the number of selected contacts
        $placeholders = implode(',', array_fill(0, count($selectedContacts), '?'));

        // Prepare the SQL statement
        $sql = "DELETE FROM contacts WHERE id IN ($placeholders)";

        // Execute the deletion
        $result = $pdo->otherBinded($sql, $selectedContacts);

        if ($result === 'noerror') {
            $success = "Selected contact(s) have been deleted successfully.";
        } else {
            $error = "There was an error deleting the contact(s).";
        }
    } else {
        $error = "No contacts selected for deletion.";
    }
}

// Fetch all contacts to display
$pdo = new PdoMethods();
$sql = "SELECT id, name FROM contacts";
$contacts = $pdo->selectNotBinded($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Contacts</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Delete Contacts</h2>
        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if ($success): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>
        <form action="deleteContacts.php" method="post">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Select</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($contacts as $contact): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($contact['name']); ?></td>
                            <td><input type="checkbox" name="selectedContacts[]" value="<?php echo $contact['id']; ?>"></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <button type="submit" name="delete" class="btn btn-danger">Delete Selected</button>
        </form>
    </div>
</body>
</html>