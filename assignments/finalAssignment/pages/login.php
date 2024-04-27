<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once 'classes/Pdo_methods.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($email) && !empty($password)) {
        $pdo = new PdoMethods();

        $sql = "SELECT id, name, password, status FROM admins WHERE email = :email";
        $bindings = [[':email', $email, 'str']];
        $records = $pdo->selectBinded($sql, $bindings);

        if (!empty($records)) {
            $user = $records[0];
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['role'] = $user['status'];

                header('Location: welcome.php');
                exit;
            } else {
                $error = "Incorrect password";
            }
        } else {
            $error = "User not found";
        }
    } else {
        $error = "Please fill in all fields";
    }
}
?>
?>
<!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Hashed Login</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="public/css/main.css" rel="stylesheet">
      </head>
  <body>
    <div class="container">
      <h1>Login Page</h1>
      <p><?php echo $output ?></p>
      
      <form action="index.php" method="post">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" value="sshaper">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" value="password">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <input type="submit" class="btn btn-primary" name="login" value="Login">
          </div>
        </div>
      </div>
      </form>

    </div>
  </body>
</html>