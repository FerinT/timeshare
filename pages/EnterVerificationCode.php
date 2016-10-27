
<?php
	include dirname(__FILE__).'/../pages/header.php';
	include dirname(__FILE__).'/../php/dataaccess/RegisterDAO.php';
	
	if(isset($_POST['submit']))
	{
		$Register = new RegisterDAO();
		
		$isVerifiedUser = $Register->isRegisterUser($_POST['verificationCode'], $_POST['emailAddress']);
		
		if($isVerifiedUser){
			echo "<script src='../js/jquery.min.js'></script>
				  <script>
					$(document).ready(function(){
					  $('#success_verification').trigger('click');
									});
                  </script>";
		}


		else{
			echo "<script src='../js/jquery.min.js'></script>
				  <script>
					$(document).ready(function(){
					  $('#fail_verification').trigger('click');
									});
                  </script>";
		}
			
	}


 ?>
<html>
<head><script src="../js/jquery.min.js"></script></head>
<body>

	<div align="center">
		<div class="middle-buttons panel custom-panel spaces-top spaces-top-verification text-align-center regVerification" id="verificationCodeForm" style="padding: 40px">
			<form name="verificationCodeForm" action="EnterVerificationCode.php" method="POST">
				<p class='text-color'>Email Address: <input type='text' class="form-control custom-control" name='emailAddress' value=''/></p>
				<p class='text-color'>Verification code: <input type='number' class="form-control custom-control" name='verificationCode' value=''/></p>
				<p><input type='hidden' class="btn btn-md btn-success" id="success_verification" value='success_verification' data-toggle="modal" data-target="#myModal_succ"/></p>
				<p><input type='hidden' class="btn btn-md btn-success" id="fail_verification" value='fail_verification' data-toggle="modal" data-target="#myModal"/></p>
				<p><input type='submit' class="btn btn-md btn-success" name='submit' value='submit'"/></p>
			</form>
        </div>
	</div>

	<div id="myModal_succ" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"></button>
					<h4 class="modal-title page-header"><b>Success!</b></h4>
				</div>
				<div align="center" class="modal-body">
					<h4>Thank You Very Much! Please Login To Complete Registration</h4><br />
					<a href="index.php" type="button" role="button" class="btn btn-success spaces-right btn-lg">Let Me Go!</a>
				</div>
				<div class="modal-footer">
					<!--<button type="button" class="btn btn-default" data-dismiss="modal_succ">Close</button>-->
				</div>
			</div>
		</div>
	</div>

	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"></button>
					<h4 class="modal-title page-header"><b>Fail!</b></h4>
				</div>
				<div align="center" class="modal-body">
					<h4>Unable To Register With Your Verification Details! Please Try Again</h4><br />
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Give Me Another Chance</button>
				</div>
			</div>
		</div>
	</div>

	<div style="margin-top: 693px"></div>

	<div class='alert alert-info footer'>
		<p>This website is protected by law and is copyrighted to the owners and all those that are involved</p>
	</div>
	<script src="../js/Formvalidation.js"> </script>
	<script>window.jQuery || document.write('<script src="../js/vendor/jquery.min.js"><\/script>')</script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>

