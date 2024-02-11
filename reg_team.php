<?php
// Include database connection file
include_once 'connectiondb.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $team_name =intval( $_POST['team_name']);
    $captain_name = intval($_POST['captain_name']);
    $tournamentid = $_POST['tournamentid'];


    // Insert data into Teams table
    $sql = "INSERT INTO Teams (Team_Name, Captain_name, tournamentid)
            VALUES ('$team_name', '$captain_name','$tournamentid')";

    if (mysqli_query($conn, $sql)) {
        echo "Team registered successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Close database connection
mysqli_close($conn);
?>
