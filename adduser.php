<?php
session_start();

$errors = array(); 


// initializing variables
if (isset($_SESSION['username'])) {

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

$username = $_SESSION['username'];    
    
// REGISTER USER
if (isset($_POST['adduser'])) {
  // receive all input values from the form
  $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $dob = mysqli_real_escape_string($db, $_POST['dob']);
  

$user_check_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $row = mysqli_fetch_assoc($result);
    $studentid = $row['id'];
    $firstname2 = $row['firstname2'];
    $lastname2 = $row['lastname2'];
    $gender2 = $row['gender2'];
    $dob2 = $row['dob2'];
    $firstname3 = $row['firstname3'];
    $lastname3 = $row['lastname3'];
    $gender3 = $row['gender3'];
    $dob3 = $row['dob3'];
    

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($firstname)) { array_push($errors, "First Name is required"); }
  if (empty($lastname)) { array_push($errors, "Last Name is required"); }
  if (empty($dob)) { array_push($errors, "Date of Birth is required"); }
  if (empty($gender)) { array_push($errors, "Gender is required"); }
  

  

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
     

            
      if (empty($firstname2)) {
      $query = "UPDATE users set firstname2 = '$firstname', lastname2 = '$lastname', gender2 = '$gender', dob2 = '$dob' WHERE username = '$username'";
    mysqli_query($db, $query);

  	$_SESSION['success'] = "User added";
  	header('location: enroll.php');
          
      }  
      elseif (empty($firstname3)) {
      $query = "UPDATE users set firstname3 = '$firstname', lastname3 = '$lastname', gender3 = '$gender', dob3 = '$dob' WHERE username = '$username'";
    mysqli_query($db, $query);

  	$_SESSION['success'] = "User added";
  	header('location: enroll.php');   
      }
      else {
    $_SESSION['success'] = "Maximum users reached";
    header('location: enroll.php');   
      }
              
  }
}
    
    if (isset($_POST['updateinfo'])) {
        
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $state = mysqli_real_escape_string($db, $_POST['state']);
  $zip = mysqli_real_escape_string($db, $_POST['zip']);
  $mother = mysqli_real_escape_string($db, $_POST['mother']);
  $motherphone = mysqli_real_escape_string($db, $_POST['motherphone']);
  $father = mysqli_real_escape_string($db, $_POST['father']);
  $fatherphone = mysqli_real_escape_string($db, $_POST['fatherphone']);
  $emcontact = mysqli_real_escape_string($db, $_POST['emcontact']);
  $emphone = mysqli_real_escape_string($db, $_POST['emphone']);        

    if (empty($phone)) { array_push($errors, "Phone is required"); }
    if (empty($address)) { array_push($errors, "Address is required"); }
  if (empty($city)) { array_push($errors, "City is required"); }
  if (empty($zip)) { array_push($errors, "Zip Code is required"); }
        
    	$query = "UPDATE users set phone = '$phone', address = '$address', city = '$city', state = '$state', zip = '$zip', firstname2 = '$firstname2', lastname2 = '$lastname2', gender2 = '$gender2', dob2 = '$dob2', mother = '$mother', motherphone = '$motherphone', father = '$father', fatherphone = '$fatherphone', emcontact = '$emcontact', emphone = '$emphone' WHERE username = '$username'";
    mysqli_query($db, $query);

  	$_SESSION['success'] = "Information has been updated";
  	header('location: enroll.php');
        
    }
    
        if (isset($_POST['updatestudent'])) {
        
  $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
  if (isset($_POST['gender'])) {$gender = mysqli_real_escape_string($db, $_POST['gender']);} 
    $dob = mysqli_real_escape_string($db, $_POST['dob']);
      

    if (empty($firstname)) { array_push($errors, "First Name is required"); }
    if (empty($lastname)) { array_push($errors, "Last Name is required"); }
  if (empty($gender)) { array_push($errors, "Gender is required"); }
  if (empty($dob)) { array_push($errors, "Date of Birth is required"); }
        
              if (count($errors) == 0) {

            
    	$query = "UPDATE users set firstname = '$firstname', lastname = '$lastname', gender = '$gender', dob = '$dob' WHERE username = '$username'";
    mysqli_query($db, $query);

  	$_SESSION['success'] = "Information has been updated";
  	header('location: enroll.php');
        
    }
    }
    
            if (isset($_POST['updatestudent2'])) {
        
  $firstname = mysqli_real_escape_string($db, $_POST['firstname2']);
  $lastname = mysqli_real_escape_string($db, $_POST['lastname2']);
  if (isset($_POST['gender2'])) {$gender = mysqli_real_escape_string($db, $_POST['gender2']);} 
    $dob = mysqli_real_escape_string($db, $_POST['dob2']);
      

    if (empty($firstname)) { array_push($errors, "First Name is required"); }
    if (empty($lastname)) { array_push($errors, "Last Name is required"); }
  if (empty($gender)) { array_push($errors, "Gender is required"); }
  if (empty($dob)) { array_push($errors, "Date of Birth is required"); }
        
              if (count($errors) == 0) {

            
    	$query = "UPDATE users set firstname2 = '$firstname', lastname2 = '$lastname', gender2 = '$gender', dob2 = '$dob' WHERE username = '$username'";
    mysqli_query($db, $query);

  	$_SESSION['success'] = "Information has been updated";
  	header('location: enroll.php');
        
    }
    }
    
            if (isset($_POST['updatestudent3'])) {
        
  $firstname = mysqli_real_escape_string($db, $_POST['firstname3']);
  $lastname = mysqli_real_escape_string($db, $_POST['lastname3']);
  if (isset($_POST['gender3'])) {$gender = mysqli_real_escape_string($db, $_POST['gender3']);} 
    $dob = mysqli_real_escape_string($db, $_POST['dob3']);
      

    if (empty($firstname)) { array_push($errors, "First Name is required"); }
    if (empty($lastname)) { array_push($errors, "Last Name is required"); }
  if (empty($gender)) { array_push($errors, "Gender is required"); }
  if (empty($dob)) { array_push($errors, "Date of Birth is required"); }
        
              if (count($errors) == 0) {

            
    	$query = "UPDATE users set firstname3 = '$firstname', lastname3 = '$lastname', gender3 = '$gender', dob3 = '$dob' WHERE username = '$username'";
    mysqli_query($db, $query);

  	$_SESSION['success'] = "Information has been updated";
  	header('location: enroll.php');
        
    }
    }
    
}


?>