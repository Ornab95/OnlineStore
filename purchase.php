<?php
    include "header.php";
    include "connection.php";

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $des = $_POST['des'];
        $unit = $_POST['unit'];
        $unitprice = $_POST['unitprice'];

        $insertsql = "INSERT INTO product(name, des, unit, unitprice) VALUES ('$name', '$des', '$unit','$unitprice')";

        $insertsql1 = "INSERT INTO purchase(name, des, unit, unitprice) VALUES ('$name', '$des', '$unit','$unitprice')";
        if ($conn->query($insertsql1) === TRUE) {
            echo "";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        if ($conn->query($insertsql) === TRUE) {
            echo "<script>alert('New record created successfully');</script>";
        } else {
            echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase</title>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.js"></script>
</head>
<body class="bg-gray-50">

<div class="container mx-auto p-6">
    <h5 class="text-xl font-semibold mb-4 text-center text-gray-800">Purchase Product</h5>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="bg-white p-4 shadow-lg rounded-lg max-w-md mx-auto">
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
            <input type="text" name="name" id="name" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>
        
        <div class="mb-4">
            <label for="des" class="block text-sm font-medium text-gray-700">Description</label>
            <input type="text" name="des" id="des" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>

        <div class="mb-4">
            <label for="unit" class="block text-sm font-medium text-gray-700">Unit</label>
            <input type="number" name="unit" id="unit" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>

        <div class="mb-4">
            <label for="unitprice" class="block text-sm font-medium text-gray-700">Unit Price</label>
            <input type="number" name="unitprice" id="unitprice" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>

        <div class="text-center">
            <button type="submit" name="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Submit</button>
        </div>
    </form>
</div>
<footer class="text-center text-gray-500 mt-8">
    &copy; <?php echo date("Y"); ?> Ornab Biswass. All rights reserved.
</footer>


</body>
</html>

