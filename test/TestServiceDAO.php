<HTML>
<body>
<?php
include_once dirname(__FILE__) . '/../php/dataaccess/ServiceDAO.php';
include_once dirname(__FILE__) . '/../php/src/service/ServiceTableGenerator.php';


$Servicedao = new ServiceDAO();
//$Servicedao->selectServicesByCategory("Entertain");

$ServiceTable = new ServiceTableGenerator();
$ServiceTable->getTableForUser(5);


?>
</body>
</HTML>
