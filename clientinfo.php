<?php include('enterinfo.php'); 

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 300)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

if (!isset($_SESSION['email'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['email']);
  	header("location: login.php");
  }

if(isset($session['email'])) 

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Music lessons in the Fox Valley area!</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/creative.css" rel="stylesheet">

</head>
<body>
  
    <div>
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Appleton Conservatory</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Fall 2018 Program Guide</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Upcoming Events</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    </div>
    
  
  <div class="container">
        <div class="loginheader">
  	<h2>Register</h2>
  </div>
      
      <div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>
    </div>

      <div class="register">
    <form method="post" action="clientinfo.php">
  	<?php include('errors.php'); ?>
      <div class="header">
      <h3>Student Information</h3>
      </div>
  	<div class="input-group">
        <p>
          <label>Student's First Name:</label>
  	  <input type="text" name="firstname" value="<?php echo $firstname; ?>">
  	  <label>Student's Last Name:</label>
  	  <input type="text" name="lastname" value="<?php echo $lastname; ?>">
        </p>
  	  <div class="radio">
            <label>Student's Gender:</label><br>
  	  <input type="radio" name="gender" value="M">Male<br>
      <input type="radio" name="gender" value="F">Female
        </div>
        <p>
  	  <label>Student's Date of Birth:</label>
  	  <input type="date" name="dob" value="<?php echo $dob; ?>">
        </p>
  	</div>
      <div class="header">
      <h3>Additional Students (optional)</h3>
          <p>Families with multiple students enrolled will receive a 10% discount on the second student and a 15% discount on the third student. This includes parents enrolled in our adult classes.</p>
      </div>
  	<div class="input-group">
        <p>
          <label>Student's First Name:</label>
  	  <input type="text" name="firstname2" value="<?php echo $firstname; ?>">
  	  <label>Student's Last Name:</label>
  	  <input type="text" name="lastname2" value="<?php echo $lastname; ?>">
        </p>
  	  <div class="radio">
            <label>Student's Gender:</label><br>
  	  <input type="radio" name="gender2" value="M">Male<br>
      <input type="radio" name="gender2" value="F">Female
        </div>
        <p>
  	  <label>Student's Date of Birth:</label>
  	  <input type="date" name="dob2" value="<?php echo $dob; ?>">
        </p>
  	</div>
<div class="input-group">
        <p>
          <label>Student's First Name:</label>
  	  <input type="text" name="firstname3" value="<?php echo $firstname; ?>">
  	  <label>Student's Last Name:</label>
  	  <input type="text" name="lastname3" value="<?php echo $lastname; ?>">
        </p>
  	  <div class="radio">
            <label>Student's Gender:</label><br>
  	  <input type="radio" name="gender3" value="M">Male<br>
      <input type="radio" name="gender3" value="F">Female
        </div>
        <p>
  	  <label>Student's Date of Birth:</label>
  	  <input type="date" name="dob3" value="<?php echo $dob; ?>">
        </p>
  	</div>
        <div class="header">
      <h3>Address Information</h3>
      </div>
  	<div class="input-group">
        <label>Phone Number:</label>
  	  <input type="text" name="phone" value="<?php echo $phone; ?>">
  	  <label>Address:</label>
  	  <input type="text" name="address" value="<?php echo $address; ?>">
  	  <label>City:</label>
  	  <input type="text" name="city" value="<?php echo $city; ?>">
  	  <label>State:</label>
        <div class="dropdown">
  	  <select name="state" value="<?php echo $state; ?>">
	<option value="WI">Wisconsin</option>
    <option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District Of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WY">Wyoming</option>
        </select>
        </div>
        <p>
  	  <Label>5-Digit Zip Code:</Label>
        <input type="text" pattern="[0-9]{5}" name="zip" value="<?php echo $zip; ?>">
        </p>
  	</div>
    <div class="header">
      <h3>Parent Information</h3>
        <p>(Leave this section blank if student is over 18)</p>
      </div>
    <div class="input-group">
  	  <Label>Name of Mother (or Legal Guardian 1):</Label>
        <input type="text" name="mother" >
         <Label>Mother's Phone:</Label>
        <input type="text" name="motherphone" >
         <Label>Name of Father (or Legal Guardian 2):</Label>
        <input type="text" name="father" >
         <Label>Father's Phone:</Label>
        <input type="text" name="fatherphone" >
        <Label>Emergency Contact Name:</Label>
        <input type="text" name="emcontact" >
         <Label>Emergency Contact Phone:</Label>
        <input type="text" name="emphone" >
  	</div>
  	<div class="button">
  	  <button type="submit" class="btn" name="enterinfo">Continue</button>
  	</div>
          <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>

  </form>
    </div>
    </div>
    
    
     <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>
</body>
</html>