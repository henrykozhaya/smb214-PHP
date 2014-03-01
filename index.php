<?php
   include("header.php");
?>
<a href="carnet.php?user_student_id=<?php echo $_SESSION["user_student_id"]; ?>">Afficher mon carnet</a>
<br>
<a href="logout.php">Quitter</a>
<?php
    include("footer.php");
?>