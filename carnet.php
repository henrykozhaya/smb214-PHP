<?php
   include("header.php");
?>
<a href="index.php">Quitter</a>
<br><br>
<?php
   set_time_limit(0);
   $requestParams = $_GET["user_student_id"];
    $client = new SoapClient('http://localhost:8080/smb214-JAX-WS/smbws?WSDL');
    //$response = $client->getCarnet($requestParams);
    $response = $client->getSchoolYear();

    print_r($response);
    include("footer.php");
?>