
<!doctype html>
<html>
	<head>
	    <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
            <link rel="stylesheet" type="text/css" href="css/Homepage.css">
            <link rel="stylesheet" type="text/css" href="css/animate.css">
            <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
            
            <title>sign up</title>	
     </head>

	<body id="signup">
	      <nav class="navbar navbar-default">
                <div class="container">
                  <div class="navbar-header">
                
                    <h1>CRYPTOGRAPHY SYSTEM</h1>
                </div>     
                </div>
              </nav>
              <br>
		<div class="container container-pad">
			<div class="row">
				<div class="col-sm-7 col-md-7 col-sm-offset-3" style="border:2px solid gray">
					<h3><span class="glyphicon glyphicon-login"></span>Client Registration Form</h3>
					<form  class="form-horizontal" method="post" action="registration.php">
						<hr>
						<div class='form-group'>
							<label class='col-sm-5 control-label'>First Name:</label>
							<div class="col-sm-7">
								<input name='firstname' type='text' id='firstname' class="form-control" required>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-5 control-label'>Last Name:</label>
							<div class="col-sm-7">
								<input name='lastname' id='lastname' type='text' class="form-control" required>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-5 control-label'>Gender:</label>
							<div class="col-sm-7">
								<label>
									<span class='labels'>Male</span>
									<input type='radio' checked name='gender' value='M' required>
								</label>
								<label>
									<span class='labels'>Female</span>
									<input type='radio' name='gender' value='F'>
								</label>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-5 control-label'>Email:</label>
							<div class="col-sm-7">
								<input name='email' id="email" type='email' id='email' class="form-control" required>
							</div>
						</div>
						<div id="emailcheck" class="col-sm-offset-5 label-danger">
                                                   <?php
                                               $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                                                   if (strpos($url,'error=email') !== false){
                                                      echo "<p style='color:white'>.Email already exist, try inputting another Email.</p>";
                                                   }

                                                    ?>

                                                        </div>
						<div class='form-group'>
							<label class='col-sm-5 control-label'>Phone:</label>
							<div class="col-sm-7">
								<input name='phone' id='phone' type='text' maxlength='14' class="form-control" required>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-5 control-label'>Username:</label>
							<div class="col-sm-7">
								<input name='username' type='text' class="form-control" required>
							</div>
						</div>
						<div class=" col-sm-offset-5">
                                                    <?php
                                                $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                                                    if (strpos($url,'error=username') !== false){
                                                       echo "<p style='color:red'>.username already exist, try inputting a new username.</p>";
                                                    }

                                                     ?>
                                                </div>
		
						
						<div class='form-group'>
							<label class='col-sm-5 control-label'>Password:</label>
							<div class="col-sm-7">
								<input name='password' id="password" type='Password' class="form-control" required>
							</div>
						</div>
						<div class='form-group'>
							<div id="error" class="col-sm-offset-5 col-sm-5">
							</div>
						</div>
						
						<div class='form-group'>
							<label class='col-sm-5 control-label'>Confirm Pasword:</label>
							<div class="col-sm-7">
								<input name='cpassword' id="confirm" type='password' class="form-control" required>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-sm-5 control-label'>Security Pasword:</label>
							<div class="col-sm-7">
								<input name='security' id="confirm" type='password' class="form-control" required>
							</div>
						</div>
						<div class='form-group'>							
							<div class="col-sm-offset-5 col-sm-7">
								<input name='submit' id="sub" value="REGISTER" type='submit' class="btn btn-primary btn-block">
							</div>
						</div>
						<div id='errors' class="col-sm-offset-5">
						</div>

						<div class="col-sm-offset-5">

						<?php
                        $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                                                    if (strpos($url,'error=success') !== false){
                                                       echo "<p style='color:green'>REGISTRATION SUCCESSFUL</p>";
                                                       echo "<a href='login.php'><button type='submit'  class='btn btn-info'>LOGIN</button></a>";
                                                    }
                                                      if (strpos($url,'error=username') !== false){
                                                       echo "<p style='color:red'>USERNAME ALREADY EXIST</p>";
                                                    }
                                                    if (strpos($url,'error=email') !== false){
                                                       echo "<p style='color:red'>EMAIL ALREADY EXIST</p>";
                                                       }
                                                     ?>
                     </div>
					</form>
				</div>

			</div>

		</div>
		<div>
		<canvas id='mycanvas'>
			
		</canvas>
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
        <script src="js/signup.js"></script>
            <script>
              new WOW().init();
             </script>

	</body>
</html>
