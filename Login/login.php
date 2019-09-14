<?php
include($_SERVER['DOCUMENT_ROOT'].'/db_connection.php');

$mysqli = OpenCon();
//echo "Connected Successfully";
?>

<!DOCTYPE HTML>
<html lang="en">
	
<head>
	<title>Login Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link href="style.css" rel="stylesheet">
	<script src="script.js"></script>
</head>

<body>
	
    <div class="container">
        <div class="row">
			<div class="col">
				<h2 style="text-align: center;font-family:'Kaushan Script', cursive;color: beige;">Welcome to IMPACT Login Page</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-5 mx-auto">
				<div class="myform form ">
					<div class="logo mb-3">
						<div class="col-md-12 text-center">
							<h1>Login</h1>
						 </div>
					</div>
                   <form action="" method="post" name="login" novalidate>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Email address</label>
                              <input type="email" name="username"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Password</label>
                              <input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
                           </div>
                           <div class="col-md-12 text-center ">
                              <button type="submit"  name="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Login</button>
                           </div>
					   	 <?php
					   		
					   
						   if(isset($_POST['submit'])){

							$uname=$_POST['username'];
							$password=$_POST['password'];

							$sql="select * from admin where username='".$uname."'AND password=password('".$password."') limit 1";
							
							$result=$mysqli->query($sql);
							
							if ($result) {
								// $result is an object and can be used to fetch row here 
								
								/* determine number of rows result set */
    							$row_cnt = $result->num_rows;
								
								echo $row_cnt;
								
								/* close result set */
    							$result->close();
							}
							else {
								printf("Query failed: %s\n", $mysqli->error);
							}

						}
						CloseCon($mysqli);
					   ?>
                     </form>
				</div>
			</div>
		</div>
	</div>   
         
</body>
</html>