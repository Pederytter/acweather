<!DOCTYPE html>
<html>
<head>
<title>Weather</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script>
    function gettingJSON(){
        document.write("");
        $.getJSON("http://api.openweathermap.org/data/2.5/weather?q=Aarhus,dk&appid=9e24f0bb5893a49bb7e40a9bf368bc7c&units=metric",function(json){
            document.write(JSON.stringify(json));
        });
    }
    </script>
    
    <script>
$(document).ready(function(){
    $("button").click(function(){
        $.getJSON("demo_ajax_json.js", function(result){
            $.each(result, function(i, field){
                $("div").append(field + " ");
            });
        });
    });
});
</script>

</head>
<body>
<button id = "getIt" onclick = "gettingJSON()">Get JSON</button>
<br>
<br>
<br>
<br>
<br>
<button>Get JSON data</button>


</body>
</html>