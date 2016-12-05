<?php
session_start();

?>

<?php
require "connect.php";

$userID = $_POST['email'];
$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$username = $_POST['uname'];
$password = $_POST['pswrd'];

    if(strlen($userID) < '4') {
        echo "Invalid Email Address";
    } else if(strlen($firstname)<'1') {
        echo "Invalid First Name";
    } else if(strlen($lastname)<'1') {
        echo "Invalid Last Name";
    } else if(strlen($firstname)<'1') {
        echo "Invalid Username";
    } else if (strlen($_POST["password"]) < '8') {
        echo "Your Password Must Contain At Least 8 Characters!";
    }
    elseif(!preg_match("#[0-9]+#",$pwrd)) {
       echo "Your Password Must Contain At Least 1 Number!";
    }
    elseif(!preg_match("#[A-Z]+#",$pwrd)) {
        echo "Your Password Must Contain At Least 1 Capital Letter!";
    }
    elseif(!preg_match("#[a-z]+#",$pwrd)) {
        echo "Your Password Must Contain At Least 1 Lowercase Letter!";
    } else {
        
$password = sha1($_POST['pswrd'], false);

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "Insert into user(user_id, firstname, lastname, username, password) values ('$userID','$firstname','$lastname', '$username', '$password');";
    $conn->exec($sql);
    include_once 'homepage.php';
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    
    }