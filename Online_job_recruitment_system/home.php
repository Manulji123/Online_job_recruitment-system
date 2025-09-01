<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/style-2.css">
        <style>
            .card-container {
                display: flex;
                justify-content: space-evenly;
                width: 1300px;
                position: absolute:;
                top: 50px;
            }
            .card {
                border: 1px solid #ccc;
                border-radius: 5px;
                padding: 10px;
                margin: 30px;
                margin-top: 50px;
                background-image:url(ads.jpg);
            }
            .titles{
                text-align: center;
                color: #2345ff;
                font-size: 40px;
            }
            .company{
                color: white;
            }
            .topics{
                font-weight:bold;
            }
            .button {
                background-color: #0074d9; /* Button background color */
                color: #fff; /* Text color */
                border: none;
                padding: 5px 10px;
                border-radius: 3px;
                text-decoration: none; /* Remove underline from the link */
                display: inline-block;
            }
            .button:hover{
                background-color: rgb(88, 91, 239);
                border: none;
                transition: 0.3s ease-out;
                cursor: pointer;
            }
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
            <h1 class="headers">Explore jobs</h1>
            <img src="hero03.jpg" alt="" class="header_img">
        </div>

        <div class="card-container">
            <?php
                $sql = "SELECT * FROM vacancies";
                $result = $connection->query($sql);
                    
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        
                        echo '<div class="card">';
                        echo '<h2 class="titles">' . $row['job_title'] . '</h2>';
                        echo '<p class="topics">' .'Company:'. '</p>';
                        echo '<h2>' . $row['company'] . '</h2>';
                        echo '<p class="topics">' .'Job Description:'. '</p>';
                        echo '<p>' . $row['description'] . '</p>';
                        echo '<p class="topics">' .'Qualifications:'. '</p>';
                        echo '<p>' . $row['qualification'] . '</p>';
                        echo '<p class="topics">' .'Salary:'. '</p>';
                        echo '<p>' . $row['salary'] . '</p>';
                        echo '<p class="topics">' .'Deadline:'. '</p>';
                        echo '<p>' . $row['deadline'] . '</p>';
                        echo '<p class="topics">' .'Contact No:'. '</p>';
                        echo '<p>' . $row['contact'] . '</p>';
                        echo '<div class="button-container">';
                        echo '<a href="apply.php" class="button">Apply Now</a>';
                        echo '</div>';
                        echo '</div>';
                    
                    }
                } else {
                    echo "No data found in the database.";
                }
            ?>
        </div>

        <footer>
            <p>&copy; 2023 Job Recruitment System</p>
        </footer>
    </body>
</html>
