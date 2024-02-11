<?php
// Include your database connection file
include_once 'connectiondb.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tournament registration form submitted
    if (isset($_POST['register_tournament'])) {
        // Retrieve form data
        $tournament_name = $_POST['tournament_name'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $organizer_id = $_POST['organizer_id']; // Assuming this is obtained from some form of authentication
        
        // Insert into Tournaments table
        $sql = "INSERT INTO Tournaments (Tournament_Name, Start_Date, End_Date, Organizer_ID)
                VALUES ('$tournament_name', '$start_date', '$end_date', $organizer_id)";
        $result = mysqli_query($conn, $sql);
        
        if ($result) {
            echo "Tournament registered successfully!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
    
    // Team registration form submitted
    if (isset($_POST['register_team'])) {
        // Retrieve form data
        $team_name = $_POST['team_name'];
        $captain_id = $_POST['captain_id']; // Assuming this is obtained from some form of authentication
        
        // Insert into Teams table
        $sql = "INSERT INTO Teams (Team_Name, Captain_ID)
                VALUES ('$team_name', $captain_id)";
        $result = mysqli_query($conn, $sql);
        
        if ($result) {
            echo "Team registered successfully!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

// Close database connection
mysqli_close($conn);
?>
