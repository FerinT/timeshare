
<?php
	include("DBConnnect.php");
		if(isset($_POST['submit'])) {
			$credentails = $_POST['details'];
			
			if(!empty($credentails[0]) && !empty($credentails[1])){				
				$sql = "insert into login(userID, pin) values('$credentails[0]', $credentails[1]);";
				$results = $Connection->query($sql);
				if($results === false)
					echo"<br/>invalid registration";
				else
				{
					echo"Welcome ". $credentails[0];
				}
				exit();
			}
			else
			{
				echo "<bt/>Please fill out all fields.";
				
			}
		}	
	?> 


<html>
	<body>
	<form name = "myForm" method="POST" action="Register.php">
		<p>userID: <input type='text' name='details[0]' value=""/> </p>
		<p>Password: <input type='text' name='details[1]' value=""/> </p>
		<p> <input type='submit' name='submit' value='submit'/> </p>
	</form> 
</body>
</html>