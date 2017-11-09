<?php
session_start();
?>

<!DOCTYPE html>
    <html lang="en">
         <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
            <link rel="stylesheet" type="text/css" href="css/Homepage.css">
            <link rel="stylesheet" type="text/css" href="css/animate.css">
            <title>login page</title>
            </head>
            <body id="login">
              <nav class="navbar navbar-default">
                <div class="container">
                 <div class="navbar-header">
                    <h1>CRYPTOGRAPHY SYSTEM</h1>
                    </div>      
                </div>
              </nav>
              <div class="container">
              <section class="seclogin">
                    <form class="form-horizontal" method="post" action="login.php">
                    <h2 class="text-center">Don't have an account? <a href='signup.php'><button type="submit"  class="btn btn-info">SIGN UP</button></a>
                    </h2>
                      <div class="form-group">
                        <label for="inputUsername" class="col-sm-5 control-label" >Username</label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control" id="inputusername" name="username"  placeholder="username" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputPassword" class="col-sm-5 control-label">Password</label>
                        <div class="col-sm-3">
                          <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-5 col-sm-5">
                          <?php
                          if (isset($_POST['username']) && isset($_POST['password']) && $_POST['password']!=""){
                            $user = $_POST['username'];
                            $password = $_POST['password'];
                            /* to remove every bash slashes that have been accompanied by database */
                            $username = stripcslashes($user);
                            $password= stripcslashes($password);

                             /* setting the values in a well defined manner */
                        $connecting=mysqli_connect("localhost","root","","cryptography");
                        /* to select the values entered from the database  */
                        $password=sha1($password);
                        $getvalue = "SELECT Username,password FROM user where Username='$username' and password='$password'";
                        $result=mysqli_query($connecting,$getvalue) or die("failed to query database".mysqli_error());

                        $row = mysqli_fetch_array($result);

                        if ($row['Username']==$username and $row['password']==$password){
                            $_SESSION['id']=$row['Username'];
                            header("location:dashboard.php");
                        }
                        else{
                            echo "<p style='color:red'>username or password incorrect</p>";
                        }

                          }

                          ?>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="col-sm-offset-5">
                          <button type="submit" class="btn btn-lg btn-primary">Sign in</button>
                        </div>
                      </div>
                    </form>
                </section>
                </div>
                <footer id="footer"> 
                 <div class="container"> 
                  <div class="text-center"> 
                   <p>IKPEME SAMUEL EMMANUEL (U2013/5570041)</p> 
                  </div> 
                 </div> 
                </footer> <!--/#footer-->
              <script type="text/javascript" src="js/jquery.js"></script>
                <script type="text/javascript" src="js/respond.js"></script>
                <script type="text/javascript" src="js/bootstrap.js"></script>
                <script type="text/javascript" src="js/wow.js"></script>
                <script>
                  new WOW().init();
                </script>

              </body>
              </html>