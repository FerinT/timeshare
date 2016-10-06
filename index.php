<!DOCTYPE html>
<html>
<head><title>Timeshare</title></head>
<body class="font-color">
	
	<?php include '/pages/header.php' ?>
	
	<div class="image">
		<div class="row rows-position">
			<div class="col-md-1">
			</div>
			<div class="col-md-6">
				<h1 class="jumbotron fonts color:black">Tutors At Your Expense!</h1>
				<h2 style="color:black"><b>Hundreds of students use Timeshare to find their perfect tutors, why don't you start today?</b></h2>
			</div>
			<div class="col-md-4">
				<div align="center" class="middle-buttons panel custom-panel">
					<div id="registration" align="center" class="register-form">
						<input type="text" class="form-control custom-control" placeholder="Choose a usrname"> <br />
						<input type="password" class="form-control custom-control" placeholder="Choose a password"> <br />
						<input type="password" class="form-control custom-control" placeholder="Retype your password"> <br />
						<input type="button" class="btn btn-info btn-lg register-button" value="Register"/>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div align="center">
		<h3 class="inline">Not A Registered User? No Problem</h3><button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#myModal">Continue Browsing</button>
	</div>
	
	<hr />
	
	<div class="jumbotron text-center custom-jumboton">
		<h1>Timeshare</h1>
		<p>Let us take you further!</p> 
	</div>
	
	<hr />

	<div class="container">
		<div class="row">
		<div class="col-md-4 row-border">
			<div align="center">
				<h1 class="glyphicon glyphicon-book fonts"></h1>
				<h3>Tutors</h3>
				<p>Hundreds of professional tutors at your service...
				<br />Find all sorts of tutors that you need at your time and expense...</p>
			</div>
		</div>
		<div class="col-md-4 row-border">
			<div align="center">
				<h1 class="glyphicon glyphicon-usd fonts"></h1>
				<h3>Pricing</h3>
				<p>With our prices you wouldn't need to go anywhere else...
				<br />No need to pay for lessons you don't need, only pay for them when you need them...</p>
			</div>
		</div>
			<div class="col-md-4 row-border">
				<div align="center">
					<h1 class="glyphicon glyphicon-lock fonts"></h1>
					<h3>Payments</h3> 
					<p>Now with our new service of payment, things just got a lot easier...
					<br />From debit cards to credit cards, we allow PayPal and EFT...</p>
				</div>
			</div>
		</div>
	</div>
	
	<hr />
	
	<div class="jumbotron custom-jumboton">
		<div class="spaces-left">
			<h2>Who Uses Our Site?</h2>
			<p>Anyone who is either looking to have professional tutors help them out or<br />
			professional tutors willing to sell their time to tutees</p> 
		</div>
	</div>
	
	<hr />
	
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title page-header"><b>Registration Benefits</b></h4>
		  </div>
		  <div align="center" class="modal-body">
			<h4>Register today and take advantage of the best tutoring deals</h4><br />
			<a href="#registration" type="button" role="button" data-dismiss="modal" class="btn btn-success spaces-right btn-lg">Take Me Back To Register!</a>
			<a href="DisplayAdverts.php" type="button" role="button" class="btn btn-warning spaces-right btn-lg">I'll Register Later, Promise</a>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>
		</div>
	  </div>
	</div>
	
	<?php include '/pages/footer.php' ?>
	
</body>
</html>