<html>
    <head>
        <title> Job Application</title>
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
        <h1 class="headers">Submit Application</h1>
        <img src="hero03.jpg" alt="" class="header_img">
        </div>

        <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['fullname']) && isset($_POST['address']) && isset($_POST['email']) && isset($_POST['NIC']) && isset($_POST['jobrole']) && isset($_FILES['pdf_file']) && $_FILES['pdf_file']['error'] === UPLOAD_ERR_OK) {
                    $fullname = $_POST['fullname'];
                    $address = $_POST['address'];
                    $email = $_POST['email'];
                    $NIC = $_POST['NIC'];
                    $jobrole = $_POST['jobrole'];
                    $file_data = file_get_contents($_FILES['pdf_file']['tmp_name']);
                    $file_name = $_FILES['pdf_file']['name'];

                    $conn = new mysqli('localhost', 'root', '', 'users');

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $stmt = $conn->prepare("INSERT INTO candidates (fullname, address, email, NIC, jobrole, file_name, file_data) VALUES (?, ?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("sssssss", $fullname, $address, $email, $NIC, $jobrole, $file_name, $file_data);

                    if (!$stmt->execute()) {
                        echo "PDF file uploaded successfully.";
                    } else {
                        echo "" . $conn->error;
                    }

                    $stmt->close();
                    $conn->close();
                } else {
                    echo "Error uploading the PDF file. Please provide both email address and a PDF file.";
                }
            }
        ?>

        <br> 
        <div class="box">
            <div class="apply-box">
                <h1 style="text-align:center">Job Application Form</h1>
                <form action="apply.php" method="post" enctype="multipart/form-data">
                    <div class="form-container">
                        <div class="form-control">
                            <label for="fullname">Full Name:</label>
                            <input type="text" name="fullname" id="fullname" placeholder="Enter your full name" required>
                        </div>
                        <div class="form-control">
                            <label for="address">Address:</label>
                            <textarea type="text" name="address" id="address" placeholder="Enter your address" cols="30" rows="10" required></textarea>
                        </div>
                        <div class="form-control">
                            <label for="email">Email Address:</label>
                            <input type="email" name="email" placeholder="Enter your email address" required>
                        </div>
                        <div class="form-control">
                            <label for="NIC">NIC:</label>
                            <input type="text" name="NIC" id="NIC" placeholder="Enter your NIC number" required>
                        </div>
                        <div class="form-control">
                            <label for="jobrole">Job Role:</label>
                            <select name="jobrole" id="jobrole">
                                <option value="engineer">Engineer</option>
                                <option value="manager">Manager</option>
                                <option value="accountant">Accountant</option>
                                <option value="teacher">Teacher</option>
                                <option value="developer">Developer</option>
                                <option value="receptionists">Receptionists</option>
                                <option value="administrator">Administrator</option>
                                <option value="specialist">Specialist</option>
                                <option value="banker">Banker</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-control">
                            <label for="pdf_file">Upload CV:</label>
                            <input type="file" name="pdf_file" required>
                        </div>
                        <input type="submit" value="Submit Application" style="background-color:green">
                    </div>
                </form>
                <div class="button-container">
                    <button><a href="home.php">Back</a></button>
                </div>
            </div>
        </div>

        <footer>
            <p>&copy; 2023 Job Recruitment System</p>
        </footer>
    
    </body>
</html>

