<html>
	<head>
		<title>Add a vacancy</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/style-2.css">
		<style>
			.login{
                width: 50px;
                height: 45px;
                position: absolute;
                top: 0px;
            }
			.header_img{
                width: 100%;
                height: 100px;
                position: absolute;
                top: 45px;
            }
            .headers{
                font-size: 40px;
                text-align: center;
                position: relative;
                z-index: 100;
                text-decoration: underline;
            }
			.hello{
                width: 45px;
                height: 45px;
            }
			.button-container{
                display: flex;
                justify-content: flex-end;
                margin-top: 20px;
            }
            button{
                background-color: royalblue;
                border: transparent solid 2px;
                border-radius: 8px;
                font-size: 15px;
                height: 30px;
            }
            button:hover{
                background-color: lightblue;
                border: 2px solid royalblue;
                transition: 0.3s ease-out;
                cursor: pointer;
            }
            button a{
                text-decoration: none;
                color: rgb(22, 18, 18);
            }
		</style>
  	</head>

	<body>
		<nav>
			<ul>
				<li class="jobnet">~~JobNet~~</li>
                <li><a href="home.php">Home</a></li>
                <li><a href="About Us.php">About Us</a></li>
                <li><a href="Help.php">Help</a></li>
				<?php
                    include "php/config.php"; 
                    session_start();
                    if (isset($_SESSION['username'])) {
                        $userName = $_SESSION['username'];
                        echo '<li style="float:right">'.'<a href="logout.php">'.'Log out'.'</a>'.'</li>';
                        echo '<li style="float:right">'.$userName.'</li>';
                    }else{
                        echo '<li style="float:right">'.'<a href="index.php">'. 'Login'.'</a>'.'</li>'; 
                    }
                ?>
                <li style="float:right"><img src="295128.png" alt="" class="login"></li>
            </ul>
        </nav>

		<div>
            <h1 class="headers">New Vacancy</h1>
            <img src="hero03.jpg" alt="" class="header_img">
        </div>
  
		<?php 
 			if (isset($_POST['submit'])) {
				$job_title = $_POST['job_title'];
				$company = $_POST['company'];
				$description = $_POST['description'];
				$qualification = $_POST['qualification'];
				$salary = $_POST['salary'];
				$deadline = $_POST['deadline'];
				$contact = $_POST['contact'];

				$query = "INSERT INTO vacancies (job_title, company , description, qualification, salary, deadline, contact) VALUES ('$job_title', '$company', '$description', '$qualification', '$salary', '$deadline', '$contact')";
				if ($connection->query($query) === TRUE) {
					echo "New record created successfully";
				} else {
					echo "Error: " . $query . "<br>" . $connection->error;
				}	 
			}
		?>

		<div class="box">
      		<div class="apply-box">
				<h1 style="text-align:center">Add a new Vacancy</h1>
				<form method="post" action="job_vacancies.php">
					<div class="form-container">
						<div class="form-control">
							<label for="job_title">Job Title:</label>
							<input type="text" name="job_title" id="job_title" placeholder="Enter job title"  required>
						</div>
						<div class="form-control">
							<label for="company">Company:</label>
							<input type="text" name="company" id="company" placeholder="Enter the company" required>
						</div>
						<div class="form-control">
							<label for="description">Job Description:</label>
							<textarea type="text" name="description" id="description" placeholder="Enter job description" cols="30" rows="10" required></textarea>
						</div>
						<div class="form-control">
							<label for="qualification">Qualification:</label>
							<textarea type="text" name="qualification" id="qualification" placeholder="Enter required qualifications" cols="30" rows="10" required></textarea>
						</div>
						<div class="form-control">
							<label for="salary">Salary(Rs.) and Benefits:</label>
							<textarea type="text" name="salary" id="salary" placeholder="Enter salary and benefits" cols="30" rows="10" required></textarea>
						</div>
						<div class="form-control">
							<label for="deadline">Application Deadline:</label>
							<input type="date" name="deadline" id="deadline" placeholder="Enter the application deadline" required>
						</div>
						<div class="form-control">
							<label for="contact">contact:</label>
							<input type="int" name="contact" id="contact" placeholder="Enter the contact number" required>
						</div>
						<input type="submit" name="submit" value="add" style="background-color:green">
					</div>
				</form>
				<div class="button-container">
    				<button><a href="user.php">Back</a></button>
				</div>
            </div>
        </div>

   		<footer>
        	<p>&copy; 2023 Job Recruitment System</p>
    	</footer>
	</body>
</html>