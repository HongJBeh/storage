

function selectEvent(){
    var x = document.getElementById("society").value;
    
    $.ajax({
        url:"eventDisplay.php",
        method: "POST",
        data:{
            id : x
        },
        success:function(data){
            $("#ans").html(data);
        }
        
        
    })
}