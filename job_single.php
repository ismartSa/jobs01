<?php
include 'header.php';
include('include/database_connection.php');
if(isset($_SESSION['is_completed'])==0)
{
	header("location:cv.php");
}

 

if($_POST['apply'])
{

    $query_check = "
SELECT * FROM order 
    WHERE user_id='".$_SESSION["id"]."' and job_id=".$_GET["job_id"]."
    ";
$statement = $connect->prepare($query_check);
$statement->execute();
$count = $statement->rowCount();
if($count === 0)
{
    $result = $statement->fetchAll();
    $query = "
    INSERT INTO `order` (user_id,job_id) 
    VALUES (:user_id,:job_id)
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':user_id'			=>	$_SESSION['id'],
            ':job_id'           =>  $_GET['job_id']
        )
    );
    $result = $statement->fetchAll();
    if($statement)
    {
        echo '<script>alert("Done Order Job");</script>'; 
         
    }
}
else
{
    echo '<script>alert("This Job is Order regisApply !");</script>';
    }
}


$query = "
		SELECT * FROM jobs WHERE id = '".$_GET["job_id"]."'
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		 
		foreach($result as $row)
		{
			 
             
			$output .= '
            <div class="col-lg-8">
                    <div class="main-content">
                        <div class="single-content1">
                            <div class="single-job mb-4 d-lg-flex justify-content-between">
                                <div class="job-text">
                                    <h4>'.$row["job_name"].'/ '.$row["company_name"].'</h4>
                                    <ul class="mt-4">
                                    <li class="mb-3"><h5><i class="fa fa-map-marker"></i>'.$row["addr"].'</h5></li>
                                     <li><h5><i class="fa fa-clock-o"></i>Deadline : '.$row['deadline'].'</h5></li>
                                    <li><h5><i class="fa fa-clock-o"></i>Time Post : '.$row['time'].'</h5></li>
                                    </ul>
                                </div>
                                <div class="job-btn align-self-center">
                                    <a href="#" class="forth-btn">'.$row["emp_status"].'</a>
                                </div>
                            </div>
                        </div>
                        <div class="single-content2 py-4">
                            <h4>Descrption</h4>
                            <p>'.$row["descr"].'</p>
                        </div>
                         
                        <div class="single-content4 py-4">
                            <h4>job responsibility</h4>
                            <p></p>
                            <ul>
                                <li>'.$row["job_repo"].'</li>
                            </ul>
                        </div>
                        <div class="single-content5 py-4">
                            <h4>Educational Requirements</h4>
                             <p>'.$row["edu_requir"].'</p>
                        </div>
                        <div class="single-content6 py-4">
                            <h4>employment status</h4>
                            <span>Part '.$row["id"].'</span>
                        </div>
                        <div class="single-content7 py-4">
                            <h4>other benifits</h4>
                            <ul class="mt-3">
                                
                                <li>'.$row["other_benifits"].'</li>
                            </ul>
                        
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                     
                         
                         
                         
                    </div>
                </div>
            ';
            
            
		}
		 

      
         
    


?>

    <section class="job-single-content section-padding">
        <div class="container">
            <div class="row">
               <?php echo $output; ?>
               <form method="post">
                             <input type="submit"  value="Apply" class="btn btn-success" style="    direction: rtl;
                            display: block;
                            margin-top: 110px;" name="apply">
                        </form>
            </div>
        </div>
    </section>
  

 
     

 <?php
include 'footer.php';

?>