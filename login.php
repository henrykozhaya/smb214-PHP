<?php
    include("header.php");

    if(isset($_POST["username"])){

    $link = dbconnect();

    $username = $link->real_escape_string($_POST["username"]);
    $password = $link->real_escape_string($_POST["password"]);
    $password = MD5($password);

    $query = "SELECT * FROM `user` WHERE `user_username` = '$username' and `user_password` = '$password'";
    $result = $link -> query($query);
    $row_cnt = $result->num_rows;

    $link->close();

    if($row_cnt == 0){
        echo ("
            <script type=\"text/javascript\">
                $(document).ready(function(){
                    alert(\"Invalid username and/or password\");
                    $(\"#username\").val('');
                    $(\"#username\").focus();
                    $(\"#password\").val('');
                });
            </script>
     ");
    }
    else{
        $row = mysqli_fetch_array($result);
        $_SESSION["isloggedin"] = true;
        $_SESSION["user_id"] = $row["user_id"];
        $_SESSION["user_student_id"] = $row["user_student_id"];
        $link = dbconnect();
        $result = $link -> query("UPDATE `user` SET `user_last_login` = NOW() WHERE `user_username` = '$username'");
        $link->close();
        header("location:index.php");
    }
}
?>
<center>
<form action="login.php" method="post">
    Username:<br>
    <input type="username" name="username" id="username"><br>
    Password:<br>
    <input type="password" name="password" id="password"><br>
    <input type="submit" value="Login">
</form>
</center>
<?php
	include("footer.php");
?>