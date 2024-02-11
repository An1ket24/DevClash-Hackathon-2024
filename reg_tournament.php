<?php
// Include database connection file
include_once 'connectiondb.php';
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $tournament_name = $_POST['tournament_name'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $organizer_name = $_POST['organizer_name'];

    // Insert data into Tournaments table
    $sql = "INSERT INTO Tournaments (Tournament_Name, Start_Date, End_Date, organizer)
            VALUES ('$tournament_name', '$start_date', '$end_date', '$organizer_name')";

    if (mysqli_query($conn, $sql)) {
        echo "Tournament registered successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Close database connection
mysqli_close($conn);
?>
