<?php
require_once('config/db.php');

// Securely fetch data from the database
$query = "SELECT * FROM items"; // Replace 'inventory' with your actual table name
$result = mysqli_query($con, $query);

if (!$result) {
    die("Query Failed: " . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Inventory Management</title>
</head>
<body>
<div class="container">
    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="display-6">Master list of books/Movies</h2>
                    <a href="Reports.php" class="btn-back">← Back to Dashboard</a>
                </div>
                <div class="card-body">
                         
                        <table class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Type</th>
                                    <th>Date of Procurement</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                     
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['type']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['date_of_procurement']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
                                    
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
