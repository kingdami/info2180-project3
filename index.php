<?php

require 'session.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Cheapomail</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="test.js" ></script>
    
        
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
         <link rel="stylesheet" href="pages.css" type="text/css" />
        

    </head>
    
    <body id="result" class="container-fluid">
        <div class="row">
        <h1 class="nav col-sm-4 col-md-4 col-lg-4">Cheapomail</h1>
        <div id="loginForm" class="col-sm-8 col-md-8 col-lg-8">
            <input id="uname" type="text" name="username" placeholder="Username"/>
            <input id="pswrd" type="password" name="password" placeholder="Password"/>
            <input id="loginbtn" type="submit" name="loginbtn" value="Login"/>
        </div>
        </div>
    
        <div id="page"></div>
    </body>
</html>