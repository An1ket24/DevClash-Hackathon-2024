<html>
    <body>
<h2>Select Tournament</h2>
    <form action="match_scheduling.php" method="get"> <!-- Change the action to the player registration page -->
        <label for="tournament_id">Select Tournament:</label>
        <select id="tournament_id" name="tournament_id">
            <?php
            // Include database connection file
            include_once 'connectiondb.php';

            // Fetch tournament IDs and names from database
            $sql = "SELECT Tournament_ID, Tournament_Name FROM Tournaments";
            $result = mysqli_query($conn, $sql);

            // Populate dropdown options with tournament IDs and names
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['Tournament_ID'] . "'>" . $row['Tournament_Name'] . "</option>";
            }

            // Close database connection
            mysqli_close($conn);
            ?>
        </select>
        <br><br>
        <input type="submit" value="Next">
        </form>
        </body>
        </html>