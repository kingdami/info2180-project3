<?php
    session_start();
    require 'connect.php';
    
//Displays the contents of an inbox.    
    $sql = $conn->query("Select * from message where recipient_ids='". $_SESSION['currentUserID'] . "';");
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    if(empty($result)) {
        echo "No Message found.";
    } else {
        
        for( $i=0; $i< 10 ; $i++){

                $subject = $result[$i]['subject'];
                $message = $result[$i]['body'];
                $sender = $result[$i]['user_id'];
                $date = $result[$i]['date'];
                
                $sql2 = $conn->query("Select * from message_read where message_id= $i");
                $result2 = $sql2->fetchAll(PDO::FETCH_ASSOC);
                
                if(empty($result2)){
                
            		echo "<tr style='background-color: #efefef; width: 100%' > <td id=$i class='message' style='font-weight: bold'> <div> <h2 class='messageTitle'> $subject </h2></div> ",
            		"<p class='messageBody' > $message </p> </td",
            		"</tr>";
                } else {
                    echo "<tr> <td id=$i class='message'> <div> <h2 class='messageTitle'> $subject </h2></div> ",
            		"<p class='messageBody' > $message </p> </td",
            		"</tr>";
                }
                
            }
        if($result.length > 10) {
            echo "...";
        }
        }