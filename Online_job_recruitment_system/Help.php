<html>
    <head>
        <title>Help</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style-2.css">
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
            <h1 class="headers">Help Center</h1>
            <img src="hero03.jpg" alt="" class="header_img">
        </div>
    
        <section id="help" class="page-content">
            <p>Welcome to our Job Recruitment System Help Center. We're here to make your experience on our platform as smooth and successful as possible. Whether you're a job seeker looking for your dream career or an employer seeking top talent, this page is your go-to resource for assistance and information.</p>
	        <h2>Getting Started:</h2>
            <p>If you're new to our platform, "Getting Started" is the perfect place to begin. Here, you'll find step-by-step instructions on how to create an account, set up your profile, and start using our job recruitment system effectively.</p>
            <h2>Job Searching:</h2>
            <p>Searching for jobs can sometimes be overwhelming. In the "Job Searching" section, we provide guidance on how to search for positions, refine your search results, and apply for job openings. Discover the tips and tricks to find the perfect job for you.</p>
	        <h2>Employer Guidance:</h2>
            <p>Are you an employer looking to post job listings and connect with potential candidates? "Employer Guidance" has you covered. Learn how to create, manage, and optimize your job postings to attract the right talent for your organization.</p>
	        <h2>Contact Support:</h2>
            <p>At times, you may have questions or encounter issues while using our platform. That's where our support team comes in. In the "Contact Support" section, you'll find information on how to get in touch with our dedicated support professionals who are ready to assist you with any queries or challenges you may face. We're committed to providing you with the best experience possible, and our Help Center is just one way we do that. We've designed it to be a valuable resource for you to access whenever you need assistance, and we're continually updating it to address your evolving needs. Your success in finding the perfect job or talent is our top priority. We hope this Help Center helps you on your journey. If you have any suggestions or additional questions, please don't hesitate to reach out to our support team. We're here to serve you and make your job recruitment process a seamless one. Thank you for choosing our Job Recruitment System. Your success is our success, and we're here to support you every step of the way.</p>
	        <p>JobNet@support.com</p>
        </section>
    
        <footer>
            <p>&copy; 2023 Job Recruitment System</p>
        </footer>
    </body>
</html>