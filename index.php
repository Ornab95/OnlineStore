<?php
    include "header.php";
    include "connection.php";

    $sql = "SELECT * FROM product";
    $result = $conn->query($sql);

    if(isset($_POST['update_btn'])){
        $update_id = $_POST['update_id'];
        $name = $_POST['update_name'];
        $des = $_POST['update_des'];
        $unit = $_POST['update_unit'];
        $unitprice = $_POST['update_unitprice'];

        $update_query = mysqli_query($conn, "UPDATE `product` SET unitprice = '$unitprice', name='$name', des='$des', unit='$unit' WHERE id = '$update_id'");
        if($update_query){
            header('location:index.php');
        };
    };

    if(isset($_GET['remove'])){
        $remove_id = $_GET['remove'];
        mysqli_query($conn, "DELETE FROM `product` WHERE id = '$remove_id'");
        header('location:index.php');
    };
?>

<html>
<head>
    <title>Stock Status</title>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.js"></script>
</head>
<body class="bg-gray-50">

<div class="container mx-auto p-6">
    <h5 class="text-2xl font-semibold mb-6 text-center text-gray-800">Stock Status</h5>
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
        <table class="min-w-full table-auto text-sm text-gray-700">
            <thead class="bg-gray-100 text-gray-800">
                <tr>
                    <th class="py-3 px-4 text-left">Product Name</th>
                    <th class="py-3 px-4 text-left">Description</th>
                    <th class="py-3 px-4 text-left">Unit</th>
                    <th class="py-3 px-4 text-left">Unit Price</th>
                    <th class="py-3 px-4 text-center">Action</th>
                    <th class="py-3 px-4 text-center">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <tr class="border-b hover:bg-gray-50">
                        <input type="hidden" name="update_id" value="<?php echo $row['id']; ?>">
                        <td class="py-3 px-4"><input type="text" name="update_name" class="w-full border border-gray-300 rounded px-2 py-1" value="<?php echo $row['name']; ?>"></td>
                        <td class="py-3 px-4"><input type="text" name="update_des" class="w-full border border-gray-300 rounded px-2 py-1" value="<?php echo $row['des']; ?>"></td>
                        <td class="py-3 px-4"><input type="number" name="update_unit" class="w-full border border-gray-300 rounded px-2 py-1" value="<?php echo $row['unit']; ?>"></td>
                        <td class="py-3 px-4"><input type="number" name="update_unitprice" class="w-full border border-gray-300 rounded px-2 py-1" value="<?php echo $row['unitprice']; ?>"></td>
                        <td class="py-3 px-4 text-center">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600" name="update_btn">Update</button>
                        </td>
                        <td class="py-3 px-4 text-center">
                            <a href="index.php?remove=<?php echo $row['id']; ?>" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">Delete</a>
                        </td>
                    </tr>
                </form>
                <?php }
                } else {
                    echo "<tr><td colspan='6' class='py-3 px-4 text-center'>No results found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <footer class="text-center text-gray-500 mt-8">
    &copy; <?php echo date("Y"); ?> Ornab Biswass. All rights reserved.
</footer>

</div>

</body>
</html>
