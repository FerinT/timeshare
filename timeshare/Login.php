<html>

	<?php
	include("DBConnnect.php");
		if(isset($_POST['submit'])) {
			$credentails = $_POST['details'];
			
			if(!empty($credentails[0]) && !empty($credentails[1])){				
				$sql = "SELECT * FROM login where userID= '$credentails[0]' and pin=$credentails[1]";
				$results = $Connection->query($sql);
				if($results->num_rows <= 0)
					echo"<br/>invalid login";
				else
				{
					$row = $results->fetch_assoc();
					echo"Welcome ". $row["userID"];
				}
				exit();
			}
			else
			{
				echo "<br/>Please fill out all fields.";
				
			}
		}	
	?> 

<?php

include("DBConnnect.php");

$sql = "SELECT * FROM login";
$result = $Connection->query($sql);

if($result->num_rows <= 0)
	echo"There is no one in the database";
else
{
	while($row = $result->fetch_assoc())
		echo"<br/>userID :". $row["userID"] ."<br/>";
}
?>
<body>
	<form name = "myForm" method="POST" action="Login.php">
		<p>userID: <input type='text' name='details[0]' value=""/> </p>
		<p>Password: <input type='text' name='details[1]' value=""/> </p>
		<p> <input type='submit' name='submit' value='submit'/> </p>
	</form> 
	<input type='button' name='register' value='register' onclick="window.location.href='/login/Register.php'" />
</body>
</html>
