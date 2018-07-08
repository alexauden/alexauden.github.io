<?php include('adduser.php');


if (isset($_SESSION['username'])) {

$db = mysqli_connect('localhost', 'root', '', 'registration');

$username = $_SESSION['username'];

$query = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
$today = date("Y-m-d");  
$today = strtotime($today);    
$results = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($results);
$studentid = $row['id'];
$firstname = $row['firstname'];
$lastname = $row['lastname'];
$gender = $row['gender'];
$dob = $row['dob'];
$birth = strtotime($dob);    
$age = ($today - $birth)/31557600;    
$firstname2 = $row['firstname2'];
$lastname2 = $row['lastname2'];
$gender2 = $row['gender2'];
$dob2 = $row['dob2'];
$birth2 = strtotime($dob2);
$age2 = ($today - $birth2)/31557600;     
$firstname3 = $row['firstname3'];
$lastname3 = $row['lastname3'];
$gender3 = $row['gender3'];
$dob3 = $row['dob3'];
$birth3 = strtotime($dob3);
$age3 = ($today - $birth3)/31557600;  
$phone = $row['phone'];
$address = $row['address'];
$city = $row['city'];
$state = $row['state'];
$zip = $row['zip'];    
$mother = $row['mother'];
$motherphone = $row['motherphone'];
$father = $row['father'];
$fatherphone = $row['fatherphone'];
$emcontact = $row['emcontact'];
$emphone = $row['emphone'];
    
    

    
$vtotal = "SELECT * from violinlessons where studentid = '$studentid'";
$vtotal = mysqli_query($db, $vtotal);
$vtotal = mysqli_num_rows($vtotal);
$vtotal = $vtotal*365.99;
    
$ptotal = "SELECT * from pianolessons where studentid = '$studentid'";
$ptotal = mysqli_query($db, $ptotal);
$ptotal = mysqli_num_rows($ptotal);
$ptotal = $ptotal*365.99;    
    
    $ctotal = "SELECT * from cellolessons where studentid = '$studentid'";
$ctotal = mysqli_query($db, $ctotal);
$ctotal = mysqli_num_rows($ctotal);
$ctotal = $ctotal*365.99;  
    
    $gvtotal = "SELECT * from groupviolin where studentid = '$studentid'";
$gvtotal = mysqli_query($db, $gvtotal);
$gvtotal = mysqli_num_rows($gvtotal);
$gvtotal = $gvtotal*365.99;    
    

}



  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
