<?php

$user_name = "jinnahhi";
$password = "9SvK4z9l7y";
$database = "jinnahhi_dextra_registrations";
$server = "localhost:3306";

mysql_connect("$server","$user_name","$password");

mysql_select_db("$database");

if (isset($_POST['submit'])) {
    
//team information
$deltype = $_POST['deltype'];
$ins = $_POST['schoolname'];
$city = $_POST['city'];
$delsize = $_POST['delsize'];
$accsize = $_POST['accsize'];
//preferences
$pref = $_POST['ev'];
$implodedData1 = implode(',', $pref);
$gt = $_POST['option'];
$gamepref = $_POST['gp'];
$implodedData2 = implode(',', $gamepref);
//contact information
    //head delegate
$name1 = $_POST['name1'];
$phone1= $_POST['number1'];
$email1 = $_POST['email1'];
    //delegate 2
$name2 = $_POST['name2'];
$phone2= $_POST['number2'];
$email2 = $_POST['email2'];
    //delegate 3
$name3 = $_POST['name3'];
$phone3 = $_POST['number3'];
$email3 = $_POST['email3'];
    //delegate 4
$name4 = $_POST['name4'];
$phone4 = $_POST['number4'];
$email4 = $_POST['email4'];
    //delegate 5
$name5 = $_POST['name5'];
$phone5 = $_POST['number5'];
$email5 = $_POST['email5'];
    //Reason of Interest
$reason = $_POST['interest'];

$order = mysql_query("INSERT INTO data (deltype, institution, city, delsize, accsize, events, gaming, games, name1, phone1, email1, name2, phone2, email2, name3, phone3, email3, name4, phone4, email4, name5, phone5, email5, reason)
VALUES ('$deltype', '$ins', '$city', '$delsize', '$accsize', '$implodedData1', '$gt', '$implodedData2', '$name1', '$phone1', '$email1', '$name2', '$phone2', '$email2', '$name3', '$phone3', '$email3', '$name4', '$phone4', '$email4', '$name5', '$phone5', '$email5', '$reason')");

if ($order) {
    echo '<div style="background-size: cover; background-position: center; height: 100vh;">
            <p style="color: #10629e; text-align:center; font-size: 40px; font-family: monospace; padding-top: 30vh;">REGISTERED SUCCESFULLY!</p>
            <p style="color: #10629e; text-align:center; font-size: 20px; font-family: monospace;">Email your pictures and evalutaion form at register@dextra.jinnahhighs.edu.pk. The image name should be the name of the delegate.</p>
            <p style="color: #10629e; text-align:center; font-size: 20px; font-family: monospace;">Do read the method of sending pictures by <a href="../events/reg-info.html">clicking here</a>.</p>
          </div>';
} else {
    echo '<div style="background-size: cover; background-position: center; height: 100vh;">
            <p style="color: #10629e; text-align:center; font-size: 50px; font-family: monospace; padding-top: 50vh;">WOOPS! ERROR OCCURED...</p>
          </div>';
}
}
?>