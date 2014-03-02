<?php   
    include("header.php");
 ?>
<script type="text/javascript">
    $(document).ready(function() {
        $("#school_year").change(function(){
            $("#exam").removeAttr("disabled");
            $.ajax({
                url:"getExamList.php",
                type:"POST",
                data:{
                    school_year_id: $("#school_year").val(),
                },
                success: function (jsonStr) {
                    $("#exam").append(jsonStr);
                }
            });
        }); 
    });
</script>

<form action="carnet.php" method="get">
    <table>
        <tr>
            <td>Select Year</td>
            <td>
                <select name="school_year_id" id="school_year">
                    <option value="">Please select</option>
                    <?php
                        set_time_limit(0);
                        $response = $soap_wsdl->getSchoolYear();
                        foreach ($response->return as $item) {
                            echo "<option value=\"".$item->school_year_id."\">".$item->school_year_name."</option>";
                        }                       
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Select Exam</td>
            <td>
                <select name="exam_id" id="exam" disabled>
                    <option value="">Please select</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Submit" name="Submit" />        
            </td>
        </tr>
    </table>
</form>
<br>
<a href="logout.php">Quitter</a>
<?php
    include("footer.php");
?>