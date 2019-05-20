<?php

include ('config.php');

$result=mysqli_query($con,'SELECT o.id,u.name,u.email,u.id_number,u.job_name,u.skills,u.edu_level,u.birth,u.addr,u.tel,u.descr,j.job_name jn FROM `order` AS o INNER JOIN users u on o.user_id= u.id INNER JOIN jobs j ON  j.id=o.job_id 
');
if(mysqli_num_rows($result)>0){
    $resp['status']=true;
    $resp['orders']=mysqli_fetch_all($result,MYSQLI_ASSOC);

}else $resp['status']=false;

echo json_encode($resp);

?>