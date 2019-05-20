<?php

include ('config.php');

$result=mysqli_query($con,'SELECT `id`, `name`, `email`, `id_number`, `job_name`, `skills`, `edu_level`, `birth`, `addr`, `tel`, `descr` FROM `users`');
if(mysqli_num_rows($result)>0){
    $resp['status']=true;
    $resp['users']=mysqli_fetch_all($result,MYSQLI_ASSOC);

}else $resp['status']=false;

echo json_encode($resp);

?>