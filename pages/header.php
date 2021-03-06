<?php

if(session_id() == '') {
    session_start();
}

	$value = '';
	
	if (!isset($_SESSION['cartItems']) || $_SESSION['cartItems'] == ""){	
		$value = 'empty';
	}
	
	//echo $value;

	function validateLoggin() {
		
		if(isset($_POST['logoutbtn']))
		{
			echo logOut();
			header( 'Location: index.php' ) ;

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
            <li><a href='../pages/DisplayAdverts.php'>View Adverts</a></li>
            <li><a href='../pages/CreateAdvert.php'>Create Advert</a></li>
			<!-- <li><a href='pages/contact.html'>Contact Us</a></li> -->
		    </ul>".validateLoggin()."
        </div><!--/.navbar-collapse -->
      </div>
    </nav>";
					  
	function loggedIn() {
		
		global $value;
		
		$cart = "window.location.href='DisplayCart.php'";
		
		if($value == "empty") {
			$cart = "empty_cart()";
		}
		
		return "<form name='myForm' class='navbar-form navbar-right' method='POST' action='header.php'>
					<h4 class='inline'>Hi <b>".$_SESSION['username']. "!</b></h4>
					<button type='button' name='profile' class='btn btn-info glyphicon glyphicon-user spaces-right-header' onclick=\"window.location.href='/timeshare/pages/profile.php'\"'></button>
					<button type='button' class='btn btn-success glyphicon glyphicon-shopping-cart spaces-right-header' onclick=\"".$cart."\"></button>
					<input type='submit' class='btn btn-danger' name='logoutbtn' value='Sign Out!'/>
			  	</form>
				
					
				";  
	}

	function notLogged() {
		
		global $value;
		
		$cart = "window.location.href='DisplayCart.php'";
		
		if($value == "empty") {
			$cart = "empty_cart()";
		}
		
		return "<form name='myForm' class='navbar-form navbar-right' method='POST' action='../Login.php'>
				Email Address: <input type='text' class='text-color' name='details[0]' value=''/>
				Password: <input type='password' class='text-color' name='details[1]' value=''/>
				<input type='submit' class='btn btn-success ' name='submit' value='Sign in'/>
				 <button type='button' name='btn-worse' class='btn btn-info btn-md glyphicon glyphicon-shopping-cart spaces-left' onclick=\"".$cart."\"></button>
			  </form>
			  ";
	}
	// that button can't be in the form because then it doesnt go to the next page
	function logOut() {
		if(session_id() != '') {
   			session_destroy();
		}
		
		return notLogged();
	}
	
?>