<?php

include ('config.php');

$result=mysqli_query($con,'select `id`,`company_name`, `logo`, `addr`, `job_name`, `job_repo`, `edu_requir`, `emp_status`, `other_benifits`, `descr`, `deadline`, `type`, `time` from jobs ');
if(mysqli_num_rows($result)>0){
    $resp['status']=true;
    $resp['jobs']=mysqli_fetch_all($result,MYSQLI_ASSOC);

}else $resp['status']=false;

echo json_encode($resp);

?>