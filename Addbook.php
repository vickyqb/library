<?php
session_start();
if (!isset($_SESSION['loged_in']) || $_SESSION['loged_in'] !== true || $_SESSION['user_type'] !== 'admin') {
    // Redirect to login page or show error message
    header("Location: Alogin.php");
    exit;
}

if (isset($_SESSION['msg'])) {
    $message = $_SESSION['msg'];
    echo "<script>alert('$message');</script>";
}
unset($_SESSION['msg']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Test</title>
    <?php include "./layout/hlink.php"?>
    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        /* Optional: Initial style */
        .error {
            border: 2px solid red;
        }
        .valid {
            border: 2px solid green;
        }
    </style>
</head>

<body>
<?php include_once './layout/navbar.php'; ?>

    <div class="container card my-3 w-50 shadow py-2">
        <h2 class="text-center mb-4">Add Book</h2>
        <form action="./backend/addbook.php" method="post">
            <div class="d-flex justify-content-evenly">
                <div class="left ">
                    <div class="mb-3">
                        <div class="row">
                            <p>select type</p>
                            <div class="form-check col-4">
                                <input class="form-check-input"  type="radio" name="type" id="book" value="book" >
                                <label class="form-check-label" for="book">
                                    Book
                                </label>
                            </div>
                            <div class="form-check col-4">
                                <input class="form-check-input"  type="radio" name="type" id="movie" value="movie" >
                                <label class="form-check-label" for="movie">
                                    Movie
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="date" class="form-label">Date of Procurement</label>
                        <input type="date" name="date" id="date" class="form-control" required>
                    </div>
                    
                </div>

                <div class="right">
                    <div class="mb-3">
                        <label for="name" class="form-label">Book/Movie Name</label>
                        <input type="text" name="name" id="name" class="form-control" 
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity/Copies</label>
                        <input type="text" name="quantity" id="quantity" class="form-control" value="1"
                            required>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <p id="slot_result"></p>
                <button type="submit" id="submitbtn" class="btn btn-primary">Submit</button>
                <button class="btn btn-danger " onclick="cancle()">Cancle</button>
            </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <script>
    function cancle(){
        alert("Transaction cancelled");
        window.history.back();
    }
    // Function to check the slot availability
    function checkSlot() {
        let date = $("#start_date").val();
        let time = $("#start_time").val();

        // Validate inputs
        if (!date || !time) {
            $("#slot_result").html("<span style='color: orange;'>Please select both date and time.</span>");
            return;
        }

        // Send AJAX request
        $.ajax({
            url: "http://localhost/library/backend/check_slot.php", // Replace with your backend file path
            type: "POST",
            data: {
                start_date: date,
                start_time: time
            },
            success: function (response) {
                // Update result based on the server response
                if (response === "available") {
                    $("#slot_result").html("<span style='color: green;'>Slot is available!</span>");
                    $("#submitbtn").prop("disabled", false).show(); // Enable the submit button if slot is available
                } else if (response === "unavailable") {
                    $("#slot_result").html("<span style='color: red;'>Slot is unavailable.</span>");
                    $("#submitbtn").prop("disabled", true).hide(); // Disable the submit button if slot is unavailable
                } else {
                    $("#slot_result").html("<span style='color: orange;'>Error: " + response + "</span>");
                    $("#submitbtn").prop("disabled", true).hide(); // Disable the submit button on error
                }
            },
            error: function () {
                $("#slot_result").html("<span style='color: red;'>Failed to check the slot. Try again.</span>");
                $("#submitbtn").prop("disabled", true).hide(); // Disable the submit button on error
            }
        });
    }
    
    </script>
</body>

</html>
