<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<meta name="description" content="Game Warrior Template">
	<meta name="keywords" content="warrior, game, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="css/animate.css"/>


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>  
    <!-- Header section -->
	<header class="header-section">
		<div class="container">
			<!-- logo -->
			<a class="site-logo" href="index.html">
				<img src="img/logo.png" alt="">
			</a>
			<div class="user-panel">
				<a href="schedulematches.php">Schedule matches</a>
			</div>
			<!-- responsive -->
			<div class="nav-switch">
				<i class="fa fa-bars"></i>
			</div>
			<!-- site menu -->
			<nav class="main-menu">
				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="tournaments.html">Tournaments</a></li>
					<li><a href="live.html">Watch Live</a></li>
					<li><a href="match.html">Schedule Match</a></li>
					<li><a href="register_team.html">Participate</a></li>
					<li><a href="register_tournament.html">Oraganise</a></li>
				</ul>
			</nav>
		</div>
	</header>
    <div class="container">
        <h2>Team Registration</h2>
        <form action="register_team.php" method="post">    
            <label for="team_name">Team Name:</label><br>
            <input type="text" id="team_name" name="team_name" class="glow-on-hover" required><br>

            <label for="captain_name">Captain Name:</label><br>
            <input type="text" id="captain_name" name="captain_name" class="glow-on-hover" required><br>

            <label for="tournament_id">Tournament:</label><br>
            <select id="tournament_id" name="tournament_id" class="select-box" required>
                <?php
                // Include database connection file
                include_once 'connectiondb.php';

                // Fetch available tournament IDs from database
                $sql = "SELECT Tournament_ID, Tournament_Name FROM Tournaments";
                $result = mysqli_query($conn, $sql);

                // Generate dropdown options
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['Tournament_ID'] . "'>" . $row['Tournament_Name'] . "</option>";
                }

                // Close database connection
                mysqli_close($conn);
                ?>
            </select><br>

            <input type="submit" name="btn_submit" value="Register Team">
        </form>
    </div>
</body>
</footer>
	<!-- Footer section end -->


	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.marquee.min.js"></script>
	<script src="js/main.js"></script>
</html>
