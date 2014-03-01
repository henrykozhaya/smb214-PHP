<?php
   include("header.php");
   set_time_limit(0);
   $client = new SoapClient('http://localhost:8080/smb214-JAX-WS/smbws?WSDL');
   //$response = $client->getCarnet($requestParams);
   $response = $client->getSchoolYear();
   
   echo $client->__getLastResponse();
?>
<a href="carnet.php?user_student_id=<?php echo $_SESSION["user_student_id"]; ?>">Afficher mon carnet</a>
<br>
<a href="logout.php">Quitter</a>
<?php
    include("footer.php");
?>