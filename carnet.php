<?php
   include("header.php");
?>
<a href="index.php">Quitter</a>
<br><br>
<select name="school_year">
    <option value="">Please select</option>
<?php
   set_time_limit(0);
   $client = new SoapClient('http://localhost:8080/smb214-JAX-WS/smbws?WSDL');
   //$response = $client->getCarnet($requestParams);
   $response = $client->getSchoolYear();
   print_r($response);
   foreach ($response as $entry) {
       echo "<option value=".$entry['school_year_id'].">".$entry['school_year_name']."</option>";
    }
?>    
</select>
<?php
   include("footer.php");
?>