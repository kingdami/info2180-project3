$(document).ready(function(){
    
    
//Validates the user email.    
    function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

//Validates the user password.  
    function validatePassword(password) {
        var re = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
        return re.test(password);
        
    }
    
//The function that runs when the login buttion is clicked.    
    $("#loginbtn").click(function () {
        var uname = $("#uname").val();
        var pswrd = $("#pswrd").val();
        
        var myData = {username: uname, password: pswrd };
        
        $.ajax({
            url: 'login.php',
            type: "POST",
            data: myData,
            success: function(result) {
                if(result.indexOf("Invalid") > -1) {
                    $("#result").append(result);

                } else 
                    $("#result").html(result);

                
            }
        })
});

//The function that runs when the logout buttion is clicked.
    $("#logoutbtn").click(function() {
        $.ajax({
            url: 'logout.php',
            type: "POST",
            data: "",
            success: function(result) {
                $("#result").load('index.php')
            }
        })
    })

//The function that runs when the compose buttion is clicked. Any open window is closed then it open the compose section.    
    $("#composebtn").click(function(){
        if($('.createSection').css('display','none') && $('.inbox').css('display', 'none')) {
            $("input[type=text]").val("");
            $("#compose").toggle("fast");
        } else if(!$('.createSection').css('display','none')){
            $("input[type=text], textarea").val("");
            $("#create").toggle("fast");
            $("#compose").toggle("fast");
        } else if(!$('.inbox').css('display', 'none')) {
            $("input[type=text], textarea").val("");
            $('.inbox').toggle("fast");
            $("#compose").toggle("fast");
        }
        
    })
    
//The function that runs when the create buttion is clicked.    
    $("#createbtn").click(function() {
        if($('.composeSection').css('display','none') && $('.inbox').css('display', 'none')){
            $("input[type=text], textarea").val("");
            $("#create").toggle("fast");
        } else if(!$('.composeSection').css('display','none')){
            $("input[type=text], textarea").val("");
            $("#compose").toggle("fast");
            $("#create").toggle("fast");
        } else if(!$('.inbox').css('display', 'none')) {
            $("input[type=text], textarea").val("");
            $('.inbox').toggle("fast");
            $("#create").toggle("fast");
        }
    })

//The function that runs when sending a message.    
    $("#sendbtn").click(function(){
        var msg = $("#message").val();
        var sub = $("#subject").val();
        var receiver = $("#recipient").val();
        
//Checks if is a valid email address.        
        if(validateEmail(receiver)=== false) {
            $("#recipientStrip").append("<span id='note'>*Invalid Email </span>");
            $("#note").css('font-size', '8px');
            $("#note").css('color', 'red');
            setTimeout(function() { $("#note").remove(); }, 4000);
        } else {
        var params = {message: msg, subject: sub,  recipient: receiver};
        
        $.ajax({
            url: 'compose.php',
            type: "POST",
            data: params,
            success: function(result) {
                
                $("#composeSection").append("div id='response'> "+result+" </div>");
                setTimeout(function(){ $("#response").remove(); }, 4000);
                
                
            }
        })
        
        }  
    })

//The function that runs when creating a new user.    
    $("#addUser").click(function() {
        var em = $("#email").val();
        var firstname = $("#fname").val();
        var lastname = $("#lname").val();
        var username = $("#uname").val();
        var password = $("#pswrd").val();
        
//Checks to see if any of the fields are empty.
        if(!$("#email").val() || !$("#fname").val() || !$("#lname").val() || !$("#uname").val() || !$("#pswrd").val()) {
            $("#create").append("<span id='notes' style='font-size: 8px'>*All fields are required. </span>");
            setTimeout(function(){ $("#notes").remove(); }, 3000);
        } else if(validateEmail(em) === false) {
            $("#emailStrip").append("<span id='notes' style='font-size: 10px'>*Invalid Email. </span>");
            setTimeout(function(){ $("#notes").remove(); }, 4000);
        } else if(validatePassword(password) === false) {
            $("#idStrip").append("<span id='notes' style='font-size: 10px'>*Must be at least 8 characters, have a number and a capital letter. </span>");
            setTimeout(function(){ $("#notes").remove(); }, 5000);
        } else {
        
            var params = {email: em, fname: firstname, lname: lastname, uname: username, pswrd: password }
            
            $.ajax({
                url: 'create.php',
                type: "POST",
                data: params,
                success: function(result) {
                    $("#result").html(result);
                    $("#result").append("<span id='response'>"+firstname+" was created successfully. </span>");
                    $("#response").css('font-size', '12px');
                    setTimeout(function(){$("#response").remove(); }, 4000);
                    
                }
            })
        }
    })

//The function that runs when the Messages buttion is clicked.    
    $("#messagebtn").click(function() {
        if($('.inbox').css('display', 'none')) {
            $(".table").empty();
            $('.inbox').toggle("fast");
            
            
             $.ajax({
                url: 'messages.php',
                type: "POST",
                data: "",
                success: function(result) {
                    $("#inboxSec").html(result);
                    
                }
            })
    
        } else {
            $(".table").empty();
            $('.inbox').toggle("fast");
            
        }
        
        $.getScript("load.js");
    })
    

});
        