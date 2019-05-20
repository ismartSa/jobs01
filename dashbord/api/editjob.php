<?php

include('config.php');
$data=json_decode(file_get_contents("php://input"),true);
$company_name=$data['company_name'];
$address=$data['address'];
$job_name=$data['job_name'];
$jop_repo=$data['jop_repo'];
$edu_required=$data['edu_required'];
$employment=$data['employment'];
$other_benefits=$data['other_benefits'];
$describe=$data['describe'];
$final_date=$data['final_date'];
$type=$data['type'];
$img=$data['img'];
$id=$data['id'];
$querr="UPDATE `jobs` SET `company_name`='$company_name',`logo`='$img',`addr`='$address',`job_name`='$job_name',`job_repo`='$jop_repo',`edu_requir`='$edu_required',`emp_status`='$employment',`other_benifits`='$other_benefits',`descr`='$describe',`deadline`='$final_date',`type`='$type' WHERE id='$id'";

$bool=mysqli_query($con,$querr);

$resp['status']=$bool;


echo json_encode($resp);

?>