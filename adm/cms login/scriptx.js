function checkAvailability() {
    $("#loaderIcon").show();
    jQuery.ajax({
    url: "reg1.php",
    data:'email='+$("#email").val(),
    type: "POST",
    success:function(data){
    $("#user-availability-status").html(data);
    $("#loaderIcon").hide();
    },
    error:function (){}
    });
    }