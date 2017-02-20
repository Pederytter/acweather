$(document).ready(function(){


    //brugt af loadknapperne. bruger en math.random() funktion til at variere "loadprocess" på knappen
    //så den forekommer troværdig
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

    //når man trykker på "current location" knappen kommer der en visuel respons i form af at objekterne 
    //bevæger sig til siden. Her bliver der også taget højde for hvis tekst objektet bag knappen er for 
    //langt
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


    //Visuel respons når man fokuser input feltet igen.
    $(function() {
        $("#cityinput").on("focus", function() {
            $("#citydegreebutton").removeClass("loaded");
            $("#citydegreeh3").removeClass("loaded");
            setTimeout(function() {
                $("#citydegreeh3").removeClass("displaytext");
            }, 1500);
        });
    });

    //På enter kommer der en visuel respons på at man søger i feltet. 
    //I rapporten fremgår der en mere dybdegående forklaring af L62, L63 samt L68.
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

    //Visuel respons på at man trykke delete eller backspace i input feltet.
    //Gemmer også teksten væk hvis nu man vil skrive en lang string igen.
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