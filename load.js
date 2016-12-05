$(document).ready(function(){
    
    
    
    $("td").css('border-bottom', '1px solid #c4c4c4');
    $("td").css('position', 'relative');
    $("td").css('width', '100%');
    

//Opens a message when clicked.
    $("td").click(function() {
            var currentMessage = $(this).attr('id');
            
            
            var param = {messageID : currentMessage};
            
            $(this).attr('font-weight','normal');
            
            var messageTitle = $("#"+currentMessage+" div h2").text();
            var messageBody = $("#"+currentMessage+" p").text();
            
            var string = "<div> <h2>"+messageTitle+"</h2> <div>"+messageBody+"</div> <br> <br>";
            var foot = "<div class= 'foot' style='text-align: right' style='color:#efefef'> <span> Reply </span> | <span> Delete  </span>";
            
            $(".inbox").html(string);
            $(".inbox").append(foot);
            
            $.ajax({
            url: 'markRead.php',
            type: "POST",
            data: param,
            success: function(result) {
                    $(result).attr('font-weight: normal');
            }

        })
            
        }); 
        
    $("tr").mouseover(function(){
        $(this).css("background-color", "#efefef'");
        $(this).css("box-shadow", "0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)");
        $(this).css("cursor", "pointer");
    })
    
     $("tr").mouseout(function(){
        $(this).css("color", "black");
        $(this).css("box-shadow", "none");
    })
});