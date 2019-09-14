<?php
include($_SERVER['DOCUMENT_ROOT'].'/db_connection.php');

$mysqli = OpenCon();
//echo "Connected Successfully";
if(isset($_POST['submit'])){
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];

	$dob=$_POST["dob"];
	$today=date("Y-m-d");
	$diff = date_diff(date_create($dob), date_create($today));
	$age=$diff->format('%y');

	$gender=$_POST['gender'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$residence=$_POST['residence'];
	$association=$_POST['association'];
	$food_opted=$_POST['food_opted'];
	$room_opted=$_POST['room_opted'];


	echo ($fname.$lname.$dob.$age.$gender.$phone.$email.$residence.$association.$food_opted.$room_opted);
		 
	$sql = "INSERT INTO user (`First Name`, `Last Name`, `DOB`, `Age`, `Gender`, `Phone Number`, `Email`, `Current residence`, `Association with IMPACT network`, `Food`, `Accommodation`) VALUES ('".$fname."', '".$lname."', '".$dob."', '".$age."', '".$gender."', '".$phone."', '".$email."', '".$residence."', '".$association."', '".$food_opted."', '".$room_opted."')";


	$result=$mysqli->query($sql);

	if ($result === TRUE) {
		echo "New record created successfully";

		/* close result set */
		$result->close();
	}
	else {printf("Query failed: %s\n", $mysqli->error);}

}
CloseCon($mysqli);
?>

<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
	
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!--<link href="bootstrap.min.css" rel="stylesheet" type="text/css">-->
	
	 <!-- Custom styles for this page -->
	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="intlTelInput.css">
	
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
	<!-- Optional JavaScript -->
	<script type="text/javascript" src="countries.js"></script>
	
	
	
	<title>IMPACT</title>
	
	 <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
</head>

<body class="bg-dark">
	<div class="container bg-light">
		
		<!-- Page Heading -->
		<div class="row ">
			<div class="col my-3">
				<h1 style="text-align:center;">IMPACT 2k20</h1>
			</div>
		</div>
		
		<!-- Instructions -->
		<div class="row card bg-secondary text-white">
			<div class="col card-body">
				<div class="row">
					<div class="col">
						<h4 style="text-align:center;">PLEASE READ ALL THE INSTRUCTIONS BEFORE PROCEEDING</h4>
					</div>
					
				</div>
				<p>Some important information:</p>
				<ol>
					<li>Early bird registrations open from February 17th to March 31st (Rs.300/-)</li>
					<li>Normal registrations open from April 1st to May 3rd (Rs.400/-)</li>
					<li>Spot registrations will be available, at the venue, from May 13th to May 17th (Rs.500/-)</li>
					<li>Registration will be complete ONLY after you make your full payment.</li>
					<li>Children should be registered separately.</li>
					<li>Registration is free for children under 5 years of age.</li>
					<li>Food is free for children under 10 years of age.</li>
					<li>Family or group registrations are not possible using this form. Kindly register each individual separately.</li>
					<li>Accommodation rates are per head and not per room/dormitory.</li>
					<li>Accommodation is <b>not free</b> for children.</li>
					<li>Accommodation is arranged at 2 different campuses. Transportation is arranged from those campuses to the World Impact Center, at the following times:<br/>
						<ul>
							<li>LES/MGRC to World Impact Center - 07:30am</li>
							<li>World Impact Center to LES/MGRC - 02:30pm</li>
							<li>LES/MGRC to World Impact Center - 04:00pm</li>
							<li>World Impact Center to LES/MGRC - 10:00pm</li>
						</ul>
					</li>
					<li>Food during non-conference days, must be taken care of by the delegates themselves.During conference days (May 13 - 17), food will be available at World Impact Center.</li>
					<li>For any assistance in filling the form, please call or Whatsapp us on +917736544417.</li>
				</ol>
			</div>
		</div>
		<br>
		<!-- Form -->
		<div class="row bg-light">
			<div class="col">
				<form method="POST" action="" novalidate>
				
				<!--User name-->
				<div class="form-group mb-3">
					<label for="name">Name:</label>
					<div class="form-row" id="name">
						<div class="col-md-6">
							<input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" required/>
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" required/>
						</div>
					</div>
				</div>
				
				<!-- Email & Phone -->
				<div class="form-row mb-3">
					<!--Email-->
					<div class="form-group col-md-6">
						<label for="email">Email:</label> 
						<input type="email" class="form-control" id="email" name="email" placeholder="johndoe@xyz.com" required/>
					</div>

					<!--Phone-->
					<div class="form-group col-md-6">
						<label for="phone">Phone:</label>
						<div class="form-row">
							<input type="tel" class="form-control" id="phone" name="phone" pattern="[0-9]{10}" placeholder="Eg: 8281479437" required/>
						</div>
						
					</div>
					<script src="https://code.jquery.com/jquery-latest.min.js"></script>
					<script src="intlTelInput.js"></script>
					<script>
						$("#phone").intlTelInput();
					</script>
				</div>
					
					<div class="flag-dropdown f16"><div class="selected-flag"><div class="flag in"><div class="down-arrow"></div></div></div><ul class="country-list hide"><li class="country preferred" data-dial-code="1" data-country-code="us"><div class="flag us"></div><span class="country-name">United States</span><span class="dial-code">+1</span></li><li class="country preferred" data-dial-code="44" data-country-code="gb"><div class="flag gb"></div><span class="country-name">United Kingdom</span><span class="dial-code">+44</span></li><li class="divider"></li><li class="country" data-dial-code="93" data-country-code="af"><div class="flag af"></div><span class="country-name">Afghanistan</span><span class="dial-code">+93</span></li><li class="country" data-dial-code="355" data-country-code="al"><div class="flag al"></div><span class="country-name">Albania</span><span class="dial-code">+355</span></li><li class="country" data-dial-code="213" data-country-code="dz"><div class="flag dz"></div><span class="country-name">Algeria</span><span class="dial-code">+213</span></li><li class="country" data-dial-code="1684" data-country-code="as"><div class="flag as"></div><span class="country-name">American Samoa</span><span class="dial-code">+1684</span></li><li class="country" data-dial-code="376" data-country-code="ad"><div class="flag ad"></div><span class="country-name">Andorra</span><span class="dial-code">+376</span></li><li class="country" data-dial-code="244" data-country-code="ao"><div class="flag ao"></div><span class="country-name">Angola</span><span class="dial-code">+244</span></li><li class="country" data-dial-code="1264" data-country-code="ai"><div class="flag ai"></div><span class="country-name">Anguilla</span><span class="dial-code">+1264</span></li><li class="country" data-dial-code="1268" data-country-code="ag"><div class="flag ag"></div><span class="country-name">Antigua and Barbuda</span><span class="dial-code">+1268</span></li><li class="country" data-dial-code="54" data-country-code="ar"><div class="flag ar"></div><span class="country-name">Argentina</span><span class="dial-code">+54</span></li><li class="country" data-dial-code="374" data-country-code="am"><div class="flag am"></div><span class="country-name">Armenia</span><span class="dial-code">+374</span></li><li class="country" data-dial-code="297" data-country-code="aw"><div class="flag aw"></div><span class="country-name">Aruba</span><span class="dial-code">+297</span></li><li class="country" data-dial-code="61" data-country-code="au"><div class="flag au"></div><span class="country-name">Australia</span><span class="dial-code">+61</span></li><li class="country" data-dial-code="43" data-country-code="at"><div class="flag at"></div><span class="country-name">Austria</span><span class="dial-code">+43</span></li><li class="country" data-dial-code="994" data-country-code="az"><div class="flag az"></div><span class="country-name">Azerbaijan</span><span class="dial-code">+994</span></li><li class="country" data-dial-code="1242" data-country-code="bs"><div class="flag bs"></div><span class="country-name">Bahamas</span><span class="dial-code">+1242</span></li><li class="country" data-dial-code="973" data-country-code="bh"><div class="flag bh"></div><span class="country-name">Bahrain</span><span class="dial-code">+973</span></li><li class="country" data-dial-code="880" data-country-code="bd"><div class="flag bd"></div><span class="country-name">Bangladesh</span><span class="dial-code">+880</span></li><li class="country" data-dial-code="1246" data-country-code="bb"><div class="flag bb"></div><span class="country-name">Barbados</span><span class="dial-code">+1246</span></li><li class="country" data-dial-code="375" data-country-code="by"><div class="flag by"></div><span class="country-name">Belarus</span><span class="dial-code">+375</span></li><li class="country" data-dial-code="32" data-country-code="be"><div class="flag be"></div><span class="country-name">Belgium</span><span class="dial-code">+32</span></li><li class="country" data-dial-code="501" data-country-code="bz"><div class="flag bz"></div><span class="country-name">Belize</span><span class="dial-code">+501</span></li><li class="country" data-dial-code="229" data-country-code="bj"><div class="flag bj"></div><span class="country-name">Benin</span><span class="dial-code">+229</span></li><li class="country" data-dial-code="1441" data-country-code="bm"><div class="flag bm"></div><span class="country-name">Bermuda</span><span class="dial-code">+1441</span></li><li class="country" data-dial-code="975" data-country-code="bt"><div class="flag bt"></div><span class="country-name">Bhutan</span><span class="dial-code">+975</span></li><li class="country" data-dial-code="591" data-country-code="bo"><div class="flag bo"></div><span class="country-name">Bolivia</span><span class="dial-code">+591</span></li><li class="country" data-dial-code="387" data-country-code="ba"><div class="flag ba"></div><span class="country-name">Bosnia and Herzegovina</span><span class="dial-code">+387</span></li><li class="country" data-dial-code="267" data-country-code="bw"><div class="flag bw"></div><span class="country-name">Botswana</span><span class="dial-code">+267</span></li><li class="country" data-dial-code="55" data-country-code="br"><div class="flag br"></div><span class="country-name">Brazil</span><span class="dial-code">+55</span></li><li class="country" data-dial-code="673" data-country-code="bn"><div class="flag bn"></div><span class="country-name">Brunei Darussalam</span><span class="dial-code">+673</span></li><li class="country" data-dial-code="359" data-country-code="bg"><div class="flag bg"></div><span class="country-name">Bulgaria</span><span class="dial-code">+359</span></li><li class="country" data-dial-code="226" data-country-code="bf"><div class="flag bf"></div><span class="country-name">Burkina Faso</span><span class="dial-code">+226</span></li><li class="country" data-dial-code="257" data-country-code="bi"><div class="flag bi"></div><span class="country-name">Burundi</span><span class="dial-code">+257</span></li><li class="country" data-dial-code="855" data-country-code="kh"><div class="flag kh"></div><span class="country-name">Cambodia</span><span class="dial-code">+855</span></li><li class="country" data-dial-code="237" data-country-code="cm"><div class="flag cm"></div><span class="country-name">Cameroon</span><span class="dial-code">+237</span></li><li class="country" data-dial-code="1" data-country-code="ca"><div class="flag ca"></div><span class="country-name">Canada</span><span class="dial-code">+1</span></li><li class="country" data-dial-code="238" data-country-code="cv"><div class="flag cv"></div><span class="country-name">Cape Verde</span><span class="dial-code">+238</span></li><li class="country" data-dial-code="1345" data-country-code="ky"><div class="flag ky"></div><span class="country-name">Cayman Islands</span><span class="dial-code">+1345</span></li><li class="country" data-dial-code="236" data-country-code="cf"><div class="flag cf"></div><span class="country-name">Central African Republic</span><span class="dial-code">+236</span></li><li class="country" data-dial-code="235" data-country-code="td"><div class="flag td"></div><span class="country-name">Chad</span><span class="dial-code">+235</span></li><li class="country" data-dial-code="56" data-country-code="cl"><div class="flag cl"></div><span class="country-name">Chile</span><span class="dial-code">+56</span></li><li class="country" data-dial-code="86" data-country-code="cn"><div class="flag cn"></div><span class="country-name">China</span><span class="dial-code">+86</span></li><li class="country" data-dial-code="57" data-country-code="co"><div class="flag co"></div><span class="country-name">Colombia</span><span class="dial-code">+57</span></li><li class="country" data-dial-code="269" data-country-code="km"><div class="flag km"></div><span class="country-name">Comoros</span><span class="dial-code">+269</span></li><li class="country" data-dial-code="243" data-country-code="cd"><div class="flag cd"></div><span class="country-name">Congo (DRC)</span><span class="dial-code">+243</span></li><li class="country" data-dial-code="242" data-country-code="cg"><div class="flag cg"></div><span class="country-name">Congo (Republic)</span><span class="dial-code">+242</span></li><li class="country" data-dial-code="682" data-country-code="ck"><div class="flag ck"></div><span class="country-name">Cook Islands</span><span class="dial-code">+682</span></li><li class="country" data-dial-code="506" data-country-code="cr"><div class="flag cr"></div><span class="country-name">Costa Rica</span><span class="dial-code">+506</span></li><li class="country" data-dial-code="225" data-country-code="ci"><div class="flag ci"></div><span class="country-name">Côte d'Ivoire</span><span class="dial-code">+225</span></li><li class="country" data-dial-code="385" data-country-code="hr"><div class="flag hr"></div><span class="country-name">Croatia</span><span class="dial-code">+385</span></li><li class="country" data-dial-code="53" data-country-code="cu"><div class="flag cu"></div><span class="country-name">Cuba</span><span class="dial-code">+53</span></li><li class="country" data-dial-code="357" data-country-code="cy"><div class="flag cy"></div><span class="country-name">Cyprus</span><span class="dial-code">+357</span></li><li class="country" data-dial-code="420" data-country-code="cz"><div class="flag cz"></div><span class="country-name">Czech Republic</span><span class="dial-code">+420</span></li><li class="country" data-dial-code="45" data-country-code="dk"><div class="flag dk"></div><span class="country-name">Denmark</span><span class="dial-code">+45</span></li><li class="country" data-dial-code="253" data-country-code="dj"><div class="flag dj"></div><span class="country-name">Djibouti</span><span class="dial-code">+253</span></li><li class="country" data-dial-code="1767" data-country-code="dm"
				
				<!-- Gender & DOB -->
				<div class="form-row mb-3">
					<!--Gender-->
					<div class="form-group col-md-6">
						<label for="gender">Gender:</label>
						<select class="form-control" id="gender" name="gender" required>
							<option selected>Select choice...</option>
							<option >Male</option>
							<option >Female</option>
						</select>
					</div>

					<!--DOB-->
					<div class="form-group col-md-6">
						<label for="dob">DOB:</label>
						<input type="date" class="form-control" id="dob" name="dob" required/>
					</div>
				</div>
				
				<!--Age-->
				<!-- DateTime.Today.Year - DateOfBirth.Year + (if DateTime.Today.Month < DateOfBirth.Month or (DateTime.Today.Month = DateOfBirth.Month and DateTime.Today.Day < DateOfBirth.Day) then -1 else 0) -->
				
				<!-- Residence (CHECK AGAIN) -->
				<div class="from-row mb-3">
					<div class="form-group">	
						<label class="col-md-auto">**Do you reside in Kerala?</label>
						<div class="form-check form-check-inline">
							<input type="radio" class="form-check-input" id="resideRadio1" name="residence" value="yes"/><label class="form-check-label" for="resideRadio1">Yes</label> 
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" class="form-check-input" id="resideRadio2" name="residence" value="no"/><label class="form-check-label" for="resideRadio2">No</label>
						</div>
					</div>
				</div>
				
				
				<!-- Address -->
				<div class="mb-3">
					<label class="col-auto" for="address">Address</label>
					<input type="text" class="form-control" id="address" placeholder="Street Address 1" required/>
				</div>
				<div class="mb-3">
					<label class="col-auto" for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
					<input type="text" class="form-control" id="address2" placeholder="Street Address 1" required/>
				</div>
				<div class="row">
					<div class="col-md-4 mb-">
						<label for="country">Country</label>
						<select class="form-control d-block w-100" id="country" placeholder="Country" required></select>
					</div>
					<div class="col-md-4 mb-3">
						<label for="state">State</label>
						<select class="form-control d-block w-100" id="state" placeholder="State/City" required></select>
					</div>
					<script language="javascript">populateCountries("country","state")</script>
					<div class="col-md-4 mb-3">
						<label for="zip">Zip</label>
						<input type="text" class="form-control" id="zip" placeholder="" required/>
					</div>
				</div>
				
				<!-- Association -->
				<div class="form-group">
					<label>How are you associated with the IMPACT network?</label><br/>  
					<select class="form-control" name="association" required>
						<option selected>Select choice...</option>
						<option>TROTB  Ministries</option>
						<option>World Impact (WI) churches</option>
						<option>Faith Family churches</option>
					</select>
				</div>
				
				<!-- Food Preference (CHECK AGAIN) -->
				<div class="form-row mb-3">
					<div class="form-group col-md-6">
						<label>Do you require food?</label>
						<div class="form-row">
							<div class="form-check form-check-inline">
								<input type="radio" class="form-check-input" id="foodOptRadio1" name="food_opted" value="yes"/><label class="form-check-label" for="foodOptRadio1">Yes</label>
							</div>
							<div class="form-check form-check-inline">
								<input type="radio" class="form-check-input" id="foodOptRadio2" name="food_opted" value="no"/><label class="form-check-label" for="foodOptRadio2">No</label>
							</div>
						</div>
					</div>
					
					<div class="form-group col-md-6">
						<label>Food preference?</label>
						<div class="form-row">
							<div class="form-check form-check-inline">
								<input type="radio" class="form-check-input" id="foodRadio1" name="food" value="nonveg"/><label class="form-check-label" for="foodRadio1">Non-Veg</label>
							</div>
							<div class="form-check form-check-inline">
								<input type="radio" class="form-check-input" id="foodRadio2" name="food" value="veg"/><label class="form-check-label" for="foodRadio2">Veg</label>
							</div>
						</div>
						
					</div>
				</div>
				
				<!-- Meals required (CHECK AGAIN - checkboxes) -->
				<div class="form-group ">
					<div class="form-row">
						<label for="foodTable">Select your required meals:</label> 
						<table class="table" id="foodTable">
							<thead class="thead-dark">
								<tr>
									<th scope="col">Meal</th>
									<th scope="col">Day 1</th>
									<th scope="col">Day 2</th>
									<th scope="col">Day 3</th>
									<th scope="col">Day 4</th>
									<th scope="col">Day 5</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th scope="row" style="text-align: left">Breakfast</th>
									<td><input type="checkbox" name="day1"/></td>
									<td><input type="checkbox" name="day2"/></td>
									<td><input type="checkbox" name="day3"/></td>
									<td><input type="checkbox" name="day4"/></td>
									<td><input type="checkbox" name="day5"/></td>
								</tr>
								<tr>
									<th scope="row" style="text-align: left">Morning Tea</th>
									<td><input type="checkbox" name="day1"/></td>
									<td><input type="checkbox" name="day2"/></td>
									<td><input type="checkbox" name="day3"/></td>
									<td><input type="checkbox" name="day4"/></td>
									<td><input type="checkbox" name="day5"/></td>
								</tr>
								<tr>
									<th scope="row" style="text-align: left">Lunch</th>
									<td><input type="checkbox" name="day1"/></td>
									<td><input type="checkbox" name="day2"/></td>
									<td><input type="checkbox" name="day3"/></td>
									<td><input type="checkbox" name="day4"/></td>
									<td><input type="checkbox" name="day5"/></td>
								</tr>
								<tr>
									<th scope="row" style="text-align: left">Evening Tea</th>
									<td><input type="checkbox" name="day1"/></td>
									<td><input type="checkbox" name="day2"/></td>
									<td><input type="checkbox" name="day3"/></td>
									<td><input type="checkbox" name="day4"/></td>
									<td><input type="checkbox" name="day5"/></td>
								</tr>
								<tr>
									<th scope="row" style="text-align: left">Dinner</th>
									<td><input type="checkbox" name="day1"/></td>
									<td><input type="checkbox" name="day2"/></td>
									<td><input type="checkbox" name="day3"/></td>
									<td><input type="checkbox" name="day4"/></td>
									<td><input type="checkbox" name="day5"/></td>
								</tr>
							</tbody>
						</table>
					</div>
					
					<div class="form-row justify-content-end">
						<div class="form-group form-check-inline">
							<label class="col" for="fprice">Food Price:</label>
							<div class="form-control col" id="fprice">0.00</div>
						</div>
					</div>
					
				</div>
				
				<!-- Accommodation required, Room Type & Room Preference (CHECK AGAIN) -->
				<div class="form-row mb-3">
					<!-- Accommodation required (CHECK AGAIN) -->
					<div class="form-group col-md-4">
						<label>Do you require accommodation?</label>
						<div class="form-row">	
							<div class="form-check form-check-inline">
								<input type="radio" class="form-check-input" id="roomRadio1" name="room_opted" value="yes"/><label for="roomRadio1">Yes</label>
							</div>
							<div class="form-check form-check-inline">
								<input type="radio" class="form-check-input" id="roomRadio2" name="room" value="no"/><label for="roomRadio2">No</label>
							</div>
						</div>
					</div>
					
					<!-- Room Type (CHECK AGAIN) -->
					<div class="form-group col-md-4">
						<label>Room preference?</label>
						<div class="form-row">	
							<div class="form-check form-check-inline">
								<input type="radio" class="form-check-input" id="roomPrefRadio1" name="roomPref" value="yes"/><label for="roomPrefRadio1">Dormitory</label> 
							</div>
							<div class="form-check form-check-inline">
								<input type="radio" class="form-check-input" id="roomPrefRadio2" name="roomPref" value="no"/><label for="roomPrefRadio2">Room</label>
							</div>
						</div>
					</div>
					 
					<!-- Room Preference (CHECK AGAIN) -->
					<div class="form-group col-md-4">
						<label>Room type?</label>
						<div class="form-row">
							<div class="form-check form-check-inline">
								<input type="radio" class="form-check-input" id="roomTypeRadio1" name="roomType" value="yes"/><label for="roomTypeRadio1">A/C room</label>
							</div> 
							<div class="form-check form-check-inline">
								<input type="radio" class="form-check-input" id="roomTypeRadio2" name="roomType" value="no"/><label for="roomTypeRadio2">Non-A/C room</label>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Days room required (CHECK AGAIN - checkboxes) -->
				<div class="form-group">
					<div class="form-row">
						<label for="roomTable">Select the days you would require the room:</label>
					</div>
					<table class="table" id="roomTable">
						<thead class="thead-dark">
							<tr>
								<th scope="col">Day 1</th>
								<th scope="col">Day 2</th>
								<th scope="col">Day 3</th>
								<th scope="col">Day 4</th>
								<th scope="col">Day 5</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><input type="checkbox" name="day1"/></td>
								<td><input type="checkbox" name="day2"/></td>
								<td><input type="checkbox" name="day3"/></td>
								<td><input type="checkbox" name="day4"/></td>
								<td><input type="checkbox" name="day5"/></td>
							</tr>
						</tbody>
					</table>
					<div class="form-row justify-content-end">
						<div class="form-group form-check-inline">
							<label class="col" for="rprice">Room Price:</label>
							<div class="form-control col" id="rprice">0.00</div>
						</div>
					</div>
					
				</div>
				
				<!-- Total Price (CHECK AGAIN - checkboxes) -->
				<div class="form-row justify-content-end">
					<div class="form-group form-check-inline">
						<label class="col" for="tprice"><strong>Total Price:</strong></label>
						<div class="form-control col" id="tprice">0.00</div>
					</div>
				</div>
				
				<!-- Declaration -->
				<div class="form-row card bg-secondary text-white">
					<div class="col card-body">
						<div class="form-row justify-content-center">
							<h4>Personal Declaration</h4>
						</div>
						<p>I hereby declare that all the information I have submitted in this application form is true and accurate to the best of my knowledge. I agree to commit myself to fully abide with the guidelines of IMPACT 2K19.</p>
						
						<div class="form-row">
							<div class="col">
								<label for="signature">Signature</label>
								<input type="text" class="form-control" id="signature"/>
							</div>
							
							<div class="col">
								<label for="date">Date</label>
								<input type="date" class="form-control" id="date" value="<? echo date() ?>"/>
							</div>
						</div>
					</div>
				</div>
					
				<div class="form-row my-3 justify-content-center">
					<button type="submit" name="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
			</div>
		</div>
		
	</div>
</body>
</html>