<?php
$user_name = "mov_18945610";
$password = "dextra20";
$database = "mov_18945610_moosa";
$server = "sql210.move.pk";

mysql_connect("$server","$user_name","$password");

mysql_select_db("$database");
$output = '';

//collect
if (isset($_POST['search'])) {
    $searchq = $_POST['search'];
    $searchq = preg_replace("#[^a-z]#i","",$searchq);
    
    $query = mysql_query("SELECT * FROM dextra WHERE name LIKE '%$searchq%'") or die("could not search");
    $count = mysql_num_rows($query);
    if($count == 0) {
        $output = 'There were no search results';
    }else{
        while($row = mysql_fetch_array($query)) {
            $name = $row['name'];
            $ins = $row['institution'];
                    if($ins === '') {
                        $ins = 'N/A';
                    }else {
                        $ins = $ins;
                    }
            $del = $row['deltype'];
            $status = $row['status'];
            $pay = $row['pay'];
                    if($pay === '') {
                        $pay = 'Not Recieved';
                    }else {
                        $pay = $pay;
                    }
            $output .= '<div class="table-responsive">          
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Name</th>
                                <th>Delegation Type</th>
                                <th>Institute name</th>
                                <th>Status</th>
                                <th>Payment</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>'.$name.'</td>
                                <td>'.$del.'</td>
                                <td>'.$ins.'</td>
                                <td>'.$status.'</td>
                                <td>'.$pay.'</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>DEXTRA - Search</title>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/animate.min.css">
	<link rel="stylesheet" href="../css/et-line-font.css">
	<link rel="stylesheet" href="../css/nivo-lightbox.css">
	<link rel="stylesheet" href="../css/nivo_themes/default/default.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,300,500" type='text/css'>
    <link rel="icon" href="images/logos/icon.png" sizes="32x32" />
    <style>
        body {
            color: #fff;
            text-align: center;
            background-image: url(../images/bg/back1.jpg);
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }
        #topbar {
            background: #4B4B4B;
            text-align: center;
            margin-bottom: 30px;
            background-color: rgba(0, 0, 0, 0.5);
            border-bottom:2px solid #fff;
        }
        #topbar .img-responsive {
            display: inline-block;
        }
        #topbar img {
            max-height: 150px;
        }
        .table-responsive {
            text-align: left;
        }
        a {
            color: #000;
        }
    </style>
    
</head>
<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

<!-- SEARCH SECTION -->
<section id="topbar">
    <div class="container">
       <div class="row">
             <div class="col-xs-12 col-sm-3">
               <img class="img img-responsive" src="../form/img/dex.png">
             </div>
             <div class="col-xs-12 col-sm-6">
               <img class="img img-responsive" src="../form/img/homelogo.png" />
             </div>
             <div class="col-xs-12 col-sm-3">
               <img class="img img-responsive" src="../form/img/bta.png">
             </div>
       </div>
    </div>
</section>
    

<section id="dextra">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2>Look for your Team status here:</h2>
                <form action="index.php" method="post">
                    <input class="form-control" name="search" type="text" placeholder="ENTER THE NAME OF HEAD DELEGATE" maxlength="40"><br>
                    <?php print("$output");?><br>
                    <input class="btn btn-info btn-lg" type="submit" value="Search">
                    <br><br>
                    <p>If the search does not show your team status, please contact Director IT or visit our <a href="http://www.facebook.com/dextrajh">Facebook Page</a></p>
                </form>
			</div>
        </div>
    </div>
</section>

<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/smoothscroll.js"></script>
<script src="../js/isotope.js"></script>
<script src="../js/imagesloaded.min.js"></script>
<script src="../js/nivo-lightbox.min.js"></script>
<script src="../js/jquery.backstretch.min.js"></script>
<script src="../js/wow.min.js"></script>
<script src="../js/custom.js"></script>

</body>
</html>