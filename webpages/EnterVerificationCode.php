<html>
<?php
	include dirname(__FILE__).'/../pages/header.php';
	include dirname(__FILE__).'/../php/dataaccess/RegisterDAO.php';
	
	if(isset($_POST['submit']))
	{
		$Register = new RegisterDAO();
		
		$Register->isRegisterUser($_POST['verificationCode'], $_POST['emailAddress']);
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