<?php
$conn = mysqli_connect("localhost","root","","webcam");
$desig = $_POST['desig'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
if(isset($_FILES["webcam"]["tmp_name"])){
    $tmpName = $_FILES["webcam"]["tmp_name"];
    $imageName = date("Y.m.d")."-".date("h.i.sa").' .jpeg';
    move_uploaded_file($tmpName,'img/'.$imageName);

    $date = date("Y/m/d") . "&" .date("h:i:sa");
    $query = "INSERT INTO tb_image VALUES('','$date','$imageName')";
    mysqli_query($conn,$query);
}
?>