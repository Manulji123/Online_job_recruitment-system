<html>
	<head>
		<title>Registraton</title>
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
			<h1 class="headers">Register</h1>
			<img src="hero03.jpg" alt="" class="header_img">
    	</div>
  
		<?php 
			if (isset($_POST['submit'])) {
				$NIC = $_POST['NIC'];
				$fullname = $_POST['fullname'];
				$email = $_POST['email'];
				$tel = $_POST['tel'];
				$company = $_POST['company'];
				$password = $_POST['password'];
			
				// Insert data into the employers table
				$employers_query = "INSERT INTO employers (NIC, fullname, email, tel, company, password) VALUES ('$NIC', '$fullname', '$email', '$tel', '$company', '$password')";
		
				if ($connection->query($employers_query) === TRUE){ //&& $connection->query($login_query) === TRUE) {
					echo "Registration successful.  ";
				} else {
					//echo "Error: " . $employers_query . "<br>" . $connection->error;
				}
			}
	
			if (isset($_POST['submit'])) {
				$email = $_POST['email'];
				$password = $_POST['password'];
			
				// Insert data into the login table with a default value for usertype
				// Set the default usertype
				$login_query = "INSERT INTO login (username, password) VALUES ('$email', '$password')";
	
				if ($connection->query($login_query) === TRUE) {
					echo "Now you can login using your user name and password";
				} else {
					//echo "Error: " . $login_query . "<br>" . $connection->error;
				}
			}
		?>

		<div class="box">
        	<div class="apply-box">
				<h1 style="text-align:center">New user</h1>
				<form method="post">
					<div class="form-container">
                        <div class="form-control">
							<label for="NIC">NIC:</label>
							<input type="text" name="NIC" id="NIC" placeholder="Enter your NIC number" required>
						</div>
                    	<div class="form-control">
    						<label for="fullname">Full Name:</label>
    						<input type="text" name="fullname" id="fullname" placeholder="Enter your full name" required>
						</div>
                    	<div class="form-control">
    						<label for="email">User Name:</label>
    						<input type="text" name="email" id="email" placeholder="Enter your user name" required>
						</div>
                    	<div class="form-control">
    						<label for="tel">Telephone:</label>
    						<input type="text" name="tel" id="tel" placeholder="Enter your phone number" required>
						</div>
                    	<div class="form-control">
    						<label for="company">Company:</label>
    						<input type="text" name="company" id="company" placeholder="Enter your company" required>
						</div>
                    	<div class="form-control">
							<label for="password">Password:</label>
							<input type="password" name="password" id="password" placeholder="Enter a strong password" required>
						</div>
    					<input type="submit" name="submit" value="register" style="background-color:green">
					</div>
    			</form>
				<div class="button-container">
    				<button><a href="index.php">Back</a></button>
				</div>
			</div>
        </div>

   		<footer>
        	<p>&copy; 2023 Job Recruitment System</p>
    	</footer>
	</body>
</html>