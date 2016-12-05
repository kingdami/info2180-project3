<?php
session_start();

?>

<?php
    require "connect.php";

//Checks if the authentication details exist in the database.    
    if(empty($_POST['username']) || empty($_POST['password'])){
        echo "<br> *Invalid Username Password Combination.";
    } else {
        $uname = $_POST['username'];
    
        $pwrd = sha1($_POST['password'],false);
        
        $lookup = $conn->query("Select * from user where username='" . $uname . "' and password='" . $pwrd . "';");
        $result = $lookup->fetchAll(PDO::FETCH_ASSOC);
        
        if(empty($result)){
            echo "<br> *Invalid Username Password Combination.";
            } else {
                    $_SESSION['currentUserID'] = $result[0]['user_id'];
                    $currentUserID = $_SESSION['currentUserID'];
                    $_SESSION['currentUserFName'] = $result[0]['firstname']; 
                    $_SESSION['currentUserLName'] = $result[0]['lastname'];
                    $_SESSION['currentUserLName'] = $result[0]['user_type'];

//Loads the correct homepage if successful.                    
                if($_SESSION['currentUserLName'] = $result[0]['user_type'] === 'admin') {    
                header("Location: homepage.php");
                } else {
                    header("Location: homepage2.php");
                }
    }
}
