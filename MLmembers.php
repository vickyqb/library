<?php
session_start();
if (!isset($_SESSION['loged_in']) || $_SESSION['loged_in'] !== true) {
    // Redirect to login page or show error message
    header("Location: Alogin.php");
    exit;
}
include_once "./db/db.php";

if (isset($_SESSION['msg'])) {
    $message = $_SESSION['msg'];
    echo "<script>alert('$message');</script>";
}
unset($_SESSION['msg']);


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include "./layout/hlink.php"?>
    <title>Admin Dashboard </title>
    <style>
        .left-side{
            height: 89vh;
        }
        .right-side{
            height: 89vh;
            overflow: auto;
            overflow-x:hidden;
        }
    </style>
</head>

<body>
    <?php include_once './layout/navbar.php'; ?>

    <section class="body d-flex w-100">
        <div class="left-side col-3 bg-success-subtle">
        <div class="container d-flex flex-column  mt-5">
                <a class="btn btn-primary mt-3" href="./MLbooks.php">Master List of Books</a>
                <a class="btn btn-primary mt-3" href="./MLmovies.php">Master List of Movies</a>
                <a class="btn btn-primary mt-3" href="./MLmembers.php">Master List of Memberships</a>
                <a class="btn btn-primary mt-3" href="./Activeissue.php">Active Issues</a>
                <a class="btn btn-primary mt-3" href="./Overduereturns.php">Overdue returns</a>
                <a class="btn btn-primary mt-3" href="./PIRequests.php">Issue Requests</a>
                 
            </div>
        </div>
        <?php
require_once('config/db.php');

// Securely fetch data from the database
$query = "SELECT * FROM memberships";
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
    <title>Update Membership</title>
    <style>
        body {
            background-color: #f8f9fa;
            color: #495057;
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .card-header h2 {
            font-size: 24px;
            text-align: center;
        }
        .table {
            margin-top: 20px;
            border: 1px solid #dee2e6;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
        }
        .table th, .table td {
            padding: 12px;
            text-align: center;
        }
        .table-bordered th, .table-bordered td {
            border: 1px solid #dee2e6;
        }
        .table th {
            background-color: #007bff;
            color: #fff;
        }
        .table tbody tr:hover {
            background-color: #f1f1f1;
        }
        .btn-edit {
            background-color: #007bff;
            color: white;
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
        }
        .btn-edit:hover {
            background-color: #0056b3;
        }
        .btn-delete {
            background-color: #dc3545;
            color: white;
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
        .right-side {
    height: 89vh;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: auto;
}

.table-container {
    width: 100%;
    max-width: 800px; /* Optional: Set a max-width for the table container */
    text-align: center; /* Center the text inside the container */
}

.table {
    width: 100%;
    margin: 0 auto;
    border-collapse: collapse;
}

.table th,
.table td {
    padding: 12px;
    text-align: center;
    border: 1px solid #dee2e6;
}

.table th {
    background-color: #007bff;
    color: white;
}

.table tbody tr:hover {
    background-color: #f1f1f1;
}

.table-striped tbody tr:nth-child(odd) {
    background-color: #f9f9f9;
}

.table-striped tbody tr:nth-child(even) {
    background-color: #f1f1f1;
}

    </style>
</head>
<body>
<div class="container">
    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="display-6">Master list of Memberships</h2>
                    <a href="Reports.php" class="btn-back">← Back to Dashboard</a>
                </div>
                <div class="card-body">
                         
                        <table class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Contact Name</th>
                                    <th>Aadhar Card</th>
                                    <th>Address</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Membership</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['first_name']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['last_name']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['contact_name']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['aadhar_card']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['address']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['start_date']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['end_date']) . "</td>";
                                    echo "<td>" . htmlspecialchars($row['membership']) . "</td>";
                                  
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
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>