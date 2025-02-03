<?php
include 'header.php';
include 'connection.php';
$t = 0;

if (isset($_POST['submit'])) {
    $starttime = $_POST['starttime'];
    $endtime = $_POST['endtime'];

    $sql = "SELECT * FROM purchase WHERE created_at >= '$starttime' AND created_at < '$endtime'";
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Report</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Flatpickr CSS & JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>
<body class="bg-gray-100 p-6">

<div class="container mx-auto max-w-3xl bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-center mb-4 text-gray-800">Purchase Report</h2>

    <!-- Form Section -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="space-y-4" onsubmit="return validateForm()">
        <div>
            <label for="starttime" class="block text-gray-700 font-medium">Start Date & Time:</label>
            <input type="text" id="starttime" name="starttime" class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Select start date & time" required>
        </div>

        <div>
            <label for="endtime" class="block text-gray-700 font-medium">End Date & Time:</label>
            <input type="text" id="endtime" name="endtime" class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Select end date & time" required>
        </div>

        <div class="flex justify-between items-center">
            <button type="submit" name="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600">Generate Report</button>
            <button type="button" onclick="window.print();" class="bg-green-500 text-white px-6 py-2 rounded-md hover:bg-green-600">Print PDF</button>
        </div>
    </form>

    <!-- Purchase Report Table -->
    <div class="mt-6">
        <h3 class="text-xl font-semibold text-gray-800 text-center">Report Summary</h3>
        <table class="w-full mt-4 border-collapse border border-gray-300 shadow-sm">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 border border-gray-300">Product Name</th>
                    <th class="px-4 py-2 border border-gray-300">Unit</th>
                    <th class="px-4 py-2 border border-gray-300">Total Price (৳)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_POST['submit'])) {
                    $t = 0;
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $t += $row["unit"] * $row["unitprice"];
                ?>
                <tr class="bg-white hover:bg-gray-50">
                    <td class="px-4 py-2 border border-gray-300"><?php echo $row["name"]; ?></td>
                    <td class="px-4 py-2 border border-gray-300"><?php echo $row["unit"]; ?></td>
                    <td class="px-4 py-2 border border-gray-300"><?php echo $row["unit"] * $row["unitprice"]; ?></td>
                </tr>
                <?php
                        }
                    } else {
                        echo "<tr><td colspan='3' class='text-center text-gray-500 py-4'>No results found</td></tr>";
                    }
                }
                ?>
            </tbody>
        </table>

        <!-- Total Amount -->
        <?php if ($t > 0) { ?>
            <div class="text-right mt-4 text-lg font-bold text-gray-800">
                Total: <span class="text-blue-600"><?php echo $t; ?> Taka</span>
            </div>
        <?php } ?>
    </div>
</div>

<!-- Flatpickr Initialization -->
<script>
    flatpickr("#starttime", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });

    flatpickr("#endtime", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });

    function validateForm() {
        const starttime = document.getElementById('starttime').value;
        const endtime = document.getElementById('endtime').value;

        if (!starttime || !endtime) {
            alert("Please select both start and end date & time.");
            return false;
        }
        return true;
    }
</script>

</body>
</html>
