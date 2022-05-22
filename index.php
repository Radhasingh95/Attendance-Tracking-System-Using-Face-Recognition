<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webcam</title>
</head>
<style media = "screen">
    .container{
        display:flex;
        flex-direction:column;
        align-items:center;
    }
    #my_camera{
        border:1px solid black;
    }
    .container button{
        width:480px;
        padding:12px;
        border:none;
        border-radius:20px;
        cursor:pointer;
        font-size:16px;
    }
    .container >button{
        background: #2EB82E;
        color:white;
    }
    .container a button{
        background: #F0AD4E;
        color:white;
    }
</style>
<body onload = "configure()">
    <div class="container">
        <div id="my_camera">

        </div>
        <div id="results" style="visibility:hidden; position:absolute;"></div>
        <br>
        <button type = "button" onclick ="saveSnap();" >Save</button> <br>
        <a href="image.php"> <button type="button">Go To Image Database Page &#x2192;</button> </a>
    </div>


<!-- script -->
<script  src="assets/webcam.min.js" ></script>
<script >
    function configure(){
        Webcam.set({
           width:480,
           height:360,
           image_format:'jpeg',
           jpeg_quality:90
        });
        Webcam.attach('#my_camera');
    }
    function saveSnap(){
        Webcam.snap(function(data_uri){
            document.getElementById('results').innerHTML = 
            '<img id = "webcam" src = "'+data_uri+'">';
        });

        Webcam.reset();
        var base64image = document.getElementById("webcam").src;
        Webcam.upload(base64image,'function.php',function(code,text){
        alert('Save Successfully');
        // document.location.href = "image.php"
        });
    }
</script>
</body>
</html>