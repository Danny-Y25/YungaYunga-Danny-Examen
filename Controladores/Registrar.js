$(".myform").hide();

function ShowHideElement(){
    let text = "";
    
    if($("#crear").text() === "Aceptar"){

        $(".myform").show();
        text = "Hide form"
    }else{
        $(".myform").hide();
        text = "Show form"
    }

    $("#crear").html(text);
}
