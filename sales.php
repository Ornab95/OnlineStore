<?php
    include "header.php";
    include "connection.php";
    $sql = "SELECT * FROM product";
    $result = mysqli_query($conn, $sql);

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $des = $_POST['des'];
        $unit = $_POST['unit'];
        $unitprice = $_POST['unitprice'];
        $unitsale = $_POST['unitsale'];
        $totalprice = $unitprice * $unitsale;
        $u_unit = $unit - $unitsale;

        if ($unit >= $unitsale) {
            $insertsql = "INSERT INTO sales(name, sellunit, totalprice, productid) VALUES ('$name', '$unitsale', '$totalprice','$id')";

            if ($conn->query($insertsql) === TRUE) {
                echo "Sell successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $update_quantity_query = "UPDATE `product` SET unit = '$u_unit'  WHERE id = '$id'";

            if ($conn->query($update_quantity_query) === TRUE) {
                echo "Update successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            header('location:sales.php');
        } else {
            echo "Out Of Stock";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales</title>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.js"></script>
    <script>
        function validateSellUnit() {
            const unitsale = document.getElementById('unitsale').value;
            if (unitsale < 1) {
                alert("Sell unit must be a positive integer.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body class="bg-gray-50">

<div class="container mx-auto p-6">
    <h5 class="text-xl font-semibold mb-6 text-center text-gray-800">Sales</h5>
    <table class="table-auto w-full bg-white shadow-lg rounded-lg overflow-hidden">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2 text-sm font-medium text-gray-700">Product Name</th>
                <th class="px-4 py-2 text-sm font-medium text-gray-700">Description</th>
                <th class="px-4 py-2 text-sm font-medium text-gray-700">Unit</th>
                <th class="px-4 py-2 text-sm font-medium text-gray-700">Unit Price</th>
                <th class="px-4 py-2 text-sm font-medium text-gray-700">Sell Unit</th>
                <th class="px-4 py-2 text-sm font-medium text-gray-700">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" onsubmit="return validateSellUnit(this)">
    <tr class="border-b hover:bg-gray-100 text-center">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
        <input type="hidden" name="des" value="<?php echo $row['des']; ?>">
        <input type="hidden" name="unit" value="<?php echo $row['unit']; ?>">
        <input type="hidden" name="unitprice" value="<?php echo $row['unitprice']; ?>">

        <td class="px-4 py-2"><?php echo $row['name']; ?></td>
        <td class="px-4 py-2"><?php echo $row['des']; ?></td>
        <td class="px-4 py-2"><?php echo $row['unit']; ?></td>
        <td class="px-4 py-2"><?php echo $row['unitprice']; ?></td>
        <td class="px-4 py-2">
            <input type="number" class="unitsale w-24 px-4 py-2 border border-gray-300 rounded-md shadow-sm text-center" name="unitsale" required min="1">
        </td>
        <td class="px-4 py-2">
            <button type="submit" name="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600">Sell Now</button>
        </td>
    </tr>
</form>

            <?php
                    }
                } else {
                    echo "<tr><td colspan='6' class='px-4 py-2 text-center text-gray-500'>No products available</td></tr>";
                }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