if(isset($session['username']))
    
    


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

        <div class="edit">
            <form action="index.php?logout='1'">
            <button type="submit" class="btn">logout</button>
            </form>
    </div>
    <div class="loginheader">
	<h1>Home Page</h1>
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    <?php endif ?>
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
    
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['canceled'])) : ?>
      <div class="canceled" >
      	<h3>
          <?php 
          	echo $_SESSION['canceled']; 
          	unset($_SESSION['canceled']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>
    </div>
    
 
<div class="tabs">
    <button class="tablink" onclick="openCity('firstname', this, 'grey')" id="defaultOpen">firstname</button>
        
    <?php 
        if (!empty($row['firstname2'])) {; ?>
    <button class="tablink" onclick="openCity('firstname2', this, 'grey')">thename</button>
        
    <?php  } 
        if (!empty($row['firstname3'])) {; ?>
    <button class="tablink" onclick="openCity('firstname3', this, 'grey')">thisname</button>
        <?php  } ?>
    <button class="tablink" onclick="openCity('adduser', this, 'grey')" id="defaultOpen">Add student</button>

    </div>
    
        
<div id="firstname" class="tabcontent">
     <div class="edit">
            <button type="button" class="btn" data-toggle="modal" data-target="#editstudent">Edit</button>
    </div>
    <p><strong>Name: </strong><?php echo $firstname . " " . $lastname;?><br><strong>Gender: </strong><?php echo $gender;?><br><strong>Age: </strong><?php echo floor($age);?></p>
  <h3><?php echo $firstname;?> is enrolled in the following classes:</h3>
    <?php $piano_check_query = "SELECT * FROM pianolessons WHERE firstname='$firstname' AND lastname='$lastname' LIMIT 1";
  $result = mysqli_query($db, $piano_check_query);
  $pianolessons = mysqli_fetch_assoc($result);
    
    $violin_check_query = "SELECT * FROM violinlessons WHERE firstname='$firstname' AND lastname='$lastname' LIMIT 1";
  $result = mysqli_query($db, $violin_check_query);
  $violinlessons = mysqli_fetch_assoc($result);
    
    $cello_check_query = "SELECT * FROM cellolessons WHERE firstname='$firstname' AND lastname='$lastname' LIMIT 1";
  $result = mysqli_query($db, $cello_check_query);
  $cellolessons = mysqli_fetch_assoc($result);
    
        $pianoclass_check_query = "SELECT * FROM pianoclass WHERE firstname='$firstname' AND lastname='$lastname' LIMIT 1";
  $result = mysqli_query($db, $pianoclass_check_query);
  $pianoclass = mysqli_fetch_assoc($result);
    
       $groupviolin_check_query = "SELECT * FROM groupviolin WHERE firstname='$firstname' AND lastname='$lastname' LIMIT 1";
  $result = mysqli_query($db, $groupviolin_check_query);
  $groupviolin = mysqli_fetch_assoc($result);
    
    
    
  if ($pianolessons) { ?> 
    <p>Piano lessons</p>
    <?php } 
    if ($violinlessons) { ?>
    <p>Violin Lessons</p>
    <?php }
    if ($cellolessons) { ?>
    <p>Cello Lessons</p>
    <?php }
    if ($pianoclass) { ?>
    <p>Piano Masterclass</p>
    <?php }
    if ($groupviolin) { ?>
    <p>Group Violin</p>
    <?php }
    

    if ((empty($pianolessons)) AND (empty($violinlessons)) AND empty($cellolessons) AND empty($pianoclass) AND empty($groupviolin)) { ?>
    
   <p><?php echo $row['firstname'] . " " . $row['lastname']; ?> is not enrolled in classes</p> 
        <?php }?>

    <form action="selectclasses.php">
        <div class="button" align="center">
            <button type="submit" class="btn btn-primary btn-xl" href="selectclasses.php">Add/drop classes</button> 
        </div>
    </form>
</div>
    

        
<div id="firstname2" class="tabcontent">
    <div class="edit">
            <button type="button" class="btn" data-toggle="modal" data-target="#editstudent2">Edit</button>
    </div>
    <p><strong>Name: </strong><?php echo $firstname2 . " " . $lastname2;?><br><strong>Gender: </strong><?php echo $gender2;?><br><strong>Age: </strong><?php echo floor($age2);?></p>
  <h3><?php echo $firstname2;?> is enrolled in the following classes:</h3>
    <?php $piano_check_query2 = "SELECT * FROM pianolessons WHERE firstname='$firstname2' AND lastname='$lastname2' LIMIT 1";
  $result2 = mysqli_query($db, $piano_check_query2);
  $pianolessons2 = mysqli_fetch_assoc($result2);
    
    $violin_check_query2 = "SELECT * FROM violinlessons WHERE firstname='$firstname2' AND lastname='$lastname2' LIMIT 1";
  $result2 = mysqli_query($db, $violin_check_query2);
  $violinlessons2 = mysqli_fetch_assoc($result2);

    $cello_check_query2 = "SELECT * FROM cellolessons WHERE firstname='$firstname2' AND lastname='$lastname2' LIMIT 1";
  $result2 = mysqli_query($db, $cello_check_query2);
  $cellolessons2 = mysqli_fetch_assoc($result2);
    
        $pianoclass_check_query2 = "SELECT * FROM pianoclass WHERE firstname='$firstname2' AND lastname='$lastname2' LIMIT 1";
  $result2 = mysqli_query($db, $pianoclass_check_query2);
  $pianoclass2 = mysqli_fetch_assoc($result2);
    
       $groupviolin_check_query2 = "SELECT * FROM groupviolin WHERE firstname='$firstname2' AND lastname='$lastname2' LIMIT 1";
  $result2 = mysqli_query($db, $groupviolin_check_query2);
  $groupviolin2 = mysqli_fetch_assoc($result2);
    
    
    
  if ($pianolessons2) { ?> 
    <p>Piano lessons</p>
    <?php } 
    if ($violinlessons2) { ?>
    <p>Violin Lessons</p>
    <?php }
    if ($cellolessons2) { ?>
    <p>Cello Lessons</p>
    <?php }
    if ($pianoclass2) { ?>
    <p>Piano Masterclass</p>
    <?php }
    if ($groupviolin2) { ?>
    <p>Group Violin</p>
    <?php }

    if ((empty($pianolessons2)) AND (empty($violinlessons2)) AND empty($cellolessons2) AND empty($pianoclass2) AND empty($groupviolin2)) { ?>
    
   <p><?php echo $row['firstname2'] . " " . $row['lastname2']; ?> is not enrolled in classes</p> 
        <?php }?>
    <form action="selectclasses.php">
        <div class="button" align="center">
            <button type="submit" class="btn btn-primary btn-xl" href="selectclasses.php">Add/drop classes</button> 
        </div>
    </form>
</div>    

<div id="firstname3" class="tabcontent">
    <div class="edit">
            <button type="button" class="btn" data-toggle="modal" data-target="#editstudent3">Edit</button>
    </div>
    <p><strong>Name: </strong><?php echo $firstname3 . " " . $lastname3;?><br><strong>Gender: </strong><?php echo $gender3;?><br><strong>Age: </strong><?php echo floor($age3);?></p>
  <h3><?php echo $firstname3;?> is enrolled in the following classes:</h3>
    <?php $piano_check_query3 = "SELECT * FROM pianolessons WHERE firstname='$firstname3' AND lastname='$lastname3' LIMIT 1";
  $result3 = mysqli_query($db, $piano_check_query3);
  $pianolessons3 = mysqli_fetch_assoc($result3);
    
    $violin_check_query3 = "SELECT * FROM violinlessons WHERE firstname='$firstname3' AND lastname='$lastname3' LIMIT 1";
  $result3 = mysqli_query($db, $violin_check_query3);
  $violinlessons3 = mysqli_fetch_assoc($result3);
    
     $cello_check_query3 = "SELECT * FROM cellolessons WHERE firstname='$firstname3' AND lastname='$lastname3' LIMIT 1";
  $result3 = mysqli_query($db, $cello_check_query3);
  $cellolessons3 = mysqli_fetch_assoc($result3);
    
        $pianoclass_check_query3 = "SELECT * FROM pianoclass WHERE firstname='$firstname3' AND lastname='$lastname3' LIMIT 1";
  $result3 = mysqli_query($db, $pianoclass_check_query3);
  $pianoclass3 = mysqli_fetch_assoc($result3);
    
       $groupviolin_check_query3 = "SELECT * FROM groupviolin WHERE firstname='$firstname3' AND lastname='$lastname3' LIMIT 1";
  $result3 = mysqli_query($db, $groupviolin_check_query3);
  $groupviolin3 = mysqli_fetch_assoc($result3);
    
    
  if ($pianolessons3) { ?> 
    <p>Piano lessons</p>
    <?php } 
    if ($violinlessons3) { ?>
    <p>Violin Lessons</p>
    <?php }
     if ($cellolessons3) { ?>
    <p>Cello Lessons</p>
    <?php }
    if ($pianoclass3) { ?>
    <p>Piano Masterclass</p>
    <?php }
    if ($groupviolin3) { ?>
    <p>Group Violin</p>
    <?php }
    

    if ((empty($pianolessons3)) AND (empty($violinlessons3)) AND empty($cellolessons3) AND empty($pianoclass3) AND empty($groupviolin3)) { ?>
    
   <p><?php echo $row['firstname3'] . " " . $row['lastname3']; ?> is not enrolled in classes</p> 
        <?php }?>
    <form action="selectclasses.php">
        <div class="button" align="center">
            <button type="submit" class="btn btn-primary btn-xl" href="selectclasses.php">Add/drop classes</button> 
        </div>
    </form>
</div>    
    
<div id="adduser" class="tabcontent">
  <form method="post" action="adduser.php">
        <p>
          <label>Student's First Name:</label>
  	  <input type="text" name="firstname">
  	  <label>Student's Last Name:</label>
  	  <input type="text" name="lastname">
        </p>
  	  <div class="radio">
            <label>Student's Gender:</label><br>
  	  <input type="radio" name="gender" value="M" checked>Male<br>
      <input type="radio" name="gender" value="F">Female
        </div>
        <p>
  	  <label>Student's Date of Birth:</label>
  	  <input type="date" name="dob">
        </p>
    <div class="button">
  	  <button type="submit" class="btn" name="adduser">Add Student</button>
  	</div>
    </form>
</div>
    
<div class="modal fade" id="editstudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Returning Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="editinfo">
          <form method="post" action="enroll.php">
     <div class="input-group-modal">
        <p>
          <label>Student's First Name:</label>
  	  <input type="text" name="firstname" value="<?php echo $firstname; ?>">
  	  <label>Student's Last Name:</label>
  	  <input type="text" name="lastname" value="<?php echo $lastname; ?>">
        </p>
  	  <div class="radio">
            <label>Student's Gender:</label><br>
  	  <input type="radio" name="gender" value="M" checked>Male<br>
      <input type="radio" name="gender" value="F">Female
        </div>
        <p>
  	  <label>Student's Date of Birth:</label>
  	  <input type="date" name="dob" value="<?php echo $dob; ?>">
        </p>
  	</div>
              <div class="button">
  	  <button type="submit" class="btn" name="updatestudent">Update</button>
  	</div>
          </form>
          </div>
          </div>
    </div>
    </div>

<div class="modal fade" id="editstudent2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="editinfo">
          <form method="post" action="enroll.php">
     <div class="input-group-modal">
        <p>
          <label>Student's First Name:</label>
  	  <input type="text" name="firstname2" value="<?php echo $firstname2; ?>">
  	  <label>Student's Last Name:</label>
  	  <input type="text" name="lastname2" value="<?php echo $lastname2; ?>">
        </p>
  	  <div class="radio">
            <label>Student's Gender:</label><br>
  	  <input type="radio" name="gender2" value="M" checked>Male<br>
      <input type="radio" name="gender2" value="F">Female
        </div>
        <p>
  	  <label>Student's Date of Birth:</label>
  	  <input type="date" name="dob2" value="<?php echo $dob2; ?>">
        </p>
  	</div>
              <div class="button">
  	  <button type="submit" class="btn" name="updatestudent2">Update</button>
  	</div>
          </form>
          </div>
          </div>
    </div>
    </div>

    
<div class="modal fade" id="editstudent3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Returning Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="editinfo">
          <form method="post" action="enroll.php">
     <div class="input-group-modal">
        <p>
          <label>Student's First Name:</label>
  	  <input type="text" name="firstname3" value="<?php echo $firstname3; ?>">
  	  <label>Student's Last Name:</label>
  	  <input type="text" name="lastname3" value="<?php echo $lastname3; ?>">
        </p>
  	  <div class="radio">
            <label>Student's Gender:</label><br>
  	  <input type="radio" name="gender3" value="M" checked>Male<br>
      <input type="radio" name="gender3" value="F">Female
        </div>
        <p>
  	  <label>Student's Date of Birth:</label>
  	  <input type="date" name="dob3" value="<?php echo $dob3; ?>">
        </p>
  	</div>
              <div class="button">
  	  <button type="submit" class="btn" name="updatestudent3">Update</button>
  	</div>
          </form>
          </div>
          </div>
    </div>
    </div>

    
    <!-- logged in user information -->
<div class="enrollcontent">    
        <div class="edit">
            <button type="button" class="btn" data-toggle="modal" data-target="#editunitinfo">Edit</button>
    </div>
    <?php  if (isset($_SESSION['username'])) : ?>
    <p><strong>Primary phone:</strong><br> <?php echo $phone; ?></p>
    <p><strong>Unit email:</strong><br> <?php echo $row['email']; ?></p>
    <p><strong>Address:</strong><br>
    <?php echo $row['address']?>,<br>
    <?php echo $row['city'] . ", " . $row['state'] . ", " . $row['zip'];?></p>
    <?php endif ?>
    <p><strong>Mother:</strong><br> <?php echo $row['mother']?><br> 
    <?php echo $row['motherphone']; ?></p>
    <p><strong>Father:</strong><br> <?php echo $row['father']?><br> 
    <?php echo $row['fatherphone']; ?></p>
    <p><strong>Emergency Contact:</strong><br> <?php echo $emcontact?><br> 
    <?php echo $emphone; ?></p>


<div class="modal fade" id="editunitinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
          <div class="register">
          <form method="post" action="adduser.php">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
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
  	  <Label>Mother's Name:</Label>
        <input type="text" name="mother" value=<?php echo $mother ?>>
         <Label>Mother's Phone:</Label>
        <input type="text" name="motherphone" value=<?php echo $motherphone ?>>
         <Label>Father's Name:</Label>
        <input type="text" name="father" value=<?php echo $father ?>>
         <Label>Father's Phone:</Label>
        <input type="text" name="fatherphone" value=<?php echo $fatherphone ?>>
        <Label>Emergency Contact Name:</Label>
        <input type="text" name="emcontact" value=<?php echo $emcontact ?>>
         <Label>Phone:</Label>
        <input type="text" name="emphone" value=<?php echo $emphone ?>>
    </div>
              <div class="button">
  	  <button type="submit" class="btn" name="updateinfo">Update</button>
  	</div>
          </form>
          </div>
          </div>
    </div>
    </div>


    

    </div>
    
    <div class="enrollcontent">
        <h3>Payment information</h3>
        <p><strong>You owe: </strong>$<?php echo $vtotal+$ptotal +$ctotal+$gvtotal?></p>
        <p>Click below to view statement and pay online</p>
        <form action="payment.php">
        <div class="button" align="center">
            <button type="submit" class="btn btn-primary btn-xl">Pay Now</button> 
        </div>
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
    <script src="tabs.js"></script>

		
</body>
</html>
