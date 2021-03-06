<?php
echo '<!DOCTYPE html>
	<html>
	<head><title>Timeshare</title>
	';

include("header.php");

echo '
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
	<link href="../css/custom.css" rel="stylesheet">
	</head>
	<body class="font-color">
	';


if (isset($_POST['updateSubmit'])) {
    updateProfile();
}

$Connection = new mysqli("localhost", "root", "", "TIMESHARE");

$SqlPurchase = 'SELECT s.serviceID, s.ScheduleID, s.UserID, s.ServiceOffered, s.ServiceDescription, s.Category, s.RatePerHour, s.Location, tl.Day, tl.Time
			FROM `Service` AS s , `TransactionLine` AS tl, `Transaction` AS t
			WHERE s.serviceID = tl.ServiceID
			AND t.TransactionID = tl.TransactionID
			AND t.BuyerID = ' . $_SESSION['userID'];

$SqlHistory = 'SELECT s.serviceID, s.ScheduleID, s.UserID, s.ServiceOffered,  s.ServiceOffered, s.ServiceDescription, s.Category, s.RatePerHour, s.Location, tl.Day, tl.Time
		  FROM `Service` AS s , `TransactionLine` AS tl, `Transaction` AS t
		  WHERE s.serviceID = tl.ServiceID
		  AND t.TransactionID = tl.TransactionID
		  AND s.UserID = ' . $_SESSION['userID'];

$SqlProfile = 'SELECT * FROM user
                  WHERE userid = ' . $_SESSION['userID'] . ';';
$ResultProfile = $Connection->query($SqlProfile);

$Row = $ResultProfile->fetch_assoc();
$password = $Row['password'];
$ResultPurchase = $Connection->query($SqlPurchase);

$ResultHistory = $Connection->query($SqlHistory);

echo '
		
		<div class="container-fluid altered-container-account">
		<h2 class="page-header">Account Dashboard</h2>
			<div class="row">
				<div class="col-md-4">
					<div class="panel panel-primary">
						<form name="updateUserForm" action="profile.php" enctype="multipart/form-data" method="POST">
							<div align="center" class="panel-heading"><h4>View/Update Profile</h4></div>
							<div align="center"><img src="data:image/jpeg;base64,' . base64_encode($Row['profilepicture']) . '" class="img-thumbnail" alt="Profile Pic" width="304" height="236"></div><div>
							<div align="center">Change Profile Picture</div>
								<p><input type="file" class="form-control" name="image" accept="image/jpeg" /></p>

							<div align="center">Name</div>
								<p><input name="currentusername" type="text" class="form-control custom-control" value="' . $Row['name'] . '"/></p>
							<div align="center">Email Address</div>
								<p><input type="text" class="form-control custom-control" value="' . $Row['emailaddress'] . '" disabled/></p>
							<div align="center" class="spaces-bottom spaces-top" ><input type="submit" name="updateSubmit" value="Update Profile" class="btn btn-success spaces-right" data-toggle="modal" data-target="#myModal2"> <input type="button" class="btn btn-info spaces-right" data-toggle="modal" data-target="#myModal" value="Change Password"/></div>
						    <input type="hidden" name="newPW" value="false"/>
						</form>
					</div>
				</div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-primary">
						<div align="center" class="panel-heading"><h4>My Purchase History</h4></div>
						<div class="panel-body"></div>
						 <div class="spaces-left fonts-account">';
echo printResult($ResultPurchase);
echo '				</div></div>
				</div>

				<div class="col-md-4">
					<div class="panel panel-primary">
						<div  align="center"class="panel-heading"><h4>My Selling History</h4></div>
						<div class="panel-body"></div>
						<div class="spaces-left fonts-account">';
echo printResult($ResultHistory);
echo '				</div>
					</div>
				</div>
			</div>
		</div>
		
		<div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog middle-buttons panel custom-panel">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title page-header"><b>Change My Password Please</b></h4>
				<div class="alert alert-danger spaces-top"><span class="glyphicon glyphicon-info-sign"></span>You Have To Click "Update Profile" For Password Change To Take Effect</div>
			  </div>
			  <div align="center" class="modal-body">
				<h4>Current Password</h4>
					<input type="password" class="form-control custom-control spaces-bottom" name="old_password" id="old_password" value=""/>
				<h4>New Password</h4>
					<input type="password" class="form-control custom-control spaces-bottom" name="new_password" id="new_password"  value=""/>
				<h4>Confirm New Password</h4>
					<input type="password" class="form-control custom-control" name="confirm_new_password" id="confirm_new_password" value=""/>
			    <input type="hidden" id="userPW" value="' . $password . '"/>
			    
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal" onclick="isValidPasswordChange();">Save</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			  </div>
			</div>
		  </div>
		</div>
		
		<div id="myModal2" class="modal fade" role="dialog">
		  <div class="modal-dialog middle-buttons panel custom-panel">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"></button>
				<h4 class="modal-title page-header"><b>Account</b></h4>
			  </div>
			  <div align="center" class="modal-body">
			  	<p>Successfully Updated Details!</p>
			  </div>
			  <div class="modal-footer">
			    <form method="post" action="#">
			        <input type="submit" class="btn btn-default" value="updateSubmit"  />
				    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				</form>
			  </div>
			</div>
		  </div>
		</div>

		';

include 'footer.php';


function updateProfile()
{
    $Connection = new mysqli("localhost", "root", "", "TIMESHARE");

    if ($_POST['newPW'] == "false") {
		if($_FILES['image']['name'] != ""){
			// copies the uploaded image to a temp location
			move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $_FILES['image']['name'] );

			// Gets the contents of the image
			$contents = addslashes(file_get_contents("uploads/". $_FILES['image']['name']));

			// Deletes the image after it is copied to an array
			unlink("uploads/". $_FILES['image']['name']);
				
			$SqlProfile = "UPDATE `user` SET `profilepicture` ='" . $contents . "' ,`name` ='" . $_POST['currentusername'] . "' WHERE `userid` = " . $_SESSION['userID'] . ";";
		} else
			$SqlProfile = "UPDATE `user` SET `name`='" . $_POST['currentusername'] . "' WHERE `userid` = " . $_SESSION['userID'] . ";";
    } else {
        $SqlProfile = "UPDATE `user` SET `name`='" . $_POST['currentusername'] . "',`password`= '" . $_POST['newPW'] . "' WHERE `userid` = " . $_SESSION['userID'] . ";";
    }
    $Connection->query($SqlProfile) or die (mysqli_error($Connection));
    unset($_POST['updateSubmit']);
}

echo '
	
	</body>
	</html>';

function printResult($Result)
{

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