
<?php
	include dirname(__FILE__).'/../pages/header.php';
	include dirname(__FILE__).'/../php/dataaccess/RegisterDAO.php';
	
	if(isset($_POST['submit']))
	{
		$Register = new RegisterDAO();
		
		$isVerifiedUser = $Register->isRegisterUser($_POST['verificationCode'], $_POST['emailAddress']);
		
		if($isVerifiedUser == true){
			echo "<script type=\"text/javascript\">window.alert('Valid code! please complete registration and login');window.location.href = 'index.php';</script>";
		}
		else{
			echo "<script type='text/javascript'>alert('Invalid code!');</script>";
		}
			
	}


 ?>
<html>
<body>
	<div id="verificationCodeForm" style="background-color:#2ba7cc;     margin: auto;
	margin-top: 50px;
    display:inline-block;
    width: 50%;
    display: block;
	padding: 70px 0;
    text-align: center;">
		<form name="verificationCodeForm" action="EnterVerificationCode.php" method="POST">
			<p class='text-color'>Email Address: <input type='text' name='emailAddress' value=''/></p>
			<p class='text-color'>Verification code: <input type='number' name='verificationCode' value=''/></p>
			<p><input type='submit' name='submit' value='submit' /></p>
		</form>
		</div>
</body>

</html>