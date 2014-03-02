<?php
    include("lib.php");
    $school_year_id = $_POST['school_year_id'];
    $param = array('school_year_id'=>$school_year_id);
    $data = "";
    set_time_limit(0);
    $response = $soap_wsdl->getExamList($param);
    foreach ($response as $item) {
        $data = $data."<option value=\"".$item->exam_id."\">".$item->exam_name."</option>";
    } 
    echo $data;
?>