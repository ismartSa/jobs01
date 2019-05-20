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

if($company_name && $address && $job_name && $jop_repo && $edu_required && $employment && $other_benefits && $describe && $final_date && $type && $img){
    $bool=mysqli_query($con,"INSERT INTO `jobs` (`company_name`, `logo`, `addr`, `job_name`, `job_repo`, `edu_requir`, `emp_status`, `other_benifits`, `descr`, `deadline`, `type`) VALUES ('$company_name','$img','$address','$job_name','$jop_repo','$edu_required','$employment','$other_benefits','$describe','$final_date','$type')");
    $resp['status']=$bool;
    $resp['notalldata']=true;
}
else{
    $resp['notalldata']=false;
    $resp['status']=false;
}
echo json_encode($resp);
?>