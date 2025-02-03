<?php
 SESSION_START();

 if(isset($_SESSION['auth']))
 {
    if($_SESSION['auth']!=1)
    {
        header("location:login.php");
    }
 }
 else
 {
    header("location:login.php");
 }
?>

<html>
<head>
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container">
    <a class="navbar-brand" href="index.php"style="background-color: MediumSeaGreen;">Inventory Management System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a class="nav-link" href="index.php" style="background-color: tomato;">Stock</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="purchase.php"style="background-color: SlateBlue;">Purchase</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="sales.php"style="background-color: Orange;">Sales</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="purchase_report.php"style="background-color: DodgerBlue;">Purchase Report</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="sales_report.php"style="background-color: MediumSeaGreen;">Sales Report</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="background-color:red;"  href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

</body>
</html>