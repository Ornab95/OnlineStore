<?php
SESSION_START();

if (isset($_SESSION['auth'])) {
    if ($_SESSION['auth'] != 1) {
        header("location:login.php");
    }
} else {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management System</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-gray-100">

<nav class="bg-gradient-to-r from-green-400 to-blue-500 p-4 shadow-md">
  <div class="container mx-auto flex justify-between items-center">
    <a href="index.php" class="text-white text-2xl font-semibold">Inventory Management System</a>
    <!-- Mobile Hamburger Icon -->
    <button class="lg:hidden text-white focus:outline-none" id="navbar-toggle">
      <span class="text-xl">&#9776;</span>
    </button>
    <!-- Desktop Menu -->
    <div class="hidden lg:flex space-x-6" id="navbar-menu">
      <a href="index.php" class="text-white py-2 px-4 rounded-md hover:bg-green-600 transition duration-200">Stock</a>
      <a href="purchase.php" class="text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-200">Purchase</a>
      <a href="sales.php" class="text-white py-2 px-4 rounded-md hover:bg-orange-600 transition duration-200">Sales</a>
      <a href="purchase_report.php" class="text-white py-2 px-4 rounded-md hover:bg-indigo-600 transition duration-200">Purchase Report</a>
      <a href="sales_report.php" class="text-white py-2 px-4 rounded-md hover:bg-teal-600 transition duration-200">Sales Report</a>
      <a href="logout.php" class="bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-500 transition duration-200">Logout</a>
    </div>
  </div>
</nav>

<!-- Mobile Menu -->
<div id="mobile-menu" class="hidden bg-gray-800 bg-opacity-70 text-white p-4 absolute top-14 left-0 w-full z-10 shadow-md md:hidden backdrop-blur-sm hover:border hover:border-gray-500">
  <a href="index.php" class="block text-white font-bold py-2 hover:bg-green-600 rounded-md">Stock</a>
  <a href="purchase.php" class="block text-white font-bold py-2 hover:bg-blue-600 rounded-md">Purchase</a>
  <a href="sales.php" class="block text-white font-bold py-2 hover:bg-orange-600 rounded-md">Sales</a>
  <a href="purchase_report.php" class="block text-white font-bold py-2 hover:bg-indigo-600 rounded-md">Purchase Report</a>
  <a href="sales_report.php" class="block text-white font-bold py-2 hover:bg-teal-600 rounded-md">Sales Report</a>
  <a href="logout.php" class="block bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-500 transition duration-200">Logout</a>
</div>

<script>
  // Mobile menu toggle functionality
  const navbarToggle = document.getElementById("navbar-toggle");
  const navbarMenu = document.getElementById("mobile-menu");

  navbarToggle.addEventListener("click", () => {
    navbarMenu.classList.toggle("hidden");
  });
</script>

</body>
</html>
