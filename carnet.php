<?php
   include("header.php");
   if((!isset($_GET["school_year_id"]))||(!isset($_GET["exam_id"]))){
       header("location:index.php");
   }
?>
<table>
    <tr>
        <td>
            <table border="1">
                <tr><th>Subject</th></tr>
<?php   
    $student_id = $_SESSION["user_student_id"];
    set_time_limit(0);
    $param = array('student_id'=>$student_id);
    $response = $soap_wsdl->getStudentClassCourse($param);
    foreach ($response->return as $item) {
        echo "<tr><td>".$item."</td></tr>";
    }     
?>
            </table>
        </td>
        <td>
            <table border="1">
                <tr><th>Grade</th></tr>
<?php
    set_time_limit(0);
    $param = array('student_id'=>$student_id, 'exam_id'=>$_GET["exam_id"]);
    $response = $soap_wsdl->getStudentExamGrades($param);
    foreach ($response->return as $item) {
        echo "<tr><td>".$item."</td></tr>";
    }
?>
            </table>
        </td>
    </tr>
</table>
<br>
<a href="index.php">Quitter</a>
<?php
   include("footer.php");
?>