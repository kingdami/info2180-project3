<?php

session_start();

require "connect.php";
$lookup = $conn->query("Select user_id from currentUser;");
$result = $lookup->fetchAll(PDO::FETCH_ASSOC);

$user = $result[0]['user_id'];
    try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "Delete from currentUser where user_id= '$user';";
    $conn->exec($sql);
    include_once 'index.php';
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    
    session_destroy();
    