<?php
session_start();
if(!isset($_SESSION["isloggedin"])){
        $_SESSION["isloggedin"] = false;
}

if(!$_SESSION["isloggedin"]){
        if($_SERVER['PHP_SELF']!="/smb214-PHP-master/login.php"){
                header("location:login.php");
        }
}
	
function dbconnect(){
    $link = mysqli_connect("localhost","henryko_smb","henryko_smb","henryko_smb") or die("Error " . mysqli_error($link));
    $sSQL= 'SET CHARACTER SET utf8'; 
    mysqli_query($link,$sSQL);
    return $link;
}
$soap_wsdl = new SoapClient('http://localhost:8080/smb214-JAX-WS/smbws?WSDL');
?>