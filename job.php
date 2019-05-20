<?php
include 'header.php';
include('include/database_connection.php');
if(isset($_SESSION['is_completed'])==0)
{
	header("location:cv.php");
}
$query = "
		SELECT * FROM jobs WHERE type = '".$_GET["job_type"]."'
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		 
		foreach($result as $row)
		{
			 
			 
			$output .= '
             <div class="single-job mb-4 d-lg-flex justify-content-between">
                   
                        <div class="job-text">
                        <a href="job_single.php?job_id='.$row["id"].'">
                        <h4>'.$row["job_name"].'/ '.$row["company_name"].'</h4>
                        </a>
                            <ul class="mt-4">
                                <li class="mb-3"><h5><i class="fa fa-map-marker"></i>'.$row["addr"].'</h5></li>
                                <li class="mb-3"><h5><i class="fa fa-pie-chart"></i> '.$row["emp_status"].'</h5></li>
                                <li><h5><i class="fa fa-clock-o"></i>Deadline : '.$row['deadline'].'</h5></li>
                                <li><h5><i class="fa fa-clock-o"></i>Time Post : '.$row['time'].'</h5></li>
                            </ul>
                        </div>
                        <div class="job-img align-self-center">
                            <img src="assets/images/job1.png" alt="job">
                        </div>
                        <div class="job-btn align-self-center">
                             <a href="job_single.php?job_id='.$row["id"].'" class="third-btn">apply</a>
                        </div>
                        
                    </div>
			';
		}
		 
		
?>


    <!-- Jobs Area Starts -->
    <section class="jobs-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                   <? echo $output;?>

                     
                     
                    
            </div>
    </div>
        </div>
    </section>
    <!-- Jobs Area End -->
<?php
include 'footer.php';
?>