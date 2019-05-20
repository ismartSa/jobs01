<?php
include 'header.php';
include('include/database_connection.php');
if(isset($_SESSION['is_completed'])==0)
{
	header("location:cv.php");
}
?>
    <!-- Category Area Starts -->
    <section class="category-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-top text-center">
                        <h2>Find job by category</h2>
                        <p>Categories with jobs available</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <a href='job.php?job_type=Business Administration'>
                    <div class="single-category text-center mb-4">
                        <img src="assets/images/accounting-icon.png" style='width: 159px;' alt="category">
                        <h4>Business Administration</h4>
                        <h5>250 open job</h5>
                    </div>
                    </a>
                </div>
                <div class="col-lg-6 col-md-6">
                <a href='job.php?job_type=Information Technology'>
                    <div class="single-category text-center mb-4">
                        <img src="assets/images/info.jpg" style='width: 180px;' alt="category">
                        <h4>Information Technology</h4>
                        <h5>250 open job</h5>
                    </div>
                </a>
                </div>
                
                 
                
                 
                 
                </div>
            </div>
        </div>
    </section>
    <!-- Category Area End -->
  
    <?php
    include 'footer.php';
    ?>

