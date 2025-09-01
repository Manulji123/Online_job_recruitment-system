<html>
    <head>
        <title>Admin</title>
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
            table, th, td {
                border: 1px solid;
                border-collapse: collapse;
                margin: 0 auto;
                background-color: rgb(142, 68, 173, 0.1);
            }
            table th{
                background-color: #8E44AD;
                color: #fff;
                height: 50px;
            }
            table th a{
                text-decoration: none;
                color: #fff;
            }
            .edit{
                background-color: rgb(238, 11, 11);
                border: transparent solid 2px;
                border-radius: 8px;
                font-size: 15px;
                height: 30px;
            }
            .edit:hover{
                background-color: rgb(238, 11, 11, 0.3);
                border: 2px solid rgb(238, 11, 11, 0.3);
                transition: 0.3s ease-out;
                cursor: pointer;
            }
            .del{
                background-color: rgb(42, 87, 239);
                border: transparent solid 2px;
                border-radius: 8px;
                font-size: 15px;
                height: 30px;
            }
            .del:hover{
                background-color: rgb(42, 87, 239, 0.3);
                border: 2px solid rgb(42, 87, 239, 0.3);
                transition: 0.3s ease-out;
                cursor: pointer;
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
            <h1 class="headers">Admin Page</h1>
            <img src="hero03.jpg" alt="" class="header_img">
        </div>

        <?php
            // Check if the form is submitted for deletion
            if (isset($_POST['delete'])) {
                $NIC = $_POST['delete'];

                // Perform the delete operation
                $sql = "DELETE FROM employers WHERE NIC = '$NIC'";
                if (mysqli_query($connection, $sql)) {
                    echo "<script>alert('Record deleted successfully.')</script>";
                } else {
                    echo "Error deleting record: " . mysqli_error($connection);
                }
            }

            // Check if the form is submitted for editing
            if (isset($_POST['edit'])) {
                $editNIC = $_POST['edit'];

                // Fetch the data of the record to be edited
                $sql = "SELECT * FROM employers WHERE NIC = '$editNIC'";
                $editResult = mysqli_query($connection, $sql);

                if ($editResult) {
                    $editRow = mysqli_fetch_assoc($editResult);

                    // Create an edit form to update the record
                    echo "
                        <div class='box'>
                            <div class='apply-box'>
                                <h1 style='text-align:center'>Edit Employer Details</h1>
                                <form method='post'>
                                    <div class='form-container'>
                                        <div class='form-control'>
                                            <input type='hidden' name='editNIC' value='{$editRow['NIC']}'>
                                            <label for='editfullname'>Full Name:</label>
                                            <input type='text' id='editfullname' name='editfullname' value='{$editRow['fullname']}' required>
                                        </div>
                                        <div class='form-control'>
                                            <label for='editemail'>Email:</label>
                                            <input type='email' id='editemail' name='editemail' value='{$editRow['email']}' required>
                                        </div>
                                        <div class='form-control'>
                                            <label for='edittel'>Mobile Number:</label>
                                            <input type='tel' id='edittel' name='edittel' value='{$editRow['tel']}' required>
                                        </div>
                                        <div class='form-control'>
                                            <label for='editcompany'>Company:</label>
                                            <input type='text' id='editcompany' name='editcompany' value='{$editRow['company']}' required>
                                        </div>
                                        <input type='submit' name='update' value='Update' style='background-color:green'>
                                    </div>
                                </form>
                            </div>
                        </div>
                    ";
                }
            }

            // Check if the form is submitted for updating a record
            if (isset($_POST['update'])) {
                $editNIC = $_POST['editNIC'];
                $editfullname = $_POST['editfullname'];
                $editemail = $_POST['editemail'];
                $edittel = $_POST['edittel'];
                $editcompany = $_POST['editcompany'];

                // Perform the update operation
                $sql = "UPDATE employers SET
                        fullname = '$editfullname',
                        email = '$editemail',
                        tel = '$edittel',
                        company = '$editcompany'
                        WHERE NIC = '$editNIC'";

                if (mysqli_query($connection, $sql)) {
                    echo "Record updated successfully.";
                } else {
                    echo "Error updating record: " . mysqli_error($connection);
                }
            }

            // Check if the form is submitted for adding a new record
            if (isset($_POST['add'])) {
                $addNIC = $_POST['addNIC'];
                $addfullname = $_POST['addfullname'];
                $addemail = $_POST['addemail'];
                $addtel = $_POST['addtel'];
                $addcompany = $_POST['addcompany'];
                $addpassword = $_POST['addpassword'];

                // Perform the insert operation
                $sql = "INSERT INTO employers (NIC, fullname, email, tel, company, password) VALUES ('$addNIC', '$addfullname', '$addemail', '$addtel', '$addcompany', '$addpassword')";

                if (mysqli_query($connection, $sql)) {
                    echo "Record added successfully.";
                } else {
                    //echo "Error adding record: " . mysqli_error($connection);
                }
            }
            if (isset($_POST['add'])) {
                $addemail = $_POST['addemail'];
                $addpassword = $_POST['addpassword'];

                // Insert data into the login table with a default value for usertype
                // Set the default usertype
                $login_query = "INSERT INTO login (username, password) VALUES ('$addemail', '$addpassword')";

                if ($connection->query($login_query) === TRUE) {
                    echo "Registration successful. User added to the login table with a default usertype.";
                } else {
                    //echo "Error: " . $login_query . "<br>" . $connection->error;
                }
            }
        ?>
        
        <br>
        <h1 style="text-align:center">Employer Details</h1>
        <table>
            <thead>
                <tr>
                    <th>NIC</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>Company</th>
                    <th>Password</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                <?php
                    $sql = "SELECT * FROM employers";
                    $result = mysqli_query($connection, $sql);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['NIC'] . "</td><td>" . $row['fullname'] . "</td><td>". $row['email'] . "</td><td>" . $row['tel'] . "</td><td>" . $row['company'] . "</td><td>" . $row['password'] . "</td>";
                            echo "<td class='operations'>";
                            echo "<form method='post'>
                                <button type='submit' name='delete' class='del' value='" . $row['NIC'] . "'>Delete</button>
                                </form>";
                            echo "<form method='post'>
                                <button type='submit' name='edit' class='edit' value='" . $row['NIC'] . "'>Edit</button>
                                </form>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
        <br>
        
        <div class="box">
            <div class="apply-box">
                <h1 style="text-align:center">Add New Employer</h1>
                <form method='post'>
                    <div class="form-container">
                        <div class="form-control">
                            <label for='addNIC'>NIC:</label>
                            <input type='text' id='addNIC' name='addNIC' placeholder="Enter your NIC number" required>
                        </div>
                        <div class="form-control">
                            <label for='addfullname'>Full Name:</label>
                            <input type='text' id='addfullname' name='addfullname' placeholder="Enter your full name" required>
                        </div>
                        <div class="form-control">
                        <label for='addemail'>User Name:</label>
                        <input type='text' id='addemail' name='addemail' placeholder="Enter your email address" required>
                        </div>
                        <div class="form-control">
                            <label for='addtel'>Telephone:</label>
                            <input type='tel' id='addtel' name='addtel' placeholder="Enter your phone number" required>
                        </div>
                        <div class="form-control">
                            <label for='addcompany'>Company:</label>
                            <input type='text' id='addcompany' name='addcompany' placeholder="Enter your company" required>
                        </div>
                        <div class="form-control">
                            <label for='addpassword'>Password:</label>
                            <input type='password' id='addpassword' name='addpassword' placeholder="Enter password" required>
                        </div>
                        <input type='submit' name='add' value='Add' style="background-color:green">
                    </div>
                </form>
            </div>
        </div>
        <?php
            // Check if the form is submitted for deletion
            if (isset($_POST['delete'])) {
                $id = $_POST['delete'];

                // Perform the delete operation
                $sql = "DELETE FROM vacancies WHERE id = '$id'";
                if (mysqli_query($connection, $sql)) {
                    echo "<script>alert('Record deleted successfully.')</script>";
                } else {
                    echo "Error deleting record: " . mysqli_error($connection);
                }
            }
         ?>

            <br>
        <h1 style="text-align:center">Vacancies Details</h1>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>job_title</th>
                    <th>company</th>
                    <th>description</th>
                    <th>qualification</th>
                    <th>salary</th>
                    <th>deadline</th>
                    <th>contact</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                <?php
                    $sql = "SELECT * FROM vacancies";
                    $result = mysqli_query($connection, $sql);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td><td>" . $row['job_title'] . "</td><td>". $row['company'] . "</td><td>" . $row['description'] . "</td><td>" . $row['qualification'] . "</td><td>" . $row['salary'] ."</td><td>" . $row['deadline'] ."</td><td>" . $row['contact'] . "</td>";
                            echo "<td class='operations'>";
                            echo "<form method='post'>
                                <button type='submit' name='delete' class='del' value='" . $row['id'] . "'>Delete</button>
                                </form>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
        <footer>
            <p>&copy; 2023 Job Recruitment System</p>
        </footer>
    </body>
</html>

