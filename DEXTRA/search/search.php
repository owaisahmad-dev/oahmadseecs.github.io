<?php

$user_name = "jinnahhi";
$password = "9SvK4z9l7y";
$database = "jinnahhi_dextra_registrations";
$server = "localhost:3306";

mysql_connect("$server","$user_name","$password");

mysql_select_db("$database");

if (isset($_GET['Search'])) {
    $keywords = $db->escape_string($_GET['searchquery']);
	$query = $db->query("
	SELECT 'name1','email1'
	FROM 'data'
	WHERE 'phone1' LIKE '%{searchquery}%'
	OR 'email1' LIKE '%{searchquery}%'
	");    

}
?>

<div class="result-count">
    Found <?php echo $query->num_rows; ?> results.
</div>
      
<?php
    if($query->num_rows) {
        while($r = $query->fetch_object()) {
?>
<div class="result">
    <a href="#"><?php echo $r->name1; ?></a>
    <a> If you find your team here, download the below documents, fill them and submit them</a> 
    <a href="evaluation-form.docx">Evaluation form</a>
</div>