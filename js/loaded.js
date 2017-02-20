$(document).ready(function(){

    [].slice.call( document.querySelectorAll( 'button.progress-button' ) ).forEach( function( bttn ) {
        new ProgressButton( bttn, {
            callback : function( instance ) {
                var progress = 0,
                    interval = setInterval( function() {
                        progress = Math.min( progress + Math.random() * 0.1, 1 );
                        instance._setProgress( progress );

                        if( progress === 1 ) {
                            instance._stop(1);
                            clearInterval( interval );
                        }
                    }, 60 );
            }
        } );
    } );


    $(function() {
        $("#citydegreebutton").on("click", function(){
            $("#citydegreeh3").addClass("displaytext");
            if($("#citydegreebutton").hasClass("loaded")) {
                $("#citydegreebutton").toggleClass("loaded");
                $("#citydegreeh3").toggleClass("loaded");
                setTimeout(function() {
                    $("#citydegreebutton").toggleClass("loaded");
                    $("#citydegreeh3").toggleClass("loaded");
                }, 2200);
            } else {
                setTimeout(function() {
                    $("#citydegreebutton").toggleClass("loaded");
                    $("#citydegreeh3").toggleClass("loaded");
                }, 2200);
            }
        });
    });



    $(function() {
        $("#cityinput").on("focus", function() {
            $("#citydegreebutton").removeClass("loaded");
            $("#citydegreeh3").removeClass("loaded");
            setTimeout(function() {
                $("#citydegreeh3").removeClass("displaytext");
            }, 1500);
            if($(this).val() == "Select City") {
                $(this).val("");
            }
        });
    });

    $("#cityinput").keypress(function(e) {
        if(e.which == 13) {
            e.preventDefault();
            $("#citydegreebutton").addClass("enterKeyPressed");
            $("#citydegreebutton").click();

            setTimeout(function() {
                $("#citydegreebutton").addClass("loaded");
                $("#citydegreeh3").addClass("loaded");
                $("#citydegreebutton").removeClass("enterKeyPressed");
            }, 2200);
        } 
    });

    $("#cityinput").keydown(function(e) {
        if(e.which == 8 || e.which == 46) {
            $("#citydegreebutton").removeClass("loaded");
            $("#citydegreeh3").removeClass("loaded");
            setTimeout(function() {
                $("#citydegreeh3").removeClass("displaytext");
            }, 1500);
        } 
    });
});