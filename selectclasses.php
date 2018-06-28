<?php include('confirmregfunction.php');
include('cancelenroll.php');


if (isset($_SESSION['username'])) {

$db = mysqli_connect('localhost', 'root', '', 'registration');

$username = $_SESSION['username'];

$query = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
$results = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($results);
$firstname = $row['firstname'];
$lastname = $row['lastname'];
$firstname2 = $row['firstname2'];
$lastname2 = $row['lastname2'];
$firstname3 = $row['firstname3'];
$lastname3 = $row['lastname3'];
}

?>

<!DOCTYPE html>
<html lang="en">

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
        
        <!-- Navigation -->
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

    
<div class="container">
    <div class="edit">
        <form action="enroll.php">
        <div class="button">
            <button type="submit" class="btn btn-primary btn-xl" href="selectclasses.php">Finish Enrolling</button> 
        </div>
    </form>
    </div>
    <div class="loginheader">
        <h1>Classes available for fall 2018:</h1>
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
    
    <div class="enrollbuttons">
            <div class="edit">
                <p>$365.99</p>
            </div>
            <h3>Conservatory Program: Piano Lessons</h3>
            <p><strong>Day/time: </strong>TBD</p>
  	    <form method="post" action="confirmregfunction.php">
            <?php $pianoenroll_query = "SELECT * FROM pianolessons WHERE firstname='$firstname' AND lastname='$lastname' LIMIT 1";
            $result = mysqli_query($db, $pianoenroll_query);
            $enrolled = mysqli_fetch_assoc($result);
                if (!$enrolled) {;?>
            <button type="submit" class="btn-e" name="select_pianolessons">Enroll <?php echo $firstname ?></button>
            <?php   } else {; ?>
                <button type="submit" class="btn-ce" name="cancelpiano">Withdraw <?php echo $firstname;?></button>
            <?php }
                if (!empty($firstname2)) {
            $pianoenroll_query2 = "SELECT * FROM pianolessons WHERE firstname='$firstname2' AND lastname='$lastname2' LIMIT 1";
            $result = mysqli_query($db, $pianoenroll_query2);
            $enrolled = mysqli_fetch_assoc($result);
            if (!$enrolled) {;?>
            <button type="submit" class="btn-e" name="select_pianolessons2">Enroll <?php echo $firstname2 ?></button>
            <?php   } else {; ?>
                <button type="submit" class="btn-ce" name="cancelpiano2">Withdraw<br><?php echo $firstname2;?></button>
            <?php }
            }
               if (!empty($firstname3)) {
            $pianoenroll_query3 = "SELECT * FROM pianolessons WHERE firstname='$firstname3' AND lastname='$lastname3' LIMIT 1";
            $result = mysqli_query($db, $pianoenroll_query3);
            $enrolled = mysqli_fetch_assoc($result);
            if (!$enrolled) {;?>
            <button type="submit" class="btn-e" name="select_pianolessons3">Enroll <?php echo $firstname3 ?></button>
            <?php   } else {; ?>
                <button type="submit" class="btn-ce" name="cancelpiano3">Withdraw<br><?php echo $firstname3;?></button>
            <?php }
            }
            ?>  
            <p>The conservatory program is for students interested in the serious study of their instrument. Students who choose this class must also enroll in Piano Masterclass (Wed. 4:30), which is included at no extra cost and must be attended every week.</p>
        </form>
    </div> 
        
    
    
    
    <div class="enrollbuttons">
        <div class="edit">
                <p>$365.99</p>
            </div>
    <h3>Conservatory Program: Violin Lessons</h3>
            <p><strong>Day/time: </strong>TBD</p>
  	    <form method="post" action="confirmregfunction.php">
            <?php $violinenroll_query = "SELECT * FROM violinlessons WHERE firstname='$firstname' AND lastname='$lastname' LIMIT 1";
            $result = mysqli_query($db, $violinenroll_query);
            $enrolled = mysqli_fetch_assoc($result);
                if (!$enrolled) {;?>
            <button type="submit" class="btn-e" name="select_violinlessons">Enroll <?php echo $firstname ?></button>
            <?php   } else {; ?>
                <button type="submit" class="btn-ce" name="cancelviolin">Withdraw<br><?php echo $firstname;?></button>
            <?php } 
                if (!empty($firstname2)) {
            $violinenroll_query2 = "SELECT * FROM violinlessons WHERE firstname='$firstname2' AND lastname='$lastname2' LIMIT 1";
            $result = mysqli_query($db, $violinenroll_query2);
            $enrolled = mysqli_fetch_assoc($result);
            if (!$enrolled) {;?>
            <button type="submit" class="btn-e" name="select_violinlessons2">Enroll <?php echo $firstname2 ?></button>
            <?php   } else {; ?>
                <button type="submit" class="btn-ce" name="cancelviolin2">Withdraw<br><?php echo $firstname2;?></button>
            <?php }
            }
                if (!empty($firstname3)) {
            $violinenroll_query3 = "SELECT * FROM violinlessons WHERE firstname='$firstname3' AND lastname='$lastname3' LIMIT 1";
            $result = mysqli_query($db, $violinenroll_query3);
            $enrolled = mysqli_fetch_assoc($result);
            if (!$enrolled) {;?>
            <button type="submit" class="btn-e" name="select_violinlessons3">Enroll <?php echo $firstname3 ?></button>
            <?php   } else {; ?>
                <button type="submit" class="btn-ce" name="cancelviolin3">Withdraw<br><?php echo $firstname3;?></button>
            <?php }
            }
            ?> 
            <p>The conservatory program is for students interested in the serious study of their instrument. Students who choose this class must also enroll in String Masterclass (Mon. 4:30) and one of the string ensembles. These classes are included at no extra cost and must be attended every week.</p>
        </form>
    </div> 
    
    
    
     <div class="enrollbuttons">
        <div class="edit">
                <p>$365.99</p>
            </div>
    <h3>Conservatory Program: Cello Lessons</h3>
            <p><strong>Day/time: </strong>TBD</p>
  	    <form method="post" action="confirmregfunction.php">
            <?php $celloenroll_query = "SELECT * FROM cellolessons WHERE firstname='$firstname' AND lastname='$lastname' LIMIT 1";
            $result = mysqli_query($db, $celloenroll_query);
            $enrolled = mysqli_fetch_assoc($result);
                if (!$enrolled) {;?>
            <button type="submit" class="btn-e" name="select_cellolessons">Enroll <?php echo $firstname ?></button>
            <?php   } else {; ?>
                <button type="submit" class="btn-ce" name="cancelcello">Withdraw<br><?php echo $firstname;?></button>
            <?php } 
                if (!empty($firstname2)) {
            $celloenroll_query2 = "SELECT * FROM cellolessons WHERE firstname='$firstname2' AND lastname='$lastname2' LIMIT 1";
            $result = mysqli_query($db, $celloenroll_query2);
            $enrolled = mysqli_fetch_assoc($result);
            if (!$enrolled) {;?>
            <button type="submit" class="btn-e" name="select_cellolessons2">Enroll <?php echo $firstname2 ?></button>
            <?php   } else {; ?>
                <button type="submit" class="btn-ce" name="cancelcello2">Withdraw<br><?php echo $firstname2;?></button>
            <?php }
            }
                if (!empty($firstname3)) {
            $celloenroll_query3 = "SELECT * FROM cellolessons WHERE firstname='$firstname3' AND lastname='$lastname3' LIMIT 1";
            $result = mysqli_query($db, $celloenroll_query3);
            $enrolled = mysqli_fetch_assoc($result);
            if (!$enrolled) {;?>
            <button type="submit" class="btn-e" name="select_cellolessons3">Enroll <?php echo $firstname3 ?></button>
            <?php   } else {; ?>
                <button type="submit" class="btn-ce" name="cancelcello3">Withdraw<br><?php echo $firstname3;?></button>
            <?php }
            }
            ?> 
            <p>The conservatory program is for students interested in the serious study of their instrument. Students who choose this class must also enroll in String Masterclass (Mon. 4:30) and one of the string ensembles. These classes are included at no extra cost and must be attended every week.</p>
        </form>
    </div> 
    
    
    
    <div class="enrollbuttons">
        <div class="edit">
                <p>$0.00</p>
            </div>
    <h3>Conservatory Program: Piano Masterclass</h3>
            <p><strong>Day/time: </strong>Wed. 4:30-5:30pm</p>
  	    <form method="post" action="confirmregfunction.php">
            <?php $pianoclassenroll_query = "SELECT * FROM pianoclass WHERE firstname='$firstname' AND lastname='$lastname' LIMIT 1";
            $result = mysqli_query($db, $pianoclassenroll_query);
            $enrolled = mysqli_fetch_assoc($result);
                if (!$enrolled) {;?>
            <button type="submit" class="btn-e" name="select_pianoclass">Enroll <?php echo $firstname ?></button>
            <?php   } else {; ?>
                <button type="submit" class="btn-ce" name="cancelpianoclass">Withdraw<br><?php echo $firstname;?></button>
            <?php } 
                if (!empty($firstname2)) {
            $pianoclassenroll_query2 = "SELECT * FROM pianoclass WHERE firstname='$firstname2' AND lastname='$lastname2' LIMIT 1";
            $result = mysqli_query($db, $pianoclassenroll_query2);
            $enrolled = mysqli_fetch_assoc($result);
            if (!$enrolled) {;?>
            <button type="submit" class="btn-e" name="select_pianoclass2">Enroll <?php echo $firstname2 ?></button>
            <?php   } else {; ?>
                <button type="submit" class="btn-ce" name="cancelpianoclass2">Withdraw<br><?php echo $firstname2;?></button>
            <?php }
            }
                if (!empty($firstname3)) {
            $pianoclassenroll_query3 = "SELECT * FROM pianoclass WHERE firstname='$firstname3' AND lastname='$lastname3' LIMIT 1";
            $result = mysqli_query($db, $pianoclassenroll_query3);
            $enrolled = mysqli_fetch_assoc($result);
            if (!$enrolled) {;?>
            <button type="submit" class="btn-e" name="select_pianoclass3">Enroll <?php echo $firstname3 ?></button>
            <?php   } else {; ?>
                <button type="submit" class="btn-ce" name="cancelpianoclass3">Withdraw<br><?php echo $firstname3;?></button>
            <?php }
            }
            ?> 
            <p>The conservatory program is for students interested in the serious study of their instrument.  Students who register for this class must be enrolled in conservatory program piano lessons.</p>
        </form>
    </div> 
    
    
    
    <div class="enrollbuttons">
        <div class="edit">
                <p>$200.00</p>
            </div>
    <h3>Group violin</h3>
        <p><strong>Day/time: </strong>Mon. 3:30-4:15pm</p>
  	    <form method="post" action="confirmregfunction.php">
            <?php $groupviolinenroll_query = "SELECT * FROM groupviolin WHERE firstname='$firstname' AND lastname='$lastname' LIMIT 1";
            $result = mysqli_query($db, $groupviolinenroll_query);
            $enrolled = mysqli_fetch_assoc($result);
                if (!$enrolled) {;?>
            <button type="submit" class="btn-e" name="select_groupviolin">Enroll <?php echo $firstname ?></button>
            <?php   } else {; ?>
                <button type="submit" class="btn-ce" name="cancelgroupviolin">Withdraw<br><?php echo $firstname;?></button>
            <?php } 
                if (!empty($firstname2)) {
            $groupviolinenroll_query2 = "SELECT * FROM groupviolin WHERE firstname='$firstname2' AND lastname='$lastname2' LIMIT 1";
            $result = mysqli_query($db, $groupviolinenroll_query2);
            $enrolled = mysqli_fetch_assoc($result);
            if (!$enrolled) {;?>
            <button type="submit" class="btn-e" name="select_groupviolin2">Enroll <?php echo $firstname2 ?></button>
            <?php   } else {; ?>
                <button type="submit" class="btn-ce" name="cancelgroupviolin2">Withdraw<br><?php echo $firstname2;?></button>
            <?php }
            }
                if (!empty($firstname3)) {
            $groupviolinenroll_query3 = "SELECT * FROM groupviolin WHERE firstname='$firstname3' AND lastname='$lastname3' LIMIT 1";
            $result = mysqli_query($db, $groupviolinenroll_query3);
            $enrolled = mysqli_fetch_assoc($result);
            if (!$enrolled) {;?>
            <button type="submit" class="btn-e" name="select_groupviolin3">Enroll <?php echo $firstname3 ?></button>
            <?php   } else {; ?>
                <button type="submit" class="btn-ce" name="cancelgroupviolin3">Withdraw<br><?php echo $firstname3;?></button>
            <?php }
            }
            ?> 
            <p>The conservatory program is for students interested in the serious study of their instrument.  Students who register for this class must be enrolled in conservatory program piano lessons.</p>
        </form>
    </div> 
    
    
    <div class="enrollbuttons">
        <h3>Click below to finalize your enrollment and send a confirmation email.</h3>
        <p>You owe:</p>
        <form method="post" action="enroll.php">
        <div class="button">
            <button type="submit" class="btn btn-primary btn-xl" name="finalize">Finish Enrolling</button> 
        </div>
        </form>
        
    </div>
    
    </div>
    
</body>
</html>