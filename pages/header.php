<?php
	echo '
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<meta name="keywords" content="Video downloader, download youtube, video download, youtube video, youtube downloader, download youtube FLV, download youtube MP4, download youtube 3GP, php video downloader" />-->
	<link href="css/custom.css" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	
	<nav class="navbar navbar-inverse navbar-static-top remove-margin-bottom">
      <div>
        <div class="navbar-header altered-menu">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Timeshare - Let\'s Make Time</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse altered-container">
			<ul class="nav navbar-nav">
            <li><a href="pages/about.html">About Us</a></li>
            <li><a href="pages/service.html">Service</a></li>
            <li><a href="pages/contact.html">Contact Us</a></li>
		    </ul>
          <form class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
			<button type="button" class="btn btn-default btn-sm button-cart">
          		<span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart
        	</button>
          </form>	
        </div><!--/.navbar-collapse -->
      </div>
    </nav>';
?>