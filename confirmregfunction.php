<?php 
session_start();

$errors = array(); 


function register($postenroll, $postcancel, $first, $last, $gen, $birth, $table, $classname)     {
// initializing variables
if (isset($_SESSION['username'])) {

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

$username = $_SESSION['username']; 
    
if (isset($_POST[$postenroll])) {
    $user_check_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $row = mysqli_fetch_assoc($result);
    $studentid = $row['id'];
    $firstname = $row[$first];
    $lastname = $row[$last];
    $phone = $row['phone'];
    $gender = $row[$gen];
    $dob = $row[$birth];
  
    
    $query = "INSERT INTO $table (studentid, firstname, lastname, phone, gender, dob) 
  			  VALUES('$studentid', '$firstname', '$lastname', '$phone', '$gender', '$dob')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "$firstname is now enrolled in $classname";
  	header('location: selectclasses.php');
}
    
if (isset($_POST[$postcancel])) {
  // receive all input values from the form
    
    $user_check_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $row = mysqli_fetch_assoc($result);
    $studentid = $row['id'];
    $firstname = $row[$first];
    $lastname = $row[$last];
  
    
    $query = "DELETE FROM $table  WHERE firstname='$firstname' AND lastname='$lastname'";
  			 
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['canceled'] = "$firstname's enrollment in $classname has been canceled";
  	header('location: selectclasses.php');
    }
    
    }
}

register("select_pianolessons", "cancelpiano", "firstname", "lastname", "gender", "dob", "pianolessons", "Piano Lessons");

register("select_pianolessons2", "cancelpiano2", "firstname2", "lastname2", "gender2", "dob2", "pianolessons", "Piano Lessons");

register("select_pianolessons3", "cancelpiano3", "firstname3", "lastname3", "gender3", "dob3", "pianolessons", "Piano Lessons");

register("select_violinlessons", "cancelviolin", "firstname", "lastname", "gender", "dob", "violinlessons", "Violin Lessons");

register("select_violinlessons2", "cancelviolin2", "firstname2", "lastname2", "gender2", "dob2", "violinlessons", "Violin Lessons");

register("select_violinlessons3", "cancelviolin3", "firstname3", "lastname3", "gender3", "dob3", "violinlessons", "Violin Lessons");    

register("select_cellolessons", "cancelcello", "firstname", "lastname", "gender", "dob", "cellolessons", "Cello Lessons");

register("select_cellolessons2", "cancelcello2", "firstname2", "lastname2", "gender2", "dob2", "cellolessons", "Cello Lessons");

register("select_cellolessons3", "cancelcello3", "firstname3", "lastname3", "gender3", "dob3", "cellolessons", "Cello Lessons");

register("select_pianoclass", "cancelpianoclass", "firstname", "lastname", "gender", "dob", "pianoclass", "Piano Class");

register("select_pianoclass2", "cancelpianoclass2", "firstname2", "lastname2", "gender2", "dob2", "pianoclass", "Piano Class");

register("select_pianoclass3", "cancelpianoclass3", "firstname3", "lastname3", "gender3", "dob3", "pianoclass", "Piano Class");

register("select_groupviolin", "cancelgroupviolin", "firstname", "lastname", "gender", "dob", "groupviolin", "Group Violin");

register("select_groupviolin2", "cancelgroupviolin2", "firstname2", "lastname2", "gender2", "dob2", "groupviolin", "Group Violin");

register("select_groupviolin3", "cancelgroupviolin3", "firstname3", "lastname3", "gender3", "dob3", "groupviolin", "Group Violin");


    ?>