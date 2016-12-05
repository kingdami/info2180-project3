<?php
session_start();

?>

<?php
require "connect.php";

$sender = $_SESSION['currentUserID']; 
$receiver = $_POST['recipient'];


if (!filter_var($receiver, FILTER_VALIDATE_EMAIL)){
    echo "Invalid Email";
} else {
    $message = $_POST['message'];
    $subject = $_POST['subject'];
    $date = date("Y-m-d");
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "Insert into message(recipient_ids,user_id,subject,body,date_sent) values ('$receiver','$sender', '$subject', '$message', '$date');";
        $conn->exec($sql);
        print "Message Sent";
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    
}
    
    