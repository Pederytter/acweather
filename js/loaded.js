$(document).ready(function(){
    $(function() {
        $('#citydegreebutton').on('click', function(){
            setTimeout(function() {
                $('#citydegreebutton').toggleClass('loaded');
                $('#citydegreeh3').toggleClass('loaded');
            }, 4500);
        });
    });
});