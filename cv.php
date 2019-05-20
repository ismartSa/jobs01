<?php
include('include/database_connection.php');

if(isset($_SESSION['is_completed'])==1)
{
	header("location:index.php");
}

if($_POST['reg'])
	{
        $query = "
            update users set job_name=:job_name , skills=:skills , edu_level=:edu_level,
                             birth=:birth , addr=:addr ,tel=:tel , descr=:descr , is_completed=:is_completed where email=:email
        ";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':job_name'		    	=>	$_POST['job_name'],
				':skills'				=>	$_POST['skills'],
				':edu_level'			=>	$_POST['edu_level'],
                ':birth'	            =>	date("Y-m-d"),
                ':addr'                 => $_POST['addr'],
                ':tel'                 => $_POST['tel'],
                ':descr'                 => $_POST['descr'],
                ':is_completed'                 => 1,
                ':email'                 => $_SESSION['email'],


			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
            echo '<script>alert("Done CV!");</script>';
            $query = "
            SELECT * FROM users 
                WHERE email = :email
            ";
            $statement = $connect->prepare($query);
            $statement->execute(
                array(
                        'email'	=>	$_SESSION["email"]
                    )
            );
            $count = $statement->rowCount();
            if($count > 0)
            {
                $result = $statement->fetchAll();
                foreach($result as $row)
                {
                     
                        if(($_SESSION["email"] == $row["email"]))
                        {
                            $_SESSION['id'] = $row['id'];
                            $_SESSION['email'] = $row['email'];
                            $_SESSION['user_name'] = $row['name'];
                            $_SESSION['is_completed']=$row['is_completed'];
                            header("location:index.php");
                        }
                        else
                        {
                             
                        }
                     
                }
            }
            else
            {
                 
                }
            
	}
	 
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V18</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" style='margin-top: -135px;' method='post'>
					<span class="login100-form-title p-b-43">
                    Sign Up
					</span>
                    
                    
                    <div class="wrap-input100 validate-input" data-validate = "Valid Job Name is required">
						<input class="input100" type="text" name="job_name">
						<span class="focus-input100"></span>
						<span class="label-input100">Job Name</span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Valid Skills is required">
						<textarea class="input100" name="skills"></textarea>
						<span class="focus-input100"></span>
						<span class="label-input100">Skills</span>
                    </div>
                    
                    <div class="wrap-input100 validate-input" data-validate = "Valid Education level is required">
						<select class="input100" name="edu_level">
                            <option value='Dploma'>Dploma<option>
                            <option value='BC'>BC</option>
                        </select>
						<span class="focus-input100"></span>
						<span class="label-input100">Education level</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Birth is required">
						<input class="input100" type="date" name="birth">
						<span class="focus-input100"></span>
						<span class="label-input100">Birth</span>
					</div>

                     
                     <div class="wrap-input100 validate-input" data-validate = "Valid Address is required: ex@abc.xyz">
						<textarea class="input100" name="addr"></textarea>
						<span class="focus-input100"></span>
						<span class="label-input100">Address</span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Telephone is required">
						<input class="input100" type="tel" name="tel">
						<span class="focus-input100"></span>
						<span class="label-input100">Telephone</span>
					</div>


                    <div class="wrap-input100 validate-input" data-validate = "Valid Descrption is required">
						<textarea class="input100" name="descr"></textarea>
						<span class="focus-input100"></span>
						<span class="label-input100">Descrption</span>
                    </div>
			

					<div class="container-login100-form-btn">
						<input type='submit' value='Complete CV' class="login100-form-btn" name='reg'>
					</div>
					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							
							<a class='btn btn-danger' href="include/logout.php" >
							Logout 
						</a>
						</span>
					</div>
					 

					 
				</form>

				<div class="login100-more" style="background-image: url('images/logo.jpg');">
				</div>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>