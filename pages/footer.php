<?php

	echo '		<div class="alert alert-info footer">
		<p>This website is protected by law and is copyrighted to the owners and all those that are involved</p>
	</div>
	
	
	
	<script src="../js/Formvalidation.js"> </script>
    <script src="../js/jquery.min.js"></script>
    <script>window.jQuery || document.write(\'<script src="../js/vendor/jquery.min.js"><\/script>\')</script>
    <script src="../js/tether.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>	
	';
	
		echo "
				<script src='../js/jquery.min.js'></script>
				  <script>
				  
				  function empty_cart() {
					$(document).ready(function(){
					  $('#no_cart').trigger('click');
									}); }
                  </script>";
				  
				  echo ' <input type="hidden" id="no_cart" data-toggle="modal" data-target="#myModal3"/>

				<div id="myModal3" class="modal fade" role="dialog">
					<div class="modal-dialog middle-buttons">
						<div class="modal-content">
							<div class="modal-header">
								<div align="center"><h4 class="modal-title page-header"><b>Empty Cart</b></h4>
								<input type=\'button\' class=\'btn btn-default\' value=\'OK\'  data-dismiss=\'modal\' />
							</div>';     
		echo "			</div>
					</div>
				</div>";
?>