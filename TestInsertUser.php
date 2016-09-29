<html>

<body>

<form name="myForm" action="Main.php" method="POST">
    <table>
        <?php
      		include 'php/src/user/User.php';
			include 'php/dataaccess/UserDAO.php';

			$UserObject = new User("UserId", "EmailAddress", "Name", "Password", "a");
			$UserDAO = new UserDAO;
			
		
			//$UserDAO->insertUser($UserObject);
			//$UserDAO->readUser(3);


        ?>
    </table>
    <p><input type='submit' name='submit' value='submit'/>
</form>

</body>
<html>