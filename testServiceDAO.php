<HTML>
<body>
<?php
include 'php/dataaccess/ServiceDAO.php';


$Servicedao = new ServiceDAO();
$Servicedao->selectServicesByCategory("Entertain");

?>
</body>
</HTML>
