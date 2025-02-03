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

        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Active Issues</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .card-header {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: #fff;
            padding: 20px;
            border-radius: 10px 10px 0 0;
            text-align: center;
            font-size: 22px;
            font-weight: bold;
        }
        .table-responsive {
            margin-top: 15px;
        }
        .table {
            border-radius: 8px;
            overflow: hidden;
        }
        .table th, .table td {
            padding: 14px;
            text-align: center;
            border: 1px solid #dee2e6;
        }
        .table th {
            background: #007bff;
            color: white;
            font-size: 16px;
        }
        .table-striped tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }
        .table-striped tbody tr:nth-child(even) {
            background-color: #eef1f3;
        }
        .table tbody tr:hover {
            background-color: #f1f1f1;
            transition: 0.3s ease-in-out;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
        }
        .btn-custom {
            background: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
            transition: 0.3s;
            margin: 5px;
            display: inline-block;
        }
        .btn-custom:hover {
            background: #0056b3;
        }
        @media (max-width: 768px) {
            .table {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <div class="card-header">
            📚 Active Issues
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Book/Movie</th>
                        <th>Membership ID</th>
                        <th>Date of Issue</th>
                        <th>Date of Return</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>The Matrix</td>
                        <td>MB12345</td>
                        <td>2024-02-01</td>
                        <td>2024-02-10</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Harry Potter</td>
                        <td>MB67890</td>
                        <td>2024-02-02</td>
                        <td>2024-02-12</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="footer">
            <a href="index.php" class="btn-custom"><i class="fa fa-home"></i> Home</a>
            <a href="javascript:history.back()" class="btn-custom"><i class="fa fa-arrow-left"></i> Back</a>
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