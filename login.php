<?php
SESSION_START();

if (isset($_SESSION['auth'])) {
  if ($_SESSION['auth'] == 1) {
    header("location:index.php");
  }
}

if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $pass = $_POST['password'];

  if ($id == 'admin' && $pass == 'admin') {
    $_SESSION['auth'] = 1;
    header("location:index.php");
  } else {
    echo "Invalid username or password.";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <style>
    /* Center the login form using flexbox */
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh; /* Set container height to 100vh for full viewport */
    }

    .login-form {
      width: 300px; /* Adjust width as needed */
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 5px;
    }

    /* Center the login button using flexbox */
    .form-group {
      display: flex;
      justify-content: center;
    }

    h3 {
      background-color: #699BFA; /* Adjust color as desired */
      display: inline-block; /* Ensures background applies only to content */
      padding: 10px;
      text-align: center;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="login-form">
      <h3 >Sign In</h3>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="input-group form-group">
          <input type="text" class="form-control" placeholder="Username" name="id" required>
        </div><br>
        <div class="input-group form-group">
          <input type="password" class="form-control" placeholder="Password" name="password" required>
        </div><br>
        <div class="form-group">
          <input type="submit" value="Login" class="btn btn-primary" name="submit">
        </div>
      </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>
</html>
