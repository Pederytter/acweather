$(document).ready(function(){
    $(function() {
        $("#citydegreebutton").on("click", function(){
            if($("#citydegreebutton").hasClass("loaded")) {
                $("#citydegreebutton").toggleClass("loaded");
                $("#citydegreeh3").toggleClass("loaded");
                setTimeout(function() {
                    $("#citydegreebutton").toggleClass("loaded");
                    $("#citydegreeh3").toggleClass("loaded");
                }, 3200);
            } else {
                setTimeout(function() {
                    $("#citydegreebutton").toggleClass("loaded");
                    $("#citydegreeh3").toggleClass("loaded");
                }, 3200);
            }
        });
    });



    $(function() {
        $("#cityinput").on("focus", function() {
            $("#citydegreebutton").removeClass("loaded");
            $("#citydegreeh3").removeClass("loaded");
            if($(this).val() == "Select City") {
                $(this).val("");
            }
        });
    });

    $("#cityinput").keypress(function(e) {
        if(e.which == 13) {
            e.preventDefault();

            setTimeout(function() {
                $("#citydegreebutton").addClass("loaded");
                $("#citydegreeh3").addClass("loaded");
            }, 3200);
        } 
    });

    $("#cityinput").keyup(function(e) {
        if(e.which == 8 || e.which == 46) {
            $("#citydegreebutton").removeClass("loaded");
            $("#citydegreeh3").removeClass("loaded");
        } 
    });
});