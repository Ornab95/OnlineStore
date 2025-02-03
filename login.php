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
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">

  <div class="bg-white shadow-lg rounded-lg w-full max-w-sm p-8">
    <h3 class="text-3xl font-semibold text-center text-blue-600 mb-8">Sign In</h3>
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      
      <!-- Username Input -->
      <div class="mb-6">
        <input type="text" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Username" name="id" required>
      </div>

      <!-- Password Input -->
      <div class="mb-6">
        <input type="password" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Password" name="password" required>
      </div>

      <!-- Submit Button -->
      <div class="flex justify-center">
        <button type="submit" name="submit" class="w-full py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Login</button>
      </div>

    </form>
    <footer class="text-center text-gray-500 mt-8">
    &copy; <?php echo date("Y"); ?> Ornab Biswass. All rights reserved.
</footer>

  </div>

</body>
</html>

