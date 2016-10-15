<?php

if(session_id() == '') {
    session_start();
}

	function validateLoggin() {
		
		if(isset($_POST['logoutbtn']))
		{
			echo logOut();
			header( 'Location: ../index.php' ) ;

		}
		
		else if(isset($_SESSION['username'])) {
			$x = $_SESSION['username'];
			if($x == null) {
				return notLogged();
			} else {
				return loggedIn();
			}
		}
		else
			return notLogged();
	}


	echo "
	<meta name='viewport' content='width=device-width, initial-scale=1'>
    <!--<meta name='keywords' content='Video downloader, download youtube, video download, youtube video, youtube downloader, download youtube FLV, download youtube MP4, download youtube 3GP, php video downloader' />-->
	<link href='css/custom.css' rel='stylesheet'>
	<link rel='stylesheet' href='css/bootstrap.min.css'>
	<link rel='stylesheet' href='css/bootstrap-theme.min.css'>
	
	<nav class='navbar navbar-dark bg-primary navbar-static-top remove-margin-bottom'>
      <div>
        <div class='navbar-header altered-menu'>
          <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#navbar' aria-expanded='false' aria-controls='navbar'>
            <span class='sr-only'>Toggle navigation</span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
          </button>
          <a class='navbar-brand' href='index.php'>Timeshare - Let's Make Time</a>
        </div>
        <div id='navbar' class='navbar-collapse collapse altered-container'>
			<ul class='nav navbar-nav'>
            <li><a href='DisplayAdverts.php'>View Adverts</a></li>
            <li><a href='webpages/CreateAdvert.php'>Create Advert</a></li>
            <li><a href='pages/contact.html'>Contact Us</a></li>
		    </ul>".validateLoggin()."
        </div><!--/.navbar-collapse -->
      </div>
    </nav>";



	function loggedIn() {
		return "<form name='myForm' class='navbar-form navbar-right' method='POST' action='pages/header.php'>
					<h4 class='inline'>Logged In As: <b>".$_SESSION['username']. "</b></h4>
					<input type='submit' class='btn btn-danger' name='logoutbtn' value='Sign Out!'/>
			  	</form>";  
	}

	function notLogged() {
		return "<form name='myForm' class='navbar-form navbar-right' method='POST' action='Login.php'>
				Email Address: <input type='text' class='text-color' name='details[0]' value=''/>
				Password: <input type='text' class='text-color' name='details[1]' value=''/>
				<input type='submit' class='btn btn-success ' name='submit' value='Sign in'/>
				<input type='button' type='button' value='Take Out!' class='btn btn-default btn-sm button-cart' onclick=\"window.location.href='/timeshare/php/src/cart/DisplayCart.php'\"/>
			  </form>";
	}

	function logOut() {
		if(session_id() != '') {
   			session_destroy();
		}
		
		return notLogged();
	}
?>