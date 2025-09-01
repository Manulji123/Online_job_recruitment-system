<?php
  include "php/config.php";
  session_start();

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $username = $_POST["username"];
      $password = $_POST["password"];
      
      $sql = "select * from login where username='" . $username . "' AND password='" . $password . "' ";
      $result = mysqli_query($connection, $sql);
      
      if ($result) {
        $row = mysqli_fetch_array($result);
        if ($row) {
          if ($row["user_type"] == "user") {
            $_SESSION["username"] = $username;
            header("location:user.php");
          } elseif ($row["user_type"] == "admin") {
            $_SESSION["username"] = $username;
            header("location:admin_employer.php");
          } else {
            header("location:index.php?error=1"); // Redirect with an error parameter.
          }
        } 
      } 
  }

?>

<html>
  <head>
    <title>JobNet</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style-2.css">
    <style>
      .login{
        width: 50px;
        height: 45px;
        position: absolute;
        top: 0px;
      }
      .jn{
        position: absolute;
        top:200px;
        left:0px;
        z-index: -100;
      }
      .login_box{
        position: absolute;
        top:200px;
        left:700px;
        width: 500px;
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
      <h1 class="topic">Get your dream job with</h1>
      <h1 class="dream">JobNet</h1> 
      <button class="btn"> <a href="home.php">Find Jobs</a></button>
    </div>
    <img src="man.avif" alt=""  class="jn">
      
    <div class="signup">
      <p style="font-size:20px;font-weight:bold">Are you looking for new faces to hire?</p>
      <h1 style="font-size:40px;">Join us & Let your <br> employee find you </h1>
    </div>
   
    <div class="login_box">
      <div class="apply-box">
        <h1 style="text-align:center">Login</h1>
        <form method="POST" id="login" action="index.php">
          <div class="form-container">
            <div class="form-control">
              <label for="username">User Name:</label>
              <input type="text" name="username" placeholder="Enter your user name" required>
            </div>
            <div class="form-control" >
              <label for="password">Password:</label>
              <input type="password" name="password" placeholder="Enter password" required>
            </div>
            <input type="submit" name="login" value="Login" style="background-color:green">
          </div>
        </form>
        <p style="text-align:center">Not a member? <a href="employer.php">Signup Now</a></p>
      </div>
    </div>
<br><br><br> <br> <br> <br>
    <footer>
      <p>&copy; 2023 Job Recruitment System</p>
    </footer>

  </body>
</html>


