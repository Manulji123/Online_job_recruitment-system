<html>
    <head>
        <title>About us</title>
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
            <h1 class="headers">About Us</h1>
            <img src="hero03.jpg" alt="" class="header_img">
        </div>
    
        <section id="about" class="page-content">
            <p>Welcome to our Job Recruitment System, and thank you for taking the time to get to know us better. Our "About Us" page is where you can discover the heart and soul of our platform.</p>
	        <h2>Our Mission:</h2>
            <p>At Job Recruitment System, our mission is to bridge the gap between job seekers and employers, creating meaningful connections that drive careers and organizations forward. We believe that every person deserves the opportunity to find the perfect job, and every business should have access to top talent. Our platform is designed to make this vision a reality.</p>
            <h2>Our Values:</h2>
            <p>Integrity, Innovation, and Inclusivity are the core values that drive our platform. We're committed to maintaining the highest ethical standards in all our interactions, fostering a culture of continuous innovation to stay at the forefront of the job recruitment industry, and promoting inclusivity to ensure opportunities for all.</p>
	        <h2>Our Team:</h2>
            <p>Behind every success story on our platform is a dedicated and passionate team. Our team is a diverse group of professionals who are experts in the fields of recruitment, technology, and user experience. Together, we work tirelessly to create a user-friendly and efficient platform for job seekers and employers.</p>
	        <h2>Our Commitment:</h2>
            <p>We're committed to providing a platform that not only connects job seekers with job opportunities but also empowers them with the resources and tools they need to succeed. For employers, we aim to simplify the recruitment process and help them discover top talent that aligns with their organization's goals.</p>
	        <h2>Our Community:</h2>
            <p>Our platform is not just about finding jobs or filling positions; it's about building a community of support and growth. We take pride in the positive impact we've had on countless lives and businesses.</p>
	        <h2>Contact Us:</h2>
            <p>We love hearing from our users and welcome any feedback, questions, or suggestions. If you'd like to get in touch, please feel free to reach out through our Contact Us page. We're more than just a job recruitment website. We're a driving force behind career opportunities, personal growth, and organizational success. We're proud to be a part of your journey, and we look forward to helping you reach your goals. Thank you for choosing Job Recruitment System. Your success is our success, and we're here to support you every step of the way.</p>
        </section>
    
        <footer>
            <p>&copy; 2023 Job Recruitment System</p>
        </footer>
    </body>
</html>