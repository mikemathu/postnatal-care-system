

<?php


if(isset($_GET['id']))
    {
        $blogId = $_GET['id'];




        
    }

    else
    {
        header("Location: index.php");
        exit();
    }

    ?>



<?php

$con=mysqli_connect("localhost","root","","pmsdb");

$sql = "select * from blog_tbl  
where id = ? ";

$stmt = mysqli_stmt_init($con);    

if (!mysqli_stmt_prepare($stmt, $sql))
{
die('SQL error');
}
else
{
mysqli_stmt_bind_param($stmt, "s", $blogId);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$row = mysqli_fetch_assoc($result);
}

?>


<html lang="en">
  <head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <script src="Algorithm\Patient\Oyelami_sort.js"></script>
    <link rel="stylesheet" href="css/tabledesign.css">
    <link rel="stylesheet" href="css/buttona.css">
    
    <!-- <!-- <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" /> --> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    
        <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css"> 
  
    
        <link rel="stylesheet" href="css/tabledesign.css">
    <link rel="stylesheet" href="css/buttona.css">
    <link rel="stylesheet" href="css/button.css">



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> Postnatal Care </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <style >
    .bg-primary {
    background: -webkit-linear-gradient(left, #3f5efb, #fc466b);
}
.list-group-item.active {
    z-index: 2;
    color: #fff;
    background-color: #342ac1;
    border-color: #007bff;
}
.text-primary {
    color: #342ac1!important;
}

.btn-primary{
  background-color: #3c50c1;
  border-color: #3c50c1;
}
  </style>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav mr-auto">
       <li class="nav-item">
        <a class="nav-link" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
    </ul>
  </div>
</nav>
  </head>
  <style type="text/css">
    button:hover{cursor:pointer;}
    #inputbtn:hover{cursor:pointer;}
  </style>
  <body style="padding-top:50px; margin-left:20vw; width:60vw">
  <a type="button" href="admin-panel.php" style="margin-top: 20px; color:#fff;" class="btn btn-primary">Back</a>


    <div class="px-5 ">
                  
                  <br><br><br>
                  <h1><?php echo ucwords($row['title']) ?></h1>
                  <br><br><br>
                  
                  <p class="text-justify"><?php echo $row['body'] ?></p>
                  
                  
              </div>         