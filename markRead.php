<?php
    session_start();
    require 'connect.php';
    
    $messageID = $_POST['messageID'];
    $messageNum = $messageID + 1;
    $date = date("Y-m-d");
    try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "Insert into message_read(message_id, reader_id, date_read) values ($messageNum, '".$_SESSION['currentUserID']."', '$date');";
    $conn->exec($sql);
    echo $messageID;
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }