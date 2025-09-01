<html>
    <head>
        <title>Find Employees</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/style-2.css">
        <style>
            .login{
                width: 50px;
                height: 45px;
                position: absolute;
                top: 0px;
            }
            .hello{
                width: 45px;
                height: 45px;
            }
            .topic p{
                font-size:20px;
            }
            .hire{
                position:absolute;
                left: 500px;
                top: 100px;
                height: 500px;
                width: 700px;
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

        <?php
            // Check if the user is logged in (the username session variable is set)
            if (isset($_SESSION["username"])) {
                $username = $_SESSION["username"];
                echo '<h1>'. 'Welcome, ' . $username . '!'. '      ' . '<img src="hello.jpg" class="hello">'.'</h1>';
            } else {
                header("location:index.php");
                exit();
            }
        ?>
        
        <div class="topic">
            <h1 > Hire the right person <br>for <i> your</i> business.</h1>
            <p>No matter the skills, experience level or qualification you're looking for, <br> you'll find the right people on  <b>Jobnet </b></p>
        </div>	
        <button type="submit" class="btn" name="login" style="margin-bottom:20px;margin-top:20px;margin-left:50px"><a href="job_vacancies.php">Add a new Job</a></button>
        <button type="submit" class="btn" name="login" style="margin-bottom:20px;margin-top:20px"><a href="seekers.php">view job seekers</a></button>
        <img src="hire.jpg" alt="" class="hire">

        
        <br>
           <footer>
                <p>&copy; 2023 Job Recruitment System</p>
            </footer>
    </body>
</html>