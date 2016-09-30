<HTML>
<body>
<?php
include 'php/dataaccess/ServiceDAO.php';
include 'php/src/service/ServiceTableGenerator.php';


$Servicedao = new ServiceDAO();
$Servicedao->selectServicesByCategory("Entertain");

$ServiceTable = new ServiceTableGenerator();
$ServiceTable->getTableForUser(5);


?>
</body>
</HTML>
