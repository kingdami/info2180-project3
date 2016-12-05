<?php
    try{
        $host = getenv('IP');
        $dbname = 'users';
        $username = getenv('C9_USER');
        $password = '';
        
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        }catch(PDOException $e) {
            echo $e->getMessage();
        }