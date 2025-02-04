<?php
session_start();
if (!isset($_SESSION['loged_in']) || $_SESSION['loged_in'] !== true ) {
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
    <title>Transaction Dashboard </title>
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
                <?php if($_SESSION['user_type'] == 'admin'){ ?>
                    <a class="btn btn-primary mt-3" href="./Maintanence.php">Maintanence Menu</a>
                <?php } ?>
                <a class="btn btn-primary mt-3" href="./Reports.php">Reports Menu</a>
                <a class="btn btn-success mt-3" href="#">Transactions</a>
            </div>
            <?php if($_SESSION['user_type'] == 'admin'){ ?>
                <a href="./Adashboard.php" class="btn btn-sm ms-1 mt-2">Home...</a>
            <?php }else{ ?>
                <a href="./Sdashboard.php" class="btn btn-sm ms-1 mt-2">Home...</a>
            <?php } ?>
        </div>
        <div class="right-side col-9 ">
            <div class="container d-flex flex-column"> 
                <div class="row mt-4 ">
                    <h3 class="col text-center">Transactions</h3>
                </div>
                <div class="bg-success-subtle m-4 p-2 rounded shadow text-center d-flex flex-column align-items-center">
                    <a href="Availablebooks.php" class="btn btn-outline-dark w-50">Is book available?</a>
                    <a href="Issuebook.php" class="btn btn-outline-dark w-50 mt-2">Issue book?</a>
                    <a href="Returnbook.php" class="btn btn-outline-dark w-50 mt-2">Return book?</a>
                    <a href="Payfine.php" class="btn btn-outline-dark w-50 mt-2">Pay Fine?</a>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>