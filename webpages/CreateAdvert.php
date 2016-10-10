<html>
<head></head>

<body>
	<?php
		include_once dirname(__FILE__) . "/../php/src/schedule/CreateCalendar.php";
	
		$arr = array_fill(0, 84, 0);
        $Table = new CreateCalendar();
        $Table->createCalendar($arr);
		
	?>
	
		
	<form name="myForm" action="CreateAdvert.php" method="POST">
    <p>Category: <input type='text' name='category' value=""/> </p>
    <p><input type='submit' name='submit' value='submit'/>
</form>
	
</body>


</html>