<?php 
        require "connect.php";
        
        $_SESSION['currentUserID'] = $GLOBALS['currentUserID'];
        $currentUser = $_GET['name'];
        echo $currentUser;
        $_SESSION['currentUserFName'] = $GLOBALS['currentUserFName'];
        $_SESSION['currentUserLName'] = $GLOBALS['currentUserLName'];
        
        $sql = $conn->query("Select * from message where recipient_ids ='".$currentUser."';");
        $results = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        $sender = sizeof($result); 
        
        if($sender >= 1){
                '<style type="text/css">
                    #messagebtn {
                        background-color: red;
                    }
                </style>';
        } else{
            echo "No message";
        }