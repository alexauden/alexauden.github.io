<?php
session_start();

$firstname = "";
$lastname = "";
$dob = "";
$address = "";
$city = "";
$state = "";
$zip = "";
$firstname2 = "";
$lastname2 = "";
$dob2 = "";
$parent1 = "";
$phone = "";
$firstname3 = "";
$lastname3 = "";
$dob3 = "";
$mother = "";
$motherphone = "";
$father = "";
$fatherphone = "";
$emcontact = "";
$emphone = "";
$errors = array(); 


// initializing variables
if (isset($_SESSION['username'])) {

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

$username = $_SESSION['username'];    
    
// REGISTER USER
if (isset($_POST['enterinfo'])) {
  // receive all input values from the form
  $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
  if (isset($_POST['gender'])) {$gender = mysqli_real_escape_string($db, $_POST['gender']);}
  $dob = mysqli_real_escape_string($db, $_POST['dob']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $state = mysqli_real_escape_string($db, $_POST['state']);
  $zip = mysqli_real_escape_string($db, $_POST['zip']);
  $firstname2 = mysqli_real_escape_string($db, $_POST['firstname2']);
  $lastname2 = mysqli_real_escape_string($db, $_POST['lastname2']);
  if (isset($_POST['gender2'])) {$gender2 = mysqli_real_escape_string($db, $_POST['gender2']);}
  $dob2 = mysqli_real_escape_string($db, $_POST['dob2']);
  $mother = mysqli_real_escape_string($db, $_POST['mother']);
  $motherphone = mysqli_real_escape_string($db, $_POST['motherphone']);
  $father = mysqli_real_escape_string($db, $_POST['father']);
  $fatherphone = mysqli_real_escape_string($db, $_POST['fatherphone']);
  $emcontact = mysqli_real_escape_string($db, $_POST['emcontact']);
  $emphone = mysqli_real_escape_string($db, $_POST['emphone']);



    




  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($firstname)) { array_push($errors, "First Name is required"); }
  if (empty($lastname)) { array_push($errors, "Last Name is required"); }
  if (empty($dob)) { array_push($errors, "Date of Birth is required"); }
  if (empty($gender)) { array_push($errors, "Gender is required"); }
  if (empty($address)) { array_push($errors, "Address is required"); }
  if (empty($city)) { array_push($errors, "City is required"); }
  if (empty($state)) { array_push($errors, "State is required"); }
  if (empty($zip)) { array_push($errors, "Zip Code is required"); }
if ($firstname === $firstname2) {
    if($firstname){
	array_push($errors, "The two first names are the same. Please enter each student's name only once");
    }
  }
    
    if ($firstname2){
  if (empty($lastname2)) { array_push($errors, "Please enter all info for the second student"); }
          if (empty($gender2)) { array_push($errors, "Please enter all info for the second student"); }
        if (empty($dob2)) { array_push($errors, "Please enter all info for the second student"); }        

    }


  

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
     

            
  	$query = "UPDATE users set firstname = '$firstname', lastname = '$lastname', gender = '$gender', dob = '$dob', phone = '$phone', address = '$address', city = '$city', state = '$state', zip = '$zip', firstname2 = '$firstname2', lastname2 = '$lastname2', gender2 = '$gender2', dob2 = '$dob2', mother = '$mother', motherphone = '$motherphone', father = '$father', fatherphone = '$fatherphone', emcontact = '$emcontact', emphone = '$emphone' WHERE username = '$username'";
    mysqli_query($db, $query);

  	$_SESSION['success'] = "Your data has been submitted";
  	header('location: paymentplan.php');
  }
}
    
if (isset($_POST['paymentplan'])) {
  // receive all input values from the form
  $paymentplan = mysqli_real_escape_string($db, $_POST['paymentplan']);
    

    
    if (count($errors) == 0) {
     

            
  	$query = "UPDATE users set paymentplan = '$paymentplan' WHERE username = '$username'";
    mysqli_query($db, $query);

  	$_SESSION['success'] = "Continue your enrollment below";
  	header('location: selectclasses.php');
    }
    
    }
}

?>