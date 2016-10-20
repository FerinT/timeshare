<html>
<?php
	include dirname(__FILE__).'/../pages/header.php';
	include dirname(__FILE__).'/../php/dataaccess/RegisterDAO.php';
	
	if(isset($_POST['submit']))
	{
		$Register = new RegisterDAO();
		
		$isVerifiedUser = $Register->isRegisterUser($_POST['verificationCode'], $_POST['emailAddress']);
		
		if($isVerifiedUser == true){
						echo "<script type='text/javascript'>alert('Valid code! please complete registration and login');</script>";
			header('Location: ../index.php');		
		}
		else{
			echo "<script type='text/javascript'>alert('Invalid code!');</script>";
		}
			
	}


 ?>

<body>
	<form name="verificationCodeForm" action="EnterVerificationCode.php" method="POST">
		<p>Email Address: <input type='text' name='emailAddress' value=''/></p>
		<p>Verification code: <input type='number' name='verificationCode' value=''/></p>
		<p><input type='submit' name='submit' value='submit' /></p>
	</form>
</body>

</html>