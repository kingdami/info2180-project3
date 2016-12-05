<?php
session_start();
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
    <body id="content" class="container-fluid">

        <div class="row">
            <h1 class="nav col-sm-4 col-md-4 col-lg-4"> Welcome <?=" ". $_SESSION['currentUserFName'] . " " . $_SESSION['currentUserLName']  ?> </h1>
            <div id="homeNav" class="col-sm-8 col-md-8 col-lg-8">

                <input id="messagebtn" type="submit" name="notification" value="Messages"/>
                <input id="composebtn" type="submit" value="Compose"/>
                <input id="logoutbtn" name="logout" type="submit" value= "logout" />
                
            </div>
        </div>
        <div id= "section">
            <div id="compose" class="composeSection" style="display:none">
                    <div><input id= "subject" type="text" name="subject" placeholder= "Subject"/></div>
                    <div id="recipientStrip"><input id= "recipient" type="text" name="recipient" placeholder= "Recipient"/></div>
                    <div><input id="message" type="textarea" name="message" placeholder= "Compose"/></div>
                    <div><input id="sendbtn" type="submit" value="Send"/></div>
            </div>
            
            <div id="inboxSec" class="inbox" style="display:none">
                <table class='table' id='inbox'>
                    
                </table>
                
            </div>

        </div>
        
    </body>
</html>