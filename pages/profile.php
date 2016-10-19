<?php
	echo '<!DOCTYPE html>
	<html>
	<head><title>Timeshare</title>
	';

	include ("header.php");

	echo'
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
	<link href="../css/custom.css" rel="stylesheet">
	</head>
	<body class="font-color">
	';

	$Connection = new mysqli("localhost", "root", "", "TIMESHARE");

	$Sql = 'SELECT s.serviceID, s.ScheduleID, s.UserID, s.ServiceOffered, s.ServiceDescription, s.Category, s.RatePerHour, s.Location, tl.Day, tl.Time
			FROM `Service` AS s , `TransactionLine` AS tl, `Transaction` AS t
			WHERE s.serviceID = tl.ServiceID
			AND t.TransactionID = tl.TransactionID
			AND t.BuyerID = ' .$_SESSION['userID'];

	$SqlHistory = 'SELECT s.serviceID, s.ScheduleID, s.UserID, s.ServiceOffered,  s.ServiceOffered, s.ServiceDescription, s.Category, s.RatePerHour, s.Location, tl.Day, tl.Time
		  FROM `Service` AS s , `TransactionLine` AS tl, `Transaction` AS t
		  WHERE s.serviceID = tl.ServiceID
		  AND t.TransactionID = tl.TransactionID
		  AND s.UserID = ' . $_SESSION['userID'];

	$Result = $Connection->query($Sql);

 	$ResultHistory = $Connection->query($SqlHistory);

	echo '
		
		<div class="container-fluid altered-container-account">
		<h2 class="page-header">Account Dashboard</h2>
			<div class="row">
				<div class="col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading"><h4>My Purchase History</h4></div>
						<div class="panel-body"></div>
						 <div class="spaces-left fonts-account">';
						echo printResult($Result);
	echo '				</div></div>
				</div>

				<div class="col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading"><h4>My Selling History</h4></div>
						<div class="panel-body"></div>
						<div class="spaces-left fonts-account">';
						echo printResult($ResultHistory);
	echo '				</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading"><h4>Others</h4></div>
						<div class="panel-body">Other Things Related To Account</div>
					</div>
				</div>
			</div>
		</div>

		<div class="alert alert-info footer">
			<p>This website is protected by law and is copyrighted to the owners and all those that are involved</p>
		</div>

		<script src="js/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
		<script>window.jQuery || document.write(\'<script src="js/vendor/jquery.min.js"><\/script>\')</script>
		<script src="js/tether.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
	</html>';

	function printResult($Result) {
		
			while ($row = $Result->fetch_assoc()) {
			echo '<p><b>Service Offered:</b> ' . $row["ServiceOffered"] . '</p>';
			echo '<p><b>Description:</b> ' . $row["ServiceDescription"] . '</p>';
			echo '<p><b>Category:</b> ' . $row["Category"] . '</p>';
			echo '<p><b>Rate Per Hour:</b> ' . $row["RatePerHour"] . '</p>';
			echo '<p><b>Location:</b> ' . $row["Location"] . '</p>';
			echo '<p><b>Day:</b> ' . $row["Day"] . '</p>';
			echo '<p><b>Time:</b> ' . $row["Time"] . '</p>';
			echo '<hr /><br />';
		}
	}

?>