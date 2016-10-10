<html>
<head></head>

<body>
	<?php
	
	// this needs to change so that when a user selects a categpry we show input fields relative to that
		include_once dirname(__FILE__) . "/../php/src/schedule/CreateCalendar.php";
	
		$arr = array_fill(0, 84, 0);
        $Table = new CreateCalendar();
        $Table->createCalendar($arr);
		
	?>
	
		
	<form name="myForm" action="CreateAdvert.php" method="POST">
    <p>Please select a Category: 
	<select name="categoryType">
		<option value="education">Education</option>
		<option value="entertainment">Entertainment</option>
		<option value="business">Business</option>
		<option value="other">Other</option>
	</select> </p>
	<p>Price per hour :R <input type='number' name='pricePerHour' value=''/></p>
	<p>Type of service offered: ( ie Math tutor, DJ) <input type='text' name='typeOfService' value=''/> </p>
	<p>Short description <input type='text' name='description' value=''/> </p>
    <p><input type='submit' name='submit' value='submit'/>
</form>
	
</body>


</html>