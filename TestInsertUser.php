<html>

<body>

<form name="myForm" action="Main.php" method="POST">
    <table>
        <?php
      		include 'php/src/user/User.php';
			include 'php/dataaccess/UserDAO.php';

			$UserObject = new User();
			$UserObject->setUserId(1);
			$UserDAO = new UserDAO;
			
		
			//$UserDAO->insertUser($UserObject);


			$UserOject = $UserDAO->readUser($UserObject);
			$image = $UserObject->getProfilePicture(); 
			echo '<img src="data:image/jpeg;base64,'.base64_encode( $image ).'"/>';
        ?>
    </table>
    <p><input type='submit' name='submit' value='submit'/>
</form>

</body>
<html>