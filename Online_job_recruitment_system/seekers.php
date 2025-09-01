<html>
    <head>
        <title>Job seekers</title>
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
                justify-content: center;
                align-items: center;
                margin-top: 20px;
                margin-left: 30px;
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
            <h1 class="headers">View Applicants</h1>
            <img src="hero03.jpg" alt="" class="header_img">
        </div>
  
        <?php
            $sortColumn = isset($_GET['sort']) ? $_GET['sort'] : 'jobrole'; // Default sorting by 'jobrole'

            $sql = "SELECT fullname, address, email, NIC, jobrole, file_name FROM candidates ORDER BY $sortColumn";
            $result = mysqli_query($connection, $sql);

            if ($result) {
                $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            } else {
                echo "Query failed: " . mysqli_error($connection);
            }
        ?>

        <h1 style="text-align:center">Job Seekers</h1>
        <div class="button-container">
            <button onclick="sortTableByJobRole()">Sort by Job Role</button>
        </div>

        <table>
            <tr>
                <th>Full Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>NIC</th>
                <th><a href="?sort=jobrole">Job Role</a></th>
                <th>File Name</th>
            </tr>
            <tbody>
                <?php
                    foreach ($rows as $row) {
                        echo "<tr>";
                        echo "<td>" . $row['fullname'] . "</td><td>" . $row['address'] . "</td><td>" . $row['email'] . "</td><td>". $row['NIC'] . "</td><td>". $row['jobrole'] . "</td><td><a href='view.php?filename=" . $row['file_name'] . "'>" . $row['file_name'] . "</a></td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>

        <script>
            // JavaScript function to sort the table by the "Job Role" column
            function sortTableByJobRole() {
                var table, rows, switching, i, x, y, shouldSwitch;
                table = document.getElementById("table-body");
                switching = true;

                while (switching) {
                    switching = false;
                    rows = table.getElementsByTagName("tr");

                    for (i = 1; i < (rows.length - 1); i++) {
                        shouldSwitch = false;

                        x = rows[i].getElementsByTagName("td")[4]; // 4 represents the Job Role column
                        y = rows[i + 1].getElementsByTagName("td")[4];

                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    }

                    if (shouldSwitch) {
                        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                        switching = true;
                    }
                }
            }
        </script>

        <footer>
            <p>&copy; 2023 Job Recruitment System</p>
        </footer>
    </body>
</html>
