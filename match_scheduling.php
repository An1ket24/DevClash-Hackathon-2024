<?php
// Include database connection file
include_once 'connectiondb.php';

// Check if a tournament ID is provided
if (isset($_GET['tournament_id'])) {
    // Get the tournament ID
    $tournament_id = $_GET['tournament_id'];

    // Query to retrieve teams registered for the tournament
    $sql_teams = "SELECT * FROM Teams WHERE Tournament_ID = $tournament_id";
    $result_teams = mysqli_query($conn, $sql_teams);

    if (mysqli_num_rows($result_teams) > 0) {
        // Teams found, perform match scheduling
        $teams = [];
        while ($row_team = mysqli_fetch_assoc($result_teams)) {
            $teams[] = $row_team;
        }

        // Perform match scheduling logic here (example: round-robin scheduling)
        $num_teams = count($teams);
        for ($i = 0; $i < $num_teams - 1; $i++) {
            for ($j = $i + 1; $j < $num_teams; $j++) {
                // Insert scheduled match into Matches table
                $team1_id = $teams[$i]['Team_ID'];
                $team2_id = $teams[$j]['Team_ID'];
                $scheduled_date = date('Y-m-d H:i:s'); // Example: current date/time
                $map_played_on = 'Map Name'; // Example: specify the map

                $sql_insert_match = "INSERT INTO Matches (Tournament_ID, Team1_ID, Team2_ID, Scheduled_Date, Map_Played_On)
                                     VALUES ($tournament_id, $team1_id, $team2_id, '$scheduled_date', '$map_played_on')";
                mysqli_query($conn, $sql_insert_match);
            }
        }

        echo "Match scheduling completed successfully!";
    } else {
        // No teams registered for the tournament
        echo "Error: No teams registered for this tournament.";
    }
} else {
    // No tournament ID provided
    echo "Error: Tournament ID is missing.";
}

// Close database connection
mysqli_close($conn);
?>
