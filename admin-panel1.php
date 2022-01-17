<!DOCTYPE html>
<title>Admin Dashboard</title>

<?php 
$con=mysqli_connect("localhost","root","","pmsdb");

include('newfunc.php');

// include('crudroom_modal.php'); 


// $username = $_SESSION['username'];

// echo $username;


if(isset($_POST['docsub'])) {
  $doctor=$_POST['doctor'];
  $dpassword=$_POST['dpassword'];
  $demail=$_POST['demail'];
  // $spec=$_POST['special'];
  $docFees=$_POST['docFees'];
  // $dgender = $_POST['dgender'];
  $docContact = $_POST['docContact'];
  // $docAddress = $_POST['docAddress'];
  $query="insert into midwife_tbl (username,password,email,docFees,docContact)values('$doctor','$dpassword','$demail','$docFees','$docContact')";
  $result=mysqli_query($con,$query);
  if($result)
    {
      echo "<script>alert('Midwife added successfully!');</script>";
      echo '<script>window.location.href = "http://localhost/postnatal-care-system/admin-panel1.php";</script>';
      // header("Location:admin-panel1.php");

  }
}

// content submit
if(isset($_POST['contentsub']))
{
  $title=$_POST['content-title'];
  $body=$_POST['content-body'];
  $category=$_POST['content-category'];
  // $spec=$_POST['special'];
  // $docFees=$_POST['docFees'];
  // $dgender = $_POST['dgender'];
  // $docContact = $_POST['docContact'];
  // $docAddress = $_POST['docAddress'];
  $query="insert into blog_tbl (title,body,category)values('$title','$body','$category')";
  $result=mysqli_query($con,$query);
  if($result)
    {
      echo "<script>alert('Blog added successfully!');</script>";
  }
}

// Add chatroom
if(isset($_POST['addchatroom']))
{
  $chat_name=$_POST['chat_name'];
	$chat_password=$_POST['chat_password'];
	$userid = 1;

  $query="insert into chatroomName_tbl(chat_name, chat_password, date_created, userid) values ('$chat_name', '$chat_password', NOW(), '$userid')";
  $result=mysqli_query($con,$query);
	$cid=mysqli_insert_id($con);



  $query="insert into chat_member (chatroomid, userid) values ('$cid', '$userid')";
  $result=mysqli_query($con,$query);

  if($result)
  {
    echo "<script>alert('Chatroom added successfully!');</script>";
  }
  else{
  echo "<script>alert('Chatroom added successfully!');</script>";
  // echo "<script>alert('Unable to add!');</script>";
}





  // mysqli_query($con,"insert into chatroomName_tbl(chat_name, chat_password, date_created, userid) values ('$chat_name', '$chat_password', NOW(), '$userid')");
	// 		$cid=mysqli_insert_id($conn);
			
	// 		// mysqli_query($conn,"insert into chat_member (chatroomid, userid) values ('$cid', '".$_SESSION['id']."')");
  // mysqli_query($con,"insert into chat_member (chatroomid, userid) values ('$cid', '$userid')");

 
}


if(isset($_POST['docsub1']))
{
  $demail=$_POST['demail'];
  $query="delete from midwife_tbl  where email='$demail';";
  $result=mysqli_query($con,$query);
  if($result)
    {
      echo "<script>alert('Midwife deleted successfully!');</script>";
  }
  else{
    echo "<script>alert('Unable to delete!');</script>";
  }
}

if(isset($_POST['patsub1']))
{
  $fname=$_POST['fname'];
  $query="delete from patient_tbl  where fname='$fname';";
  $result=mysqli_query($con,$query);
  if($result)
    {
      echo "<script>alert('Midwife deleted successfully!');</script>";
  }
  else{
    echo "<script>alert('Unable to delete!');</script>";
  }
}

if(isset($_POST['addpatient'])){
	$fname=$_POST['fname'];
  $lname=$_POST['lname'];
  // $gender=$_POST['gender'];
  $email=$_POST['email'];
  $contact=$_POST['contact'];
	$password=$_POST['password'];
  $cpassword=$_POST['cpassword'];
  $dob=date('Y-m-d',strtotime($_POST['dob']));
  // $patAddress=$_POST['patAddress'];
  if($password==$cpassword){
    // $query="insert into patient_tbl (fname,lname,email,contact,password,cpassword) values ('$fname','$lname','$email','$contact','$password','$cpassword');";
    $query="insert into patient_tbl (fname,lname,email,contact,password,cpassword,child_birth) values ('$fname','$lname','$email','$contact','$password','$cpassword','$dob');";
    $result=mysqli_query($con,$query);
    if($result){
        // $_SESSION['username'] = $_POST['fname']." ".$_POST['lname'];
        // $_SESSION['fname'] = $_POST['fname'];
        // $_SESSION['lname'] = $_POST['lname'];
        // // $_SESSION['gender'] = $_POST['gender'];
        // $_SESSION['contact'] = $_POST['contact'];
        // $_SESSION['email'] = $_POST['email'];
        // // $_SESSION['patAddress'] = $_POST['patAddress'];
        echo "<script>alert('Patient added successfully!');</script>";
        // // echo "<script>window.location.href = 'http://localhost/postnatal-care-system/index.php';</script>";
        // // echo "<script>window.location.href = 'http://localhost/postnatal%20projects/theone/New/Hospital-Management-System-master/admin-panel.php';</script>";
        // header("Location:admin-panel.php");
    } 

    // $query1 = "select * from patient_tbl ;";
    // $result1 = mysqli_query($con,$query1);
    // if($result1){
    //   $_SESSION['pid'] = $row['pid'];
    //   //header("Location:index.php");
    // }

  }
  else{
    // header("Location:error1.php");
    echo "<script>alert('Failed to add patient!');</script>";

  }

  
}






// if(isset($_POST['addchild'])) {
//   $mother_id= 1;
//   $child_fname=$_POST['child_fname'];
//   $child_lname=$_POST['child_lname'];
//   $child_gender=$_POST['child_gender'];
//   $date_of_birth=$_POST['date_of_birth'];
 
//   $query="insert into childinfo_tbl (mother_id,child_lname,child_gender,date_of_birth)values('$mother_id','$child_lname','$child_gender','$date_of_birth')";
//   $result=mysqli_query($con,$query);
//   if($result)
//     {
//       echo "<script>alert('child added successfully!');</script>";

//   }
// }

if(isset($_POST['addchild'])){

  $mother_id= 1;
    $child_fname=$_POST['child_fname'];
    $child_lname=$_POST['child_lname'];
    $child_gender=$_POST['child_gender'];
    $date_of_birth=$_POST['date_of_birth'];


    $query="insert into childinfo_tbl (mother_id,child_fname,child_lname,gender,date_of_birth)values('$mother_id','$child_fname','$child_lname','$child_gender','$date_of_birth')";

    $result=mysqli_query($con,$query);
    if($result){
        echo "<script>alert('Patient added successfully!');</script>";
    }   
}


if(isset($_POST['contentsub1']))
{
  $btitle=$_POST['btitle'];
  $query="delete from blog_tbl  where title='$btitle';";
  $result=mysqli_query($con,$query);
  if($result)
    {
      echo "<script>alert('Blog deleted successfully!');</script>";
  }
  else{
    echo "<script>alert('Unable to delete!');</script>";
  }
}

if(isset($_POST['deleteroom']))
{
  $chat_name=$_POST['roomname'];
  $query="delete from chatroom where chat_name='$chat_name';";
  $result=mysqli_query($con,$query);
  if($result)
    {
      echo "<script>alert('Chatroom removed successfully!');</script>";
  }
  else{
    echo "<script>alert('Unable to delete!');</script>";
  }
}

?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!-- for my table design -->
    <link rel="stylesheet" href="css/tabledesign.css">
    <link rel="stylesheet" href="css/buttona.css">
    <link rel="stylesheet" href="css/button.css">
     
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->


    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">

      <!-- For the chat -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> Postnatal Care </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <script >
    var check = function() {
  if (document.getElementById('dpassword').value ==
    document.getElementById('cdpassword').value) {
    document.getElementById('message').style.color = '#5dd05d';
    document.getElementById('message').innerHTML = 'Matched';
  } else {
    document.getElementById('message').style.color = '#f55252';
    document.getElementById('message').innerHTML = 'Not Matching';
  }
}

    function alphaOnly(event) {
  var key = event.keyCode;
  return ((key >= 65 && key <= 90) || key == 8 || key == 32);
};
  </script>

  <style >
    .bg-primary {
    background: -webkit-linear-gradient(left, #3f5efb, #fc466b);
}

.col-md-4{
  max-width:20% !important;
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

#cpass {
  display: -webkit-box;
}

#list-app{
  font-size:15px;
}

.btn-primary{
  background-color: #3c50c1;
  border-color: #3c50c1;
}
  </style>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav mr-auto">
       <li class="nav-item">
        <!-- <a class="nav-link" href="logout1.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a> -->
        <a class="nav-link" href="home.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
        <!-- <a class="nav-link" href="index.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a> -->
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
  <body style="padding-top:50px;">
   <div class="container-fluid" style="margin-top:50px;">
    <h3 style = "margin-left: 40%; padding-bottom: 20px;font-family: 'IBM Plex Sans', sans-serif; margin-top: -30px;"> WELCOME ADMIN </h3>
    <div class="row">
  <div class="col-md-4" style="max-width:25%;margin-top: 3%;">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-dash-list" data-toggle="list" href="#list-dash" role="tab" aria-controls="home">Dashboard</a>
      <a class="list-group-item list-group-item-action" href="#list-doc" id="list-doc-list"  role="tab"    aria-controls="home" data-toggle="list">Midwife List</a>
      <a class="list-group-item list-group-item-action" href="#list-settings" id="list-adoc-list"  role="tab" data-toggle="list" aria-controls="home">Add Midwife</a>
      <a class="list-group-item list-group-item-action" href="#list-settings1" id="list-ddoc-list"  role="tab" data-toggle="list" aria-controls="home">Delete Midwife</a>
      <a class="list-group-item list-group-item-action" href="#list-pat" id="list-pat-list"  role="tab" data-toggle="list" aria-controls="home">Patient List</a>
      <a class="list-group-item list-group-item-action" href="#list-addpatient" id="list-adoc-list"  role="tab" data-toggle="list" aria-controls="home">Add Patient</a>
      <a class="list-group-item list-group-item-action" href="#list-patdelete" id="list-patdelete-list"  role="tab" data-toggle="list" aria-controls="home">Delete Patient</a>
      <a class="list-group-item list-group-item-action" href="#list-app" id="list-app-list"  role="tab" data-toggle="list" aria-controls="home">Appointment Details</a>
      <a class="list-group-item list-group-item-action" href="#list-pres" id="list-pres-list"  role="tab" data-toggle="list" aria-controls="home">Prescription List</a>
      <a class="list-group-item list-group-item-action" href="#list-contentlist" id="list-contentlist-list"  role="tab" data-toggle="list" aria-controls="home">Blog List</a>
      <a class="list-group-item list-group-item-action" href="#list-contents" id="list-contents-list"  role="tab" data-toggle="list" aria-controls="home">Add Blog</a>
      <a class="list-group-item list-group-item-action" href="#list-contentdelete" id="list-contentdelete-list"  role="tab" data-toggle="list" aria-controls="home">Delete Blog</a>
      <a class="list-group-item list-group-item-action" href="#list-chat" id="list-chat-list"  role="tab" data-toggle="list" aria-controls="home">Chat</a>
      <a class="list-group-item list-group-item-action" href="#list-chatadd" id="list-chatadd-list"  role="tab" data-toggle="list" aria-controls="home">Add/Delete Chatroom</a>
      <a class="list-group-item list-group-item-action" href="#list-inbox" id="list-inbox-list"  role="tab" data-toggle="list" aria-controls="home">Inbox</a>
      <!-- <a class="list-group-item list-group-item-action" href="#list-mes" id="list-mes-list"  role="tab" data-toggle="list" aria-controls="home">Queries</a> -->
      
    </div><br>
  </div>
  <div class="col-md-8" style="margin-top: 3%;">
    <div class="tab-content" id="nav-tabContent" style="width: 950px;">

      <div class="tab-pane fade show active" id="list-dash" role="tabpanel" aria-labelledby="list-dash-list">
        <div class="container-fluid container-fullw bg-white" >
              <div class="row">
               <div class="col-sm-4">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-users fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Midwife List</h4>
                      <script>
                        function clickDiv(id) {
                          document.querySelector(id).click();
                        }
                      </script> 
                      <p class="links cl-effect-1">
                        <a href="#list-doc" onclick="clickDiv('#list-doc-list')">
                          View Midwife
                        </a>
                      </p>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4" style="left: -3%">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body" >
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-users fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Patient List</h4>
                      
                      <p class="cl-effect-1">
                        <a href="#app-hist" onclick="clickDiv('#list-pat-list')">
                          View Patients
                        </a>
                      </p>
                    </div>
                  </div>
                </div>             

                <div class="col-sm-4">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body" >
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Patients' Visits Details</h4>
                    
                      <p class="cl-effect-1">
                        <a href="#app-hist" onclick="clickDiv('#list-app-list')">
                          View Visits
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
                </div>

                <div class="row">
                <div class="col-sm-4" style="left: 13%;margin-top: 5%;">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body" >
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-list-ul fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Prescription List</h4>
                    
                      <p class="cl-effect-1">
                        <a href="#list-pres" onclick="clickDiv('#list-pres-list')">
                          View Prescriptions
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4" style="left: 18%;margin-top: 5%">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body" >
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-plus fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Manage Midwives</h4>
                    
                      <p class="cl-effect-1">
                        <a href="#app-hist" onclick="clickDiv('#list-adoc-list')">Add Midwife</a>
                        &nbsp|
                        <a href="#app-hist" onclick="clickDiv('#list-ddoc-list')">
                          Delete Midwife
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
                </div>


                <div class="row">
               <div class="col-sm-4">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-users fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Manage Blogs</Canvas></h4>
                      <script>
                        function clickDiv(id) {
                          document.querySelector(id).click();
                        }
                      </script> 
                      <p class="cl-effect-1">
                        <a href="#list-contents" onclick="clickDiv('#list-contents-list')">Add Blog</a>
                        &nbsp|
                        <a href="#list-contentlist" onclick="clickDiv('#list-contentlist-list')">
                          Blog List
                        </a>
                      </p>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4" style="left: -3%">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body" >
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-users fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Chats</h4>
                      
                      <p class="cl-effect-1">
                        <a href="#list-chat" onclick="clickDiv('#list-chat-list')">
                          View Chats
                        </a>
                      </p>
                    </div>
                  </div>
                </div>             

                <div class="col-sm-4">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body" >
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Inbox</h4>
                    
                      <p class="cl-effect-1">
                        <a href="#app-inbox" onclick="clickDiv('#list-inbox-list')">
                          View Inbox Messages
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
                </div>
                
              </div>
            </div> 
<!-- Preparing the data
SQL to PHP
PHP to JAVA
-->

<script src="Algorithm\Admin\Oyelami_sort.js"></script>

<?php 
 $query = "select  username, docFees from midwife_tbl ";
$result = mysqli_query($con,$query);

if ($result->num_rows > 0) {
  // output data of each row
  //assigning sql query in array in PHP

  //defining the size of the row
  $num = ($result->num_rows);
  
  //defining row
  $row = $result->fetch_assoc();

  //defining the for loop to assign sql values to each index in array php
  for ($i = 0; $i < $num; $i++){
      //defining the array name
      $username[] = $row["username"];
      $docFees[] = $row["docFees"];
      $row = $result->fetch_assoc();
  }

  //print the content of the array to debug
  for ($i = 0; $i < $num; $i++){
    //defining the array name
    //echo  $username[$i] .  "<br />";
   //echo  $docFees[$i] .  "<br />";
}
}
else {
  echo " "; //0 results";

}
$con->close();
?>

<!--Hidden Sorting Process-->
<script>
//assign to a js variable 
var doc_username_js = <?php echo json_encode($username); ?>;
var doc_username_js_l = doc_username_js.map(doc_username_js => doc_username_js.toLowerCase());
var doc_username_js_count = <?php echo json_encode($username); ?>;
var doc_docFees_js = <?php echo json_encode($docFees); ?>;
var doc_docFees_js64 = new Float64Array(doc_docFees_js);
</script>
<script>
var i = 0 ;
var j = doc_username_js_count.length;
</script>

<script>
  //variable resetter to be used by other call
  var i = 0 ;
  var j = doc_username_js_count.length;
document.getElementById("SortByName").onclick = Oyelami_sort(doc_username_js_l,doc_docFees_js64  ); //this is where to display

</script>
<!--<button id="SortByName" onclick="cocktailSort(doc_username_js_l,doc_docFees_js64 ); Display() ">Sort By Name</button>
-->
<script>
function Display() {
document.write("<br>");
document.write(doc_username_js_l);
document.write("<br>");
document.write(doc_docFees_js64 );
document.write("<br>");
document.write("Does it changed and altered the contents?: " + "<br>");
document.write(doc_docFees_js64 );
document.write("    <----------- Yes, ready for cocktail");
}
</script>

<!--Hidden Sorting Process-->
<script>
//assign to a js variable
//refresher 
var doc_username_js = <?php echo json_encode($username); ?>;
var doc_username_js_l = doc_username_js.map(doc_username_js => doc_username_js.toLowerCase());
var doc_username_js_count = <?php echo json_encode($username); ?>;
var doc_docFees_js = <?php echo json_encode($docFees); ?>;
var doc_docFees_js64 = new Float64Array(doc_docFees_js);
</script>

<script>
  //variable resetter to be used by other call
  var i = 0 ;
  var j = doc_username_js_count.length;
document.getElementById("SortByNumber").onclick = Oyelami_sort(doc_docFees_js64,doc_username_js_l); //this is where to display

</script>
<!--<button id="SortByNumber" onclick="cocktailSort(doc_docFees_js64,doc_username_js_l); Display1()" >Sort By Number</button>
-->
<script>
function Display1() {
    document.write("<br>");
    document.write(doc_username_js_l);
    document.write("<br>");
    document.write(doc_docFees_js64);
    document.write("<br>");
    document.write("Does it changed and altered the contents?: " + "<br>");
    document.write(doc_docFees_js64);
    document.write("    <----------- Yes, ready for cocktailss");
}
</script>

      <div class="tab-pane fade" id="list-doc" role="tabpanel" aria-labelledby="list-home-list">
        <div class="col-md-8">                
         </div>
        
         <br><br>


<div style="margin-top:-110px;" class='title'>
<!-- <h1>Table Sorting in JavaScript (Oyelami + CockTail Sort)</h1> -->
</div>

<!-- <button id="btn100" class="btn btn-primary">Original Order</button>
<button id="btn1" class="btn btn-primary">Sort By Midwife Name</button> -->
<br><br>


<!--table1--><!--table1--><!--table1--><!--table1--><!--table1--><!--table1--><!--table1-->
<script>
            var counter = 0;
            var counterplus = 0;
</script>

<table id="table1" style="width:100%;display:none">

            <script>
              Oyelami_sort(doc_username_js_l,doc_docFees_js64 );
              cocktailSort(doc_username_js_l,doc_docFees_js64);
  </script>
            <tr>
              <th>Midwife Name</th>
              <th>Fees</th>
            </tr>

            <?php 
              //defining conditions
              $con=mysqli_connect("localhost","root","","pmsdb");
              global $con;
              $query = "select username from midwife_tbl ";
              $result = mysqli_query($con,$query);
                        
              while ($row = mysqli_fetch_array($result)){
            ?>

            <tr>
              <td>
                            <script type="text/javascript">
                            document.write(doc_username_js_l[counter]);
                          
                            </script>
              </td>

              <td>
                            <script type="text/javascript">
                            //var number = 123;
                            //document.write(number)
                            document.write(doc_docFees_js64[counter]);
                          counter++;
                            </script>
              </td>
            </tr>
            <?php }
          ?>
</table>



<!--table2--><!--table2--><!--table2--><!--table2--><!--table2--><!--table2--><!--table2-->
<script>
            var counter = 0;
            var counterplus = 0;
</script>
<table id="table2" style="width:100%;display:none">

<script>
              Oyelami_sort(doc_docFees_js64, doc_username_js_l );
              cocktailSort(doc_docFees_js64, doc_username_js_l);
  </script>

<!-- <tr>
    <th>Midwife Name</th>
    <th>Fees</th>
  </tr> -->

  <?php 
    //defining conditions
    $con=mysqli_connect("localhost","root","","pmsdb");
    global $con;
    $query = "select username from midwife_tbl ";
    $result = mysqli_query($con,$query);
              
    while ($row = mysqli_fetch_array($result)){
  ?>

  <tr>
    <td>
                  <script type="text/javascript">
                  //var number = 123;
                  //document.write(number)
                  document.write(doc_username_js_l[counter]);
                  
                 
                  </script>
    </td>

    <td>
                  <script type="text/javascript">
                  //var number = 123;
                  //document.write(number)
                  document.write(doc_docFees_js64[counter]);
                 counter++;
                  </script>
    </td>
  </tr>
  <?php }
?>
</table>




<!--table100-->
<script>
            var counter = 0;
            var counterplus = 0;
</script>
<table id="table100" style="width:100%; ">
<tr>
                    <th scope="col">Midwife Name</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Email</th>
  </tr>

  <?php 
    //defining conditions
    $con=mysqli_connect("localhost","root","","pmsdb");
    global $con;
    $query = "select * from midwife_tbl ";
    $result = mysqli_query($con,$query);
              
    while ($row = mysqli_fetch_array($result)){
      $username = $row['username'];
      $spec = $row['spec'];
      $email = $row['email'];
      $password = $row['password'];
      $docFees = $row['docFees'];
      $gender = $row['gender'];
      $docContact = $row['docContact'];
      $docAddress = $row['docAddress'];

      
      echo "<tr>
        <td>$username</td>
        <td>$docContact</td>
        <td>$email</td>
      </tr>";
    }
  ?>
</table>


<script>
document.getElementById("btn1").addEventListener("click", function(){

  document.getElementById("table1").style.display = "block";
  document.getElementById("table2").style.display = "none";//hide
  document.getElementById("table100").style.display = "none";//hide
});
document.getElementById("btn2").addEventListener("click", function(){
  document.getElementById("table2").style.display = "block";
  document.getElementById("table1").style.display = "none";//hide
  document.getElementById("table100").style.display = "none";//hide
});
document.getElementById("btn100").addEventListener("click", function(){
  document.getElementById("table100").style.display = "block";
  document.getElementById("table1").style.display = "none";//hide
  document.getElementById("table2").style.display = "none";//hide
});
</script>



        <!--Alter later to search by 7 criteria
        
        <div class="col-md-4">
          <label>Search by:</label>
        </div>

                                    <div class="col-md-8">
                                    
                                    <select name="filteringSearch" class="form-control" id="filteringSearch" required="required">
                                        <option value="head"  disabled selected>Filter Search by</option>
                                        <option value="username" name="username">Doctor Name</option>
                                        <option value="spec" name="spec">Specialization</option>
                                        <option value="email" name="email">Email</option>
                                        <option value="password" name="password">Password</option>
                                        <option value="fees" name="fees">Fees</option>
                                        <option value="gender" name="gender">Gender</option>
                                        <option value="docContact" name="docContact">Contact</option>
                                        <option value="docAddress" name="docAddress">Address</option>
                                        </select>

                                        </div><br><br>
        <div class="col-md-10"><input type="text" name="admin-query-doc" placeholder="Enter here" class = "form-control"></div>
        <div class="col-md-2"><input type="submit" name="doctor_search_submit" class="btn btn-primary" value="Search"></div></div>
      </form>
    </div><br>-->

    <!--Sort by 
    <div class="col-md-4"><label>Sort by:</label></div>
    <form class="form-group" action="doctorsearch.php" method="post">
                                    <div class="col-md-8">
                                    <select name="filteringSort" class="form-control" id="filteringSort" required="required">
                                        <option value="head"  disabled selected>Filter Sort by</option>
                                        <option value="username" name="username">Doctor Name</option>
                                        <option value="fees" name="fees">Fees</option>
                                        </select>
                                        </div>
        <br><div class="col-md-2"><input type="submit" name="doctor_sort_submit" class="btn btn-primary" value="Sort"></div></div>
      </form>
    </div>
    <br>-->



<!--Doctor List 
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Doctor Name</th>
                    <th scope="col">Specialization</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Fees</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Address</th>
                  </tr>
                </thead>
                <tbody>-->
                  
                <!--Displayer
                  <?php 
                    /*$con=mysqli_connect("localhost","root","","pmsdb");
                    global $con;
                    $query = "select * from midwife_tbl ";
                    $result = mysqli_query($con,$query);
                    while ($row = mysqli_fetch_array($result)){
                      $username = $row['username'];
                      $spec = $row['spec'];
                      $email = $row['email'];
                      $password = $row['password'];
                      $docFees = $row['docFees'];
                      $gender = $row['gender'];
                      $docContact = $row['docContact'];
                      $docAddress = $row['docAddress'];

                      
                      echo "<tr>
                        <td>$username</td>
                        <td>$spec</td>
                        <td>$email</td>
                        <td>$password</td>
                        <td>$docFees</td>
                        <td>$gender</td>
                        <td>$docContact</td>
                        <td>$docAddress</td>
                      </tr>";
                    }*/
                  ?>
                </tbody>
              </table>
        <br>-->
      </div><!-- end of the div for doc-->

  <!--patient-->  
  
<?php 
 $query = "select  fname, lname from patient_tbl ";
$result = mysqli_query($con,$query);

if ($result->num_rows > 0) {
  // output data of each row
  //assigning sql query in array in PHP

  //defining the size of the row
  $num = ($result->num_rows);
  
  //defining row
  $row = $result->fetch_assoc();

  //defining the for loop to assign sql values to each index in array php
  for ($i = 0; $i < $num; $i++){
      //defining the array name
      $fname[] = $row["fname"];
      $lname[] = $row["lname"];
      $row = $result->fetch_assoc();
  }

  //print the content of the array to debug
  for ($i = 0; $i < $num; $i++){
    //defining the array name
    //echo  $username[$i] .  "<br />";
   //echo  $docFees[$i] .  "<br />";
}
}
else {
  echo " "; //0 results";

}
$con->close();
?>


<!--Hidden Sorting Process-->
<script>
//assign to a js variable 

//main counter
var pat_fname_js_count = <?php echo json_encode($fname); ?>;


var pat_fname_js = <?php echo json_encode($fname); ?>;
var pat_fname_js_l = pat_fname_js.map(pat_fname_js => pat_fname_js.toLowerCase());

var pat_lname_js = <?php echo json_encode($lname); ?>;
var pat_lname_js_l = pat_lname_js.map(pat_lname_js => pat_lname_js.toLowerCase());

</script>


<script>
var i = 0 ;
var j = pat_fname_js_count.length;
</script>

<script>
  //variable resetter to be used by other call
  var i = 0 ;
  var j = pat_fname_js_count.length;
document.getElementById("SortByfname").onclick = Oyelami_sort(pat_fname_js_l,pat_lname_js_l  ); //this is where to display

</script>
<!--<button id="SortByfname" onclick="cocktailSort(pat_fname_js_l,pat_lname_js_l ); Display2() ">Sort By First Name</button>
-->
<script>
function Display2() {
document.write("<br>");
document.write(pat_fname_js_l);
document.write("<br>");
document.write(pat_lname_js_l );
document.write("<br>");
document.write("FNameFNameDoes it changed and altered the contents?: FName " + "<br>");
document.write(pat_lname_js_l );
document.write("    <----------- Yes, ready for cocktail");
}
</script>





<!--Hidden Sorting Process-->
<script>
//assign to a js variable
//refresher 
//main counter
var pat_fname_js_count = <?php echo json_encode($fname); ?>;


var pat_fname_js = <?php echo json_encode($fname); ?>;
var pat_fname_js_l = pat_fname_js.map(pat_fname_js => pat_fname_js.toLowerCase());

var pat_lname_js = <?php echo json_encode($lname); ?>;
var pat_lname_js_l = pat_lname_js.map(pat_lname_js => pat_lname_js.toLowerCase());
</script>



<script>
  //variable resetter to be used by other call
  var i = 0 ;
  var j = pat_fname_js_count.length;
document.getElementById("SortBylname").onclick = Oyelami_sort(pat_lname_js_l,pat_fname_js_l); //this is where to display

</script>
<!--<button id="SortBylname" onclick="cocktailSort(pat_lname_js_l,pat_fname_js_l); Display3()" >Sort By Last Name</button>
-->

<script>
function Display3() {
    document.write("<br>");
    document.write(pat_fname_js_l);
    document.write("<br>");
    document.write(pat_lname_js_l);
    document.write("<br>");
    document.write("LnameLnameLnameDoes it changed and altered the contents? Lname: " + "<br>");
    document.write(pat_lname_js_l);
    document.write("    <----------- Yes, ready for cocktailss");
}
</script>
  



    <div class="tab-pane fade" id="list-pat" role="tabpanel" aria-labelledby="list-pat-list">
<!--
       <div class="col-md-8">
      <form class="form-group" action="patientsearch.php" method="post">
        <div class="row">
        <div class="col-md-10"><input type="text" name="patient_contact" placeholder="Enter Contact" class = "form-control"></div>
        <div class="col-md-2"><input type="submit" name="patient_search_submit" class="btn btn-primary" value="Search"></div></div>
      </form>
    </div>
                  -->

                  <div style="margin-top: -135px;" class="col-md-8">
                      
                      </div>
             
                      <!-- <div class = "frame">
             
                     <h2>Search by Patient:</h2>
                     <button class="custom-btn btn-2" onclick="location.href='BinarySearch/A_pat_search_name.php'" >First N.</button>
                     <button class="custom-btn btn-4" onclick="location.href='BinarySearch/A_pat_search_lname.php'" >Last N.</button>
                     <button class="custom-btn btn-14" onclick="location.href='BinarySearch/A_pat_search_email.php'" > Email</button>
           
                     <!--<button class="custom-btn btn-14">Read More</button>
                
                      </div> -->
                      <br><br>
             
             



         <!--Sort by
    <div class="col-md-4">
      <label>Sort by:</label>
    </div>

    <div class="col-md-8">
    <form class="form-group" action="doctorsearch.php" method="post">
                                    <select name="filteringSort" class="form-control" id="filteringSort" required="required">
                                        <option value="head"  disabled selected>Filter Sort by</option>
                                        <option value="username" name="username">First Name</option>
                                        <option value="fees" name="fees">Last Name</option>
                                        <option value="fees" name="fees">Gender</option>
                                        <option value="fees" name="fees">Email</option>
                                        <option value="fees" name="fees">Patient ID</option>
                                        </select>
        <div class="col-md-2"><input type="submit" name="doctor_sort_submit" class="btn btn-primary" value="Sort"></div>
      </form>
    </div> -->
    <br>


        <!--
              <table class="table table-hover">
                <thead>
                  <tr>
                  <th scope="col">Patient ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Password</th>
                  </tr>
                </thead>
                <tbody>

-->


<div class='title'>
<!-- <h1>Table Sorting in JavaScript (Oyelami + CockTail Sort)</h1> -->
</div>

<button id="btn1100" class="btn btn-primary">Original Order</button>
<button id="btn11" class="btn btn-primary">Sort By Patient's First Name</button>
<button id="btn22" class="btn btn-primary">Sort By Patient's Last Name</button>
<br><br>


<!--table1--><!--table1--><!--table1--><!--table1--><!--table1--><!--table1--><!--table1-->
<script>
            var counter = 0;
            var counterplus = 0;
</script>

<table id="table11" style="width:100%;display:none">

            <script>
              Oyelami_sort(pat_fname_js_l,pat_lname_js_l );
              cocktailSort(pat_fname_js_l,pat_lname_js_l);
  </script>
            <tr>
              <th>First Name</th>
              <th>Last Name</th>
            </tr>

            <?php 
              //defining conditions
              $con=mysqli_connect("localhost","root","","pmsdb");
              global $con;
              $query = "select fname from patient_tbl ";
              $result = mysqli_query($con,$query);
                        
              while ($row = mysqli_fetch_array($result)){
            ?>

            <tr>
              <td>
                            <script type="text/javascript">
                            document.write(pat_fname_js_l[counter]);
                          
                            </script>
              </td>

              <td>
                            <script type="text/javascript">
                            //var number = 123;
                            //document.write(number)
                            document.write(pat_lname_js_l[counter]);
                          counter++;
                            </script>
              </td>
            </tr>
            <?php }
          ?>
</table>



<!--table2--><!--table2--><!--table2--><!--table2--><!--table2--><!--table2--><!--table2-->
<script>
            var counter = 0;
            var counterplus = 0;
</script>
<table id="table22" style="width:100%;display:none">

<script>
              Oyelami_sort(pat_lname_js_l, pat_fname_js_l );
              cocktailSort(pat_lname_js_l, pat_fname_js_l);
  </script>

<tr>
    <th>First Name</th>
    <th>Last Name</th>
  </tr>

  <?php 
    //defining conditions
    $con=mysqli_connect("localhost","root","","pmsdb");
    global $con;
    $query = "select fname from patient_tbl ";
    $result = mysqli_query($con,$query);
              
    while ($row = mysqli_fetch_array($result)){
  ?>

  <tr>
    <td>
                  <script type="text/javascript">
                  //var number = 123;
                  //document.write(number)
                  document.write(pat_fname_js_l[counter]);
                  
                 
                  </script>
    </td>

    <td>
                  <script type="text/javascript">
                  //var number = 123;
                  //document.write(number)
                  document.write(pat_lname_js_l[counter]);
                 counter++;
                  </script>
    </td>
  </tr>
  <?php }
?>
</table>




<!--table100-->
<script>
            var counter = 0;
            var counterplus = 0;
</script>
<table id="table1100" style="width:100%; ">
<tr>
                    <!-- <th scope="col">Patient ID</th> -->
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <!-- <th scope="col">Gender</th> -->
                    <!-- <th scope="col">Email</th> -->
                    <th scope="col">Contact</th>
                    <th scope="col">Action</th>
                  
  </tr>

  <?php 
    //defining conditions
    $con=mysqli_connect("localhost","root","","pmsdb");
    global $con;
    $query = "select * from patient_tbl ";
    $result = mysqli_query($con,$query);
              
    while ($row = mysqli_fetch_array($result)){
      $pid = $row['pid'];
      $fname = $row['fname'];
      $lname = $row['lname'];
      $gender = $row['gender'];
      $email = $row['email'];
      $contact = $row['contact'];
     

      
      echo "<tr>
        <td>$fname</td>
        <td>$lname</td>
        <td>$contact</td>
        <td>
        
        <form target='_blank' action='patientProfile2.php' method='get'>

        <a  href='patientProfile2.php?ID='".$row['pid']."'>
        <input type ='hidden' name='ID' value='".$row['pid']."'/>
        <input target='_blank' type = 'submit' onclick='alert('Bill Paid Succesful');' name ='' class = 'btn btn-success' value='View Details'/>
        </a>
      </form>

        </td>
      </tr>";
    }
  ?>
</table>


<script>
document.getElementById("btn11").addEventListener("click", function(){

  document.getElementById("table11").style.display = "block";
  document.getElementById("table22").style.display = "none";//hide
  document.getElementById("table1100").style.display = "none";//hide
});
document.getElementById("btn22").addEventListener("click", function(){
  document.getElementById("table22").style.display = "block";
  document.getElementById("table11").style.display = "none";//hide
  document.getElementById("table1100").style.display = "none";//hide
});
document.getElementById("btn1100").addEventListener("click", function(){
  document.getElementById("table1100").style.display = "block";
  document.getElementById("table11").style.display = "none";//hide
  document.getElementById("table22").style.display = "none";//hide
});
</script>



        <!--Alter later to search by 7 criteria
        
        <div class="col-md-4">
          <label>Search by:</label>
        </div>

                                    <div class="col-md-8">
                                    
                                    <select name="filteringSearch" class="form-control" id="filteringSearch" required="required">
                                        <option value="head"  disabled selected>Filter Search by</option>
                                        <option value="username" name="username">Doctor Name</option>
                                        <option value="spec" name="spec">Specialization</option>
                                        <option value="email" name="email">Email</option>
                                        <option value="password" name="password">Password</option>
                                        <option value="fees" name="fees">Fees</option>
                                        <option value="gender" name="gender">Gender</option>
                                        <option value="docContact" name="docContact">Contact</option>
                                        <option value="docAddress" name="docAddress">Address</option>
                                        </select>

                                        </div><br><br>
        <div class="col-md-10"><input type="text" name="admin-query-doc" placeholder="Enter here" class = "form-control"></div>
        <div class="col-md-2"><input type="submit" name="doctor_search_submit" class="btn btn-primary" value="Search"></div></div>
      </form>
    </div><br>-->

    <!--Sort by 
    <div class="col-md-4"><label>Sort by:</label></div>
    <form class="form-group" action="doctorsearch.php" method="post">
                                    <div class="col-md-8">
                                    <select name="filteringSort" class="form-control" id="filteringSort" required="required">
                                        <option value="head"  disabled selected>Filter Sort by</option>
                                        <option value="username" name="username">Doctor Name</option>
                                        <option value="fees" name="fees">Fees</option>
                                        </select>
                                        </div>
        <br><div class="col-md-2"><input type="submit" name="doctor_sort_submit" class="btn btn-primary" value="Sort"></div></div>
      </form>
    </div>
    <br>-->



<!--Doctor List 
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Doctor Name</th>
                    <th scope="col">Specialization</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Fees</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Address</th>
                  </tr>
                </thead>
                <tbody>-->
                  
                <!--Displayer
                  <?php 
                    /*$con=mysqli_connect("localhost","root","","pmsdb");
                    global $con;
                    $query = "select * from midwife_tbl ";
                    $result = mysqli_query($con,$query);
                    while ($row = mysqli_fetch_array($result)){
                      $username = $row['username'];
                      $spec = $row['spec'];
                      $email = $row['email'];
                      $password = $row['password'];
                      $docFees = $row['docFees'];
                      $gender = $row['gender'];
                      $docContact = $row['docContact'];
                      $docAddress = $row['docAddress'];

                      
                      echo "<tr>
                        <td>$username</td>
                        <td>$spec</td>
                        <td>$email</td>
                        <td>$password</td>
                        <td>$docFees</td>
                        <td>$gender</td>
                        <td>$docContact</td>
                        <td>$docAddress</td>
                      </tr>";
                    }*/
                  ?>
                </tbody>
              </table>
        <br>-->
      </div><!-- end of the div for doc-->



      <!-- Delete Patient -->
      <div class="tab-pane fade" id="list-patdelete" role="tabpanel" aria-labelledby="list-patdelete-list">


<form class="form-group" method="post" action="admin-panel1.php">
          <div class="row">
          
                  <div class="col-md-4"><label>First Name:</label></div>
                  <div class="col-md-8"><input type="text"  class="form-control" name="fname" required></div><br><br>
                  
                </div>
          <input style="background-color: #3c50c1;" type="submit" name="patsub1" value="Delete Patient" class="btn btn-primary" onclick="confirm('do you really want to delete?')">
        </form>
                  
      </div><!-- end of the div for doc-->
    





<!--prescription sort -->



<?php 
 $query = "select  lname, disease from prescription_tbl ";
$result = mysqli_query($con,$query);

if ($result->num_rows > 0) {
  // output data of each row
  //assigning sql query in array in PHP

  //defining the size of the row
  $num = ($result->num_rows);
  
  //defining row
  $row = $result->fetch_assoc();

  //resetter set lname to empty value again, reintialize to main state
  $lname = array();

  //defining the for loop to assign sql values to each index in array php
  for ($i = 0; $i < $num; $i++){
      //defining the array name
      $lname[] = $row["lname"];
      $disease[] = $row["disease"];
      $row = $result->fetch_assoc();
  }

  //print the content of the array to debug
  for ($i = 0; $i < $num; $i++){
    //defining the array name
    //echo  $username[$i] .  "<br />";
   //echo  $docFees[$i] .  "<br />";
}
}
else {
  echo " "; //0 results";

}
$con->close();
?>


<!--Hidden Sorting Process-->
<script>
//assign to a js variable 

//main counter
var pres_lname_js_count = <?php echo json_encode($lname); ?>;


var pres_lname_js = <?php echo json_encode($lname); ?>;
var pres_lname_js_l = pres_lname_js.map(pres_lname_js => pres_lname_js.toLowerCase());

var pres_disease_js = <?php echo json_encode($disease); ?>;
var pres_disease_js_l = pres_disease_js.map(pres_disease_js => pres_disease_js.toLowerCase());

</script>


<script>
var i = 0 ;
var j = pres_lname_js_count.length;
</script>

<script>
  //variable resetter to be used by other call
  var i = 0 ;
  var j = pres_lname_js_count.length;
document.getElementById("SortBypreslname").onclick = Oyelami_sort(pres_lname_js_l,pres_disease_js_l  ); //this is where to display

</script>
<!--<button id="SortBypreslname" onclick="cocktailSort(pres_lname_js_l,pres_disease_js_l ); Display8() ">Sort By Pres Last Name</button>
-->
<script>
function Display8() {
document.write("<br>");
document.write(pres_lname_js_l);
document.write("<br>");
document.write(pres_disease_js_l );
document.write("<br>");
document.write("FNameFNameDoes it changed and altered the contents?: FName " + "<br>");
document.write(pres_disease_js_l );
document.write("    <----------- Yes, ready for cocktail");
}
</script>





<!--Hidden Sorting Process-->
<script>
//assign to a js variable
//refresher 
//main counter
var pres_lname_js_count = <?php echo json_encode($lname); ?>;


var pres_lname_js = <?php echo json_encode($lname); ?>;
var pres_lname_js_l = pres_lname_js.map(pres_lname_js => pres_lname_js.toLowerCase());

var pres_disease_js = <?php echo json_encode($disease); ?>;
var pres_disease_js_l = pres_disease_js.map(pres_disease_js => pres_disease_js.toLowerCase());
</script>



<script>
  //variable resetter to be used by other call
  var i = 0 ;
var j = pres_lname_js_count.length;
document.getElementById("SortBypresDisease").onclick = Oyelami_sort(pres_disease_js_l,pres_lname_js_l); //this is where to display

</script>
<!--<button id="SortBypresDisease" onclick="cocktailSort(pres_disease_js_l,pres_lname_js_l); Display9()" >Sort By Patient's Disease</button>
-->
<script>
function Display9() {
    document.write("<br>");
    document.write(pres_lname_js_l);
    document.write("<br>");
    document.write(pres_disease_js_l);
    document.write("<br>");
    document.write("LnameLnameLnameDoes it changed and altered the contents? Lname: " + "<br>");
    document.write(pres_disease_js_l);
    document.write("    <----------- Yes, ready for cocktailss");
}
</script>






<div class="tab-pane fade" id="list-pres" role="tabpanel" aria-labelledby="list-pres-list">

<div style="margin-top: -110px;" class="col-md-8">
                      
                      </div>
                      <br><br>
      <!--  <div class="row">-->



      <div class='title'>
<!-- <h1>Table Sorting in JavaScript (Oyelami + CockTail Sort)</h1> -->
</div>

<button id="btn111100" class="btn btn-primary">Original Order</button>
<button id="btn1111" class="btn btn-primary">Sort By Patient's Last Name</button>
<button id="btn2222" class="btn btn-primary">Sort By Patient's Disease</button>
<br><br>


<!--table1--><!--table1--><!--table1--><!--table1--><!--table1--><!--table1--><!--table1-->
<script>
            var counter = 0;
            var counterplus = 0;
</script>

<table id="table1111" style="width:100%;display:none">

            <script>
              Oyelami_sort(pres_lname_js,pres_disease_js_l );
              cocktailSort(pres_lname_js,pres_disease_js_l);
  </script>
            <tr>
              <th>Patient's Last Name</th>
              <th>Patient's Disease</th>
            </tr>

            <?php 
              //defining conditions
              $con=mysqli_connect("localhost","root","","pmsdb");
              global $con;
              $query = "select lname from prescription_tbl ";
              $result = mysqli_query($con,$query);
                        
              while ($row = mysqli_fetch_array($result)){
            ?>

            <tr>
              <td>
                            <script type="text/javascript">
                            document.write(pres_lname_js[counter]);
                          
                            </script>
              </td>

              <td>
                            <script type="text/javascript">
                            //var number = 123;
                            //document.write(number)
                            document.write(pres_disease_js_l[counter]);
                          counter++;
                            </script>
              </td>
            </tr>
            <?php }
          ?>
</table>



<!--table2--><!--table2--><!--table2--><!--table2--><!--table2--><!--table2--><!--table2-->
<script>
            var counter = 0;
            var counterplus = 0;
</script>
<table id="table2222" style="width:100%;display:none">

<script>
              Oyelami_sort(pres_disease_js_l, pres_lname_js );
              cocktailSort(pres_disease_js_l, pres_lname_js);
  </script>

<tr>
    <th>Patient's Last Name</th>
    <th>Patient's Disease</th>
  </tr>

  <?php 
    //defining conditions
    $con=mysqli_connect("localhost","root","","pmsdb");
    global $con;
    $query = "select lname from prescription_tbl ";
    $result = mysqli_query($con,$query);
              
    while ($row = mysqli_fetch_array($result)){
  ?>

  <tr>
    <td>
                  <script type="text/javascript">
                  //var number = 123;
                  //document.write(number)
                  document.write(pres_lname_js[counter]);
                  
                 
                  </script>
    </td>

    <td>
                  <script type="text/javascript">
                  //var number = 123;
                  //document.write(number)
                  document.write(pres_disease_js_l[counter]);
                 counter++;
                  </script>
    </td>
  </tr>
  <?php }
?>
</table>




<!--table100-->
<script>
            var counter = 0;
            var counterplus = 0;
</script>
<table id="table111100" style="width:100%; ">
<tr>

                    <th scope="col">Doctor</th>
                    <!-- <th scope="col">Patient ID</th> -->
                    <!-- <th scope="col">Appointment ID</th> -->
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Disease</th>
                    <th scope="col">Allergy</th>
                    <!-- <th scope="col">Prescription</th> -->
                  
  </tr>

  <?php 
    //defining conditions
    $con=mysqli_connect("localhost","root","","pmsdb");
    global $con;
    $query = "select * from prescription_tbl ";
    $result = mysqli_query($con,$query);
              
    while ($row = mysqli_fetch_array($result)){
      $doctor = $row['doctor'];
      $pid = $row['pid'];
      $ID = $row['ID'];
      $fname = $row['fname'];
      $lname = $row['lname'];
      $disease = $row['disease'];
      $allergy = $row['allergy'];
      $pres = $row['prescription'];
     

      
      echo "<tr>
                        <td>$doctor</td>
                        <td>$fname</td>
                        <td>$lname</td>
                        <td>$disease</td>
                        <td>$allergy</td>
                      </tr>";

    }
  ?>
</table>


<script>
document.getElementById("btn1111").addEventListener("click", function(){

  document.getElementById("table1111").style.display = "block";
  document.getElementById("table2222").style.display = "none";//hide
  document.getElementById("table111100").style.display = "none";//hide
});
document.getElementById("btn2222").addEventListener("click", function(){
  document.getElementById("table2222").style.display = "block";
  document.getElementById("table1111").style.display = "none";//hide
  document.getElementById("table111100").style.display = "none";//hide
});
document.getElementById("btn111100").addEventListener("click", function(){
  document.getElementById("table111100").style.display = "block";
  document.getElementById("table1111").style.display = "none";//hide
  document.getElementById("table2222").style.display = "none";//hide
});
</script>


</div>
<br>









        


























<!--Appoinment Sort -->







  
<?php 
$pid = array();
$doctor = array();
 $query = "select  pid, doctor from appointment_tbl";
$result = mysqli_query($con,$query);

if ($result->num_rows > 0) {
  // output data of each row
  //assigning sql query in array in PHP

  //defining the size of the row
  $num = ($result->num_rows);
  
  //defining row
  $row = $result->fetch_assoc();

  //defining the for loop to assign sql values to each index in array php
  for ($i = 0; $i < $num; $i++){
      //defining the array name


      $pid[] = $row["pid"];
      $doctor[] = $row["doctor"];
      $row = $result->fetch_assoc();
  }

  //print the content of the array to debug
  for ($i = 0; $i < $num; $i++){
    //defining the array name
    //echo  $username[$i] .  "<br />";
   //echo  $docFees[$i] .  "<br />";
}
}
else {
  echo " "; //0 results";

}
$con->close();
?>


<!--Hidden Sorting Process-->
<script>
//assign to a js variable 

//main counter
var app_pid_js_count = <?php echo json_encode($pid); ?>;


var app_pid_js = <?php echo json_encode($pid); ?>;
var app_pid_js64 = new Float64Array(app_pid_js);

var app_doctor_js = <?php echo json_encode($doctor); ?>;
var app_doctor_js_l = app_doctor_js.map(app_doctor_js => app_doctor_js.toLowerCase());

</script>


<script>
var i = 0 ;
var j = app_pid_js_count.length;
</script>

<script>
  //variable resetter to be used by other call
  var i = 0 ;
  var j = app_pid_js_count.length;
document.getElementById("SortByappID").onclick = Oyelami_sort(app_pid_js64,app_doctor_js_l  ); //this is where to display

</script>
<!--<button id="SortByappID" onclick="cocktailSort(app_pid_js64,app_doctor_js_l ); Display6() ">Sort By Patient ID - Appointment</button>
-->
<script>
function Display6() {
document.write("<br>");
document.write(app_pid_js64);
document.write("<br>");
document.write(app_doctor_js_l );
document.write("<br>");
document.write("FNameFNameDoes it changed and altered the contents?: FName " + "<br>");
document.write(app_doctor_js_l );
document.write("    <----------- Yes, ready for cocktail");
}
</script>
<!--above code is done -->




<!--Hidden Sorting Process-->
<script>
//assign to a js variable
//refresher 
//main counter
var app_pid_js_count = <?php echo json_encode($pid); ?>;


var app_pid_js = <?php echo json_encode($pid); ?>;
var app_pid_js64 = new Float64Array(app_pid_js);

var app_doctor_js = <?php echo json_encode($doctor); ?>;
var app_doctor_js_l = app_doctor_js.map(app_doctor_js => app_doctor_js.toLowerCase());
</script>



<script>
  //variable resetter to be used by other call
  var i = 0 ;
  var j = app_pid_js_count.length;
document.getElementById("SortByappDoctor").onclick = Oyelami_sort(app_doctor_js_l,app_pid_js64); //this is where to display

</script>
<!--<button id="SortByappDoctor" onclick="cocktailSort(app_doctor_js_l,app_pid_js64); Display7()" >Sort By Patient's Doctor - Appointment</button>
-->

<script>
function Display7() {
    document.write("<br>");
    document.write(app_pid_js64);
    document.write("<br>");
    document.write(app_doctor_js_l);
    document.write("<br>");
    document.write("LnameLnameLnameDoes it changed and altered the contents? Lname: " + "<br>");
    document.write(app_doctor_js_l);
    document.write("    <----------- Yes, ready for cocktailss");
}
</script>


<!--maybe an error to displayN()
-->





      <div class="tab-pane fade" id="list-app" role="tabpanel" aria-labelledby="list-pat-list">

       

    <div style="margin-top:-130px;" class="col-md-8">
                      
                      </div>
             
                  
                      <br><br>
             



    <div class='title'>
<!-- <h1>Table Sorting in JavaScript (Oyelami + CockTail Sort)</h1> -->
</div>

<button id="btn11100" class="btn btn-primary">Original Order</button>
<button id="btn111" class="btn btn-primary">Sort By Patient ID - Appointment</button>
<button id="btn222" class="btn btn-primary">Sort By Patient's Doctor - Appointment</button>
<br><br>


<!--table1--><!--table1--><!--table1--><!--table1--><!--table1--><!--table1--><!--table1-->
<script>
            var counter = 0;
            var counterplus = 0;
</script>

<table id="table111" style="width:100%;display:none">

            <script>
              Oyelami_sort(app_pid_js64,app_doctor_js_l );
              cocktailSort(app_pid_js64,app_doctor_js_l);
  </script>
            <tr>
              <th>Patient PID</th>
              <th>Patient's Doctor</th>
            </tr>

            <?php 
              //defining conditions
              $con=mysqli_connect("localhost","root","","pmsdb");
              global $con;
              $query = "select pid from appointment_tbl";
              $result = mysqli_query($con,$query);
                        
              while ($row = mysqli_fetch_array($result)){
            ?>

            <tr>
              <td>
                            <script type="text/javascript">
                            document.write(app_pid_js64[counter]);
                          
                            </script>
              </td>

              <td>
                            <script type="text/javascript">
                            //var number = 123;
                            //document.write(number)
                            document.write(app_doctor_js_l[counter]);
                          counter++;
                            </script>
              </td>
            </tr>
            <?php }
          ?>
</table>



<!--table2--><!--table2--><!--table2--><!--table2--><!--table2--><!--table2--><!--table2-->
<script>
            var counter = 0;
            var counterplus = 0;
</script>
<table id="table222" style="width:100%;display:none">

<script>

              Oyelami_sort(app_doctor_js_l, app_pid_js64 );
              cocktailSort(app_doctor_js_l, app_pid_js64);
  </script>

<tr>
    <th>Patient ID</th>
    <th>patient's Doctor</th>
  </tr>

  <?php 
    //defining conditions
    $con=mysqli_connect("localhost","root","","pmsdb");
    global $con;
    $query = "select pid from appointment_tbl";
    $result = mysqli_query($con,$query);
              
    while ($row = mysqli_fetch_array($result)){
  ?>

  <tr>
    <td>
                  <script type="text/javascript">
                  //var number = 123;
                  //document.write(number)
                  document.write(app_pid_js64[counter]);
                  
                 
                  </script>
    </td>

    <td>
                  <script type="text/javascript">
                  //var number = 123;
                  //document.write(number)
                  document.write(app_doctor_js_l[counter]);
                 counter++;
                  </script>
    </td>
  </tr>
  <?php }
?>
</table>




<!--table100-->
<script>
            var counter = 0;
            var counterplus = 0;
</script>
<table id="table11100" style="width:100%; ">
<tr>



                    <!-- <th scope="col">Appointment ID</th>
                    <th scope="col">Patient ID</th> -->
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <!-- <th scope="col">Gender</th> -->
                    <!-- <th scope="col">Email</th> -->
                    <th scope="col">Contact</th>
                    <th scope="col">Midwife Name</th>
                    <!-- <th scope="col">Consultancy Fees</th> -->
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Appointment Time</th>
                    <th scope="col">Appointment Status</th>
                  


  </tr>

  <?php 
    //defining conditions
    $con=mysqli_connect("localhost","root","","pmsdb");
    global $con;
    $query = "select * from appointment_tbl";
    $result = mysqli_query($con,$query);
        /*      
    while ($row = mysqli_fetch_array($result)){
      $pid = $row['pid'];
      $ID = $row['ID'];
      $fname = $row['fname'];
      $lname = $row['lname'];
      $gender = $row['gender'];
      $email = $row['email'];
      $contact = $row['contact'];
      $doctor = $row['doctor'];
      $docFees = $row['docFees'];
      $appdate = $row['appdate'];
      $apptime = $row['apptime'];


      
      echo "<tr>
        <td>$pid</td>
        <td>$ID</td>
        <td>$fname</td>
        <td>$lname</td>
        <td>$gender</td>
        <td>$email</td>
        <td>$contact</td>
        <td>$doctor</td>
        <td>$docFees</td>
        <td>$appdate</td>
        <td>$apptime</td>
        <td>
                    if((.$row['userStatus']==1) && (.$row['doctorStatus']==1))  
                    {
                      echo 'Active';
                    }
                    if(($row['userStatus']==0) && ($row['doctorStatus']==1))  
                    {
                      echo 'Cancelled by Patient';
                    }

                    if(($row['userStatus']==1) && ($row['doctorStatus']==0))  
                    {
                      echo 'Cancelled by Doctor';
                    }
                        </td>

      </tr>";
    }
  ?>*/
  while ($row = mysqli_fetch_array($result)){
    ?>
        <tr>
    
          <td><?php echo $row['fname'];?></td>
          <td><?php echo $row['lname'];?></td>
          <td><?php echo $row['contact'];?></td>
          <td><?php echo $row['doctor'];?></td>
          <td><?php echo $row['appdate'];?></td>
          <td><?php echo $row['apptime'];?></td>
          <td>
      <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
      {
        echo "Active";
      }
      if(($row['userStatus']==0) && ($row['doctorStatus']==1))  
      {
        echo "Cancelled by Patient";
      }

      if(($row['userStatus']==1) && ($row['doctorStatus']==0))  
      {
        echo "Cancelled by Doctor";
      }
          ?></td>
        </tr>
      <?php } ?>
  </tbody>

</table>


<script>
document.getElementById("btn111").addEventListener("click", function(){

  document.getElementById("table111").style.display = "block";
  document.getElementById("table222").style.display = "none";//hide
  document.getElementById("table11100").style.display = "none";//hide
});
document.getElementById("btn222").addEventListener("click", function(){
  document.getElementById("table222").style.display = "block";
  document.getElementById("table111").style.display = "none";//hide
  document.getElementById("table11100").style.display = "none";//hide
});
document.getElementById("btn11100").addEventListener("click", function(){
  document.getElementById("table11100").style.display = "block";
  document.getElementById("table111").style.display = "none";//hide
  document.getElementById("table222").style.display = "none";//hide
});
</script>



        <br>
      </div>





<div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>






      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
        <form class="form-group" method="post" action="admin-panel1.php">
          <div class="row">
          <div class="col-md-4"><label>Name:</label></div>
                                    <div class="col-md-8"><input placeholder="Name" type="text" class="form-control" name="doctor" onkeydown="return alphaOnly(event);" required></div><br><br>
                                    
                                    <div class="col-md-4"><label>Contact #:</label></div>
                                    <div class="col-md-8"><input placeholder="Contact Number" type="text" class="form-control"  name="docContact" required></div><br><br>

                                    <div class="col-md-4"></div>
                                    <div class="col-md-8"><input type="hidden" class="form-control"  name="docAddress" required></div><br><br>

                                    


                                    <div class="col-md-4"></div>
                                    <div class="col-md-8">
                                    <!-- <select name="special" class="form-control" id="special" required="required">
                                        <option value="head" name="spec" disabled selected>Select Specialization</option>
                                        <option value="General" name="spec">General</option>
                                        <option value="Cardiologist" name="spec">Cardiologist</option>
                                        <option value="Neurologist" name="spec">Neurologist</option>
                                        <option value="Pediatrician" name="spec">Pediatrician</option>
                                        </select> -->
                                        </div><br><br>
                                    <div class="col-md-4"><label>Email:</label></div>
                                    
                                    <div class="col-md-8"><input placeholder="email" type="email"  class="form-control" name="demail" required></div><br><br>
                                    <div class="col-md-4"><label>Password:</label></div>
                                    <div class="col-md-8"><input placeholder="password" type="password" class="form-control"  onkeyup='check();' name="dpassword" id="dpassword"  required></div><br><br>
                                    <div class="col-md-4"><label>Confirm Password:</label></div>

                                    <div class="col-md-8"  id='cpass'><input placeholder="password" type="password" class="form-control" onkeyup='check();' name="cdpassword" id="cdpassword" required>&nbsp &nbsp<span id='message'></span> </div><br><br>
                                    <!-- <div class="col-md-4"><label>Consultancy Fees:</label></div> -->

                                    <div class="col-md-8"><input type="hidden" class="form-control"  name="docFees" required></div><br><br>
                                       
                                       
                                        

                                            <br>

                </div>
          <input type="submit" name="docsub" value="Add Midwife" class="btn btn-primary">
        </form>
      </div>


      <!-- Add Patient -->

      <div class="tab-pane fade" id="list-addpatient" role="tabpanel" aria-labelledby="list-addpatient-list">
        <h1>Add patient</h1>
      <form method="post" action="admin-panel1.php">
                                <div class="row register-form">                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control"  placeholder="First Name *" name="fname"  onkeydown="return alphaOnly(event);" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Your Email *" name="email"  required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password *" id="password" name="password" onkeyup='check();' required/>
                                        </div>
                                        <!-- <div class="form-group">
                                             <div class="maxl">
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" value="Male" checked>
                                                    <span> Male </span> 
                                                </label>
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" value="Female">
                                                    <span>Female </span> 
                                                </label>
                                            </div> 
                                            <a href="index1.php">Already have an account? Login</a>
                                        </div> -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Last Name *" name="lname" onkeydown="return alphaOnly(event);" required/>
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="tel" minlength="10" maxlength="10" name="contact" class="form-control" placeholder="Your Phone *"  required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control"  id="cpassword" placeholder="Confirm Password *" name="cpassword"  onkeyup='check();' required/><span id='message'></span>
                                        </div>

                                        <div class="form-group">
                                          <!-- <label>DOB</label> -->
                                          <input type="text" class="form-control datepicker" name='dob' placeholder="dd-mm-yyyy" required>
                                        </div>
                                        <!-- <div class="form-group">
                                            <input type="text" class="form-control"  placeholder="Your Address *" name="patAddress"  onkeydown="return alphaOnly(event);" required/>
                                        </div>  -->
                                        <!-- <input type="submit" class="btnRegister" name="patsub1" onclick="return checklen();" value="Register"/> -->
                                        <input type="submit" class="btnRegister btn btn-primary" name="addpatient" onclick="return checklen();" value="Add Patient"/>
                                <!-- <input type="submit" name="docsub" value="Add Doctor" class="btn btn-primary"> -->

                                    </div>

                                </div>
                            </form>

                            <!-- Add child -->

                            <form action="admin-panel1.php" method="post" >

</form>
      </div>

      <!-- End of add patient -->






      <div class="tab-pane fade" id="list-settings1" role="tabpanel" aria-labelledby="list-settings1-list">
        <form class="form-group" method="post" action="admin-panel1.php">
          <div class="row">
          
                  <div class="col-md-4"><label>Email ID:</label></div>
                  <div class="col-md-8"><input type="email"  class="form-control" name="demail" required></div><br><br>
                  
                </div>
          <input style="background-color: #3c50c1;" type="submit" name="docsub1" value="Delete Doctor" class="btn btn-primary" onclick="confirm('do you really want to delete?')">
        </form>
      </div>

      <!-- content -->
      <div class="tab-pane fade" id="list-contents" role="tabpanel" aria-labelledby="list-contents-list">
        <form class="form-group" method="post" action="admin-panel1.php">
          <div class="row">
                                    <!-- <div class="col-md-4"><label>Your Name:</label></div>
                                    <div class="col-md-8"><input type="text" class="form-control" name="doctor" onkeydown="return alphaOnly(event);" required></div><br><br> -->
                                    <div class="col-md-4"><label>Title:</label></div>
                                    <div class="col-md-8"><input type="text" class="form-control" name="content-title" onkeydown="return alphaOnly(event);" required></div><br><br>
                                    

                                    <!-- <div class="col-md-4"><label>Address:</label></div>
                                    <div class="col-md-8"><input type="text" class="form-control"  name="docAddress" required></div><br><br> -->


                                    <div class="col-md-4"><label>Category:</label></div>
                                    <div class="col-md-8">
                                    <!-- <select name="content-category" class="form-control" id="content-category" required="required">
                                        <option value="" name="" disabled selected>Select Specialization</option>
                                        <option value="Birth" name="">Birth</option>
                                        <option value="Six Weeks" name="">six weeks</option>
                                        <option value="Nine Months" name="">Nine Months</option>
                                        </select> -->

                                        <select name="content-category" class="form-control" id="content-category" required="required">
                                          <option value="" disabled selected>Select Age</option>
                                          <?php 
                                          display_age();
                                          ?>
                                      </select>
                                        </div><br><br>

                                     <!-- <div class="col-md-4"><label>Contact #:</label></div>
                                    <div class="col-md-8"><input type="text" class="form-control"  name="docContact" required></div><br><br> -->
                                    <div class="col-md-4"><label>Body/Reference(s):</label></div>
                                    <div class="col-md-8">
                                      <!-- <input type="text" class="form-control"  name="body" required> -->
                                      <textarea style="resize: none; margin-bottom:10px;" id="content-body"  rows="5" cols="33"  class="form-control"  name="content-body" required>
                                      
                                      </textarea>
  
                                    </div><br><br>
                                
                                        
                                    <!-- <div class="col-md-4"><label>Email ID:</label></div> -->
                                    <!-- <div class="col-md-8"><input type="email"  class="form-control" name="demail" required></div><br><br> -->

                                    <!-- <div class="col-md-4"><label>Password:</label></div>
                                    <div class="col-md-8"><input type="password" class="form-control"  onkeyup='check();' name="dpassword" id="dpassword"  ></div><br><br>
                                    <div class="col-md-4"><label>Confirm Password:</label></div>

                                    <div class="col-md-8"  id='cpass'><input type="password" class="form-control" onkeyup='check();' name="cdpassword" id="cdpassword" >&nbsp &nbsp<span id='message'></span> </div><br><br> -->

                                    <!-- <div class="col-md-4"><label>Consultancy Fees:</label></div> -->

                                    <!-- <div class="col-md-8"><input type="text" class="form-control"  name="docFees" required></div><br><br> -->
                                       
                                       
                                        
                                            <!-- <div class="maxl">
                                                <label class="radio inline"> 
                                                    <input type="radio" name="dgender" value="Male" checked>
                                                    <span> Male </span> 
                                                </label>
                                                <label class="radio inline"> 
                                                    <input type="radio" name="dgender" value="Female">
                                                    <span>Female </span> 
                                                </label>
                                            </div> -->

                                            <br>

                </div>

          <input style="background-color: #3c50c1;" type="submit" name="contentsub" value="Add Blog" class="btn btn-primary">
        </form>
      </div>

    


      <!-- Content Lists -->
      <div style="margin-top:-25px;" class="tab-pane fade" id="list-contentlist" role="tabpanel" aria-labelledby="list-contentlist-list">
        
        <table class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              
              <th style="padding-top: 12px; padding-bottom: 12px; text-align: left; background-color: #04AA6D; color: white;" scope="col">Title</th>
              <th style="padding-top: 12px; padding-bottom: 12px; text-align: left; background-color: #04AA6D; color: white;" scope="col">Body</th>
              <th style="padding-top: 12px; padding-bottom: 12px; text-align: left; background-color: #04AA6D; color: white;" scope="col">Category</th>
              <!-- <th style="padding-top: 12px; padding-bottom: 12px; text-align: left; background-color: #04AA6D; color: white;" scope="col">Action</th> -->
              <!-- <th scope="col">Appointment Time</th>


              <th scope="col">Diseases</th>
              <th scope="col">Allergies</th>
              <th scope="col">Prescriptions</th>
              <th scope="col">Age</th>
              <th scope="col">Antigen</th>
              <th scope="col">Disease_Prevented</th>
              <th scope="col">Bill Payment</th> -->
            </tr>
          </thead>
          <tbody>
            <?php 

              $con=mysqli_connect("localhost","root","","pmsdb");
              global $con;
              $query = "select * from blog_tbl  ORDER BY id DESC;";
              $result = mysqli_query($con,$query);
              if(!$result){
                echo mysqli_error($con);
              }
              
              while ($row = mysqli_fetch_array($result)){
                $boddy = $row['body'];
                $content_id=$row['id'];
            ?>
                <tr>
                  <td><?php echo $row['title'];?></td>
                  <td><?php echo '<a href="'. $row['body'] .'">'. $row['body'].'</a>';?></td>
                  <td><?php echo $row['category'];?></td>
                  <form action="admin-panel1.php" method="POST">
                    <input type="hidden" name="delete_content" value="'.$content_id.'">
                    <!-- <td><input type="submit"  class="btn btn-danger">Delete</td> -->
                    <!-- <td><input type="submit" class="btn btn-danger" value="Delele"></td> -->

                  </form>
                  <?php //echo $content_id; ?>
                </tr>
              <?php }
              ?>
          </tbody>
        </table>
        <?php

if(isset($_POST["delete_content"])){

	$_SESSION["delete_content"]=$_POST["delete_content"];

  $sql = 'DELETE from blog_tbl  WHERE id=$_SESSION["delete_content"]';
  echo 'deleted successfully';
  echo '$content_i';

  }
        ?>
  <br>
</div>

<!-- Delete content -->
<div style="margin-top:-25px;" class="tab-pane fade" id="list-contentdelete" role="tabpanel" aria-labelledby="list-contentdelete-list">
        

        <form class="form-group" method="post" action="admin-panel1.php">
          <div class="row">
          
                  <div class="col-md-4"><label>Blog Title:</label></div>
                  <div class="col-md-8"><input type="text"  class="form-control" name="btitle" required></div><br><br>
                  
                </div>
          <input style="background-color: #3c50c1;" type="submit" name="contentsub1" value="Delete Blog" class="btn btn-primary" onclick="confirm('do you really want to delete?')">
        </form>

</div>


<!-- chat -->
<div class="tab-pane fade" id="list-chat" role="tabpanel" aria-labelledby="list-chat-list">

<?php 

$con=mysqli_connect("localhost","root","","pmsdb");
global $con;
$query = "select * from blog_tbl  ORDER BY id DESC;";
$result = mysqli_query($con,$query);
if(!$result){
  echo mysqli_error($con);
}

while ($row = mysqli_fetch_array($result)){
  $boddy = $row['body'];
}


//code...


?>


<!-- chatlist -->
<div class="col-lg-12" style="margin-top:-75px;">
    <div class="panel panel-default" style="height:50px;">
		<span style="font-size:18px; margin-left:10px; position:relative; top:13px;"><strong><span class="glyphicon glyphicon-list"></span> List of Chat Rooms</strong></span>
		<div class="pull-right" style="margin-right:10px; margin-top:7px;">
			<!-- <a href="#add_chatroom" data-toggle="modal" class="btn btn-primary" style="background-color: #3c50c1;"><span class="glyphicon glyphicon-plus"></span> Add</a> -->
		</div>
	</div>
	<table width="100%" class="table table-striped table-bordered table-hover" id="chatRoom">
        <thead>
            <tr>
        <th style="padding-top: 12px; padding-bottom: 12px; text-align: left; background-color: #04AA6D; color: white;">Chat Room Name</th>
        <th style="padding-top: 12px; padding-bottom: 12px; text-align: left; background-color: #04AA6D; color: white;">Password</th>
				<th style="padding-top: 12px; padding-bottom: 12px; text-align: left; background-color: #04AA6D; color: white;">Date Created</th>
				<th style="padding-top: 12px; padding-bottom: 12px; text-align: left; background-color: #04AA6D; color: white;">Aaction</th>
			</tr>
		</thead>
		<tbody>
		<?php
			// $query=mysqli_query($conn,"select * from chatroomName_tbl order by date_created desc");
			// while($row=mysqli_fetch_array($query)){
			// 	$num=mysqli_query($conn,"select * from chatroomMember_tbl  where chatroomid='".$row['chatroomid']."'");		
        
        
        $con=mysqli_connect("localhost","root","","pmsdb");
        global $con;
        // $query = "select * from blog_tbl  ORDER BY id DESC;";
        $query = "select * from chatroomName_tbl ORDER BY date_created DESC;";
        $result = mysqli_query($con,$query);
        if(!$result){
          echo mysqli_error($con);
        }
        
        while ($row = mysqli_fetch_array($result)){
			?>

      
			<tr>
				<td><span class="glyphicon glyphicon-user"></span><span class="badge"></span> <input type="hidden" id="name<?php echo $row['chatroomid']; ?>" value="<?php echo $row['chat_name']; ?>"><?php echo $row['chat_name']; ?></td>

        <td><input type="hidden" id="pass<?php echo $row['chatroomid']; ?>" value="<?php echo $row['chat_password']; ?>"><?php echo $row['chat_password']; ?></td>

        <td><?php echo date('M d, Y - h:i A', strtotime($row['date_created'])); ?></td>

        <td><a href="chatroom2.php?id=<?php echo $row['chatroomid']; ?>" class="btn btn-info"><span class="glyphicon glyphicon-comment"></span> View Chnat</a>  
					<!-- <button class="btn btn-warning edit" value="<?php echo $row['chatroomid']; ?>"><span class="glyphicon glyphicon-pencil"></span> Edit</button>   -->
					<!-- <button class="btn btn-danger delete" value="<?php echo $row['chatroomid']; ?>"><span class="glyphicon glyphicon-trash"></span> Delete</button> -->
				</td>

		

			</tr>
			<?php
			}
		?>
        </tbody>
    </table>                     
</div>



 <script>
$(document).ready(function(){
	
	$('#chatRoom').DataTable({
	"bLengthChange": true,
	"bInfo": true,
	"bPaginate": true,
	"bFilter": true,
	"bSort": false,
	"pageLength": 7
	});
	
	// $(document).on('click', '#addchatroom', function(){
	// 	chatname=$('#chat_name').val();
	// 	chatpass=$('#chat_password').val();

	// 	addchatroom=$('#addchatroom').val();
	// 		$.ajax({
	// 			url:"add_chatroom.php",
	// 			method:"POST",
	// 			data:{
	// 				chatname: chatname,
	// 				chatpass: chatpass,
	// 				addchatroom: addchatroom,
	// 			},
	// 			success:function(data){
	// 			window.location.href='chatroom.php?id='+data;
	// 			}
	// 		});
		
	// });
	//
	$(document).on('click', '.delete', function(){
		var rid=$(this).val();
		$('#delete_room').modal('show');
		$('.modal-footer #confirm_delete').val(rid);
	});
	
	$(document).on('click', '#confirm_delete', function(){
		var nrid=$(this).val();
		$('#delete_room').modal('hide');
		$('body').removeClass('modal-open');
		$('.modal-backdrop').remove();
			$.ajax({
				url:"deleteroom.php",
				method:"POST",
				data:{
					id: nrid,
					del: 1,
				},
				success:function(){
					window.location.href='index.php';
				}
			});
	});
	
	$(document).on('click', '.edit', function(){
		var rid=$(this).val();
		var name=$('#name'+rid).val();
		var pass=$('#pass'+rid).val();
		$('#edit_room').modal('show');
		$('.modal-body #room_name').val(name);
		$('.modal-body #room_password').val(pass);
		$('.modal-footer #confirm_update').val(rid);
	});
	
	$(document).on('click', '#confirm_update', function(){
		var nrid=$(this).val();
		var roomname=$('#room_name').val();
		var roompass=$('#room_password').val();
		$('#edit_room').modal('hide');
		$('body').removeClass('modal-open');
		$('.modal-backdrop').remove();
			$.ajax({
				url:"update_room.php",
				method:"POST",
				data:{
					id: nrid,
					name: roomname,
					pass: roompass,
					edit: 1,
				},
				success:function(){
					window.location.href='index.php';
				}
			});
	});
 
});
</script>	


        

</div>
<!--end of chat  -->

<!-- Add chatroom -->
<div class="tab-pane fade" id="list-chatadd" role="tabpanel" aria-labelledby="list-chatadd-list">
  
  <h1>Add Chatroom</h1>
        <form class="form-group" method="post" action="admin-panel1.php">
          <div class="row">
                                   
                                    <div class="col-md-4"><label>Chatroom Name:</label></div>
                                    <div class="col-md-8"><input type="text" class="form-control" name="chat_name"  required></div><br><br>
                                    
                                    <div class="col-md-4"><label>Password:</label></div>
                                    <div class="col-md-8">
                                    
                                    <!-- <input type="text" class="form-control" name="chat_password" onkeydown="return alphaOnly(event);" required> -->
                                    <input type="number" class="form-control" name="chat_password"  required min="0">
  
                                    </div><br><br>                      
                                            <br>

                </div>

          <input style="background-color: #3c50c1;" type="submit" name="addchatroom" value="Add Chatroom" class="btn btn-primary">
        </form>

        <h1>Delete Chatroom</h1>

        <form class="form-group" method="post" action="admin-panel1.php">
          <div class="row">
          
                  <div class="col-md-4"><label>Chatroom Name:</label></div>
                  <div class="col-md-8"><input type="text"  class="form-control" name="roomname" required></div><br><br>
                  
                </div>
          <input style="background-color: #3c50c1;" type="submit" name="deleteroom" value="Delete Chatroom" class="btn btn-primary" onclick="confirm('do you really want to delete?')">
        </form>
      </div>
<!-- end of add chatroom -->


<div style="margin-top:0px;" class="tab-pane fade" id="list-inbox" role="tabpanel" aria-labelledby="list-inbox-list">
<div class="card" style="padding:20px 20px 5px 20px;margin-top:-25px">
			<div class="panel panel-success">
			  <div class="panel-heading"><h3>All Messages</h3></div>
			  <div class="panel-body"><h4>
                  <table style="width:100%">
                      <tr>
                          <td style="font-weight:bold; padding-bottom:10px;">Message</td>
                          <td style="font-weight:bold; padding-bottom:10px;">From</td>
                      </tr>
                      <?php
        $conn=mysqli_connect("localhost","root","","pmsdb");

                      	$sql = "SELECT * from messageInbox_tbl  WHERE receiver='admin' ORDER BY timestamp DESC";
                        $result = $conn->query($sql);
                        // $f=0;
                      	if ($result->num_rows > 0) {
						    // output data of each row
						    while($row = $result->fetch_assoc()) {
						        $sender=$row["sender"];
						        $receiver=$row["receiver"];
						        $msg=$row["msg"];
						        $timestamp=$row["timestamp"];

						        // if ($f==0) {
						        // 	$sr=$sender;
						        // }else{
						        // 	$sr=$receiver;
						        // }

                    

                    // $con=mysqli_connect("localhost","root","","pmsdb");
                    // global $con;
                    $query = "select * from midwife_tbl  where username='$sender'";
                    $resul = mysqli_query($con,$query);
                      
                    while ($row = mysqli_fetch_array($resul)){
                    $midwife_id = $row['midwife_id'];
                    }

                        


                                echo '
                                <form action="reply2.php" method="post">
                                <input type="hidden" name="sr" value="rrrr">
                                    <tr>
                                    <td><textarea readonly disabled style="backgroung-color:white; font-size:15px; resize:none; border-color:white;">'.$msg.'</textarea></td>
                                    <td><p style="font-size: 15px;">'.$sender.'</p></td>
                                    </form>
                                    <form action="reply2.php" method="post">
                                    <input type="hidden" name="rep" value="fff">
                                    <td>
                                    '; ?>

                                   
                                    <!-- <a href="reply2.php?id=<?php //echo $row['chatroomid']; ?>" type="submit" class="btn btn-primary btn-lg"> -->
                                    <a style="color: #fff; background-color: #3c50c1; border-color: #3c50c1; margin: 1px 0px padding:0px!important" href="reply2.php?id=<?php echo $midwife_id; ?>" type="submit" class="btn btn-primary">
                                    Reply
                                    </a>
                                   <?php
                                   '
                                    </td>
                                    </tr>
                                </form>
                                ';

                                }
                        } else {
                            echo "<tr></tr><tr><td></td><td>N/A</td></tr>";
                        }

                       ?>
                     </table>
              </h4></div>
			</div>
			<p></p>
		</div>
</div>

<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.bootstrap.min.js"></script>
<script src="../js/dataTables.responsive.js"></script>
<script>
$(document).ready(function(){
	
	$('#chatRoom').DataTable({
	"bLengthChange": true,
	"bInfo": true,
	"bPaginate": true,
	"bFilter": true,
	"bSort": false,
	"pageLength": 7
	});
	
	// $(document).on('click', '#addchatroom', function(){
	// 	chatname=$('#chat_name').val();
	// 	chatpass=$('#chat_password').val();
	// 	addchatroom=$('#addchatroom').val();

			// $.ajax({
			// 	url:"add_chatroom.php",
			// 	method:"POST",
			// 	data:{
			// 		chatname: chatname,
			// 		chatpass: chatpass,
			// 		addchatroom: addchatroom,
			// 	},
			// 	success:function(data){
			// 	window.location.href='chatroom.php?id='+data;
			// 	}
			// });
		
	// });
	//
	$(document).on('click', '.delete', function(){
		var rid=$(this).val();
		$('#delete_room').modal('show');
		$('.modal-footer #confirm_delete').val(rid);
	});
	
	$(document).on('click', '#confirm_delete', function(){
		var nrid=$(this).val();
		$('#delete_room').modal('hide');
		$('body').removeClass('modal-open');
		$('.modal-backdrop').remove();
			$.ajax({
				url:"deleteroom.php",
				method:"POST",
				data:{
					id: nrid,
					del: 1,
				},
				success:function(){
					window.location.href='index.php';
				}
			});
	});
	
	$(document).on('click', '.edit', function(){
		var rid=$(this).val();
		var name=$('#name'+rid).val();
		var pass=$('#pass'+rid).val();
		$('#edit_room').modal('show');
		$('.modal-body #room_name').val(name);
		$('.modal-body #room_password').val(pass);
		$('.modal-footer #confirm_update').val(rid);
	});
	
	$(document).on('click', '#confirm_update', function(){
		var nrid=$(this).val();
		var roomname=$('#room_name').val();
		var roompass=$('#room_password').val();
		$('#edit_room').modal('hide');
		$('body').removeClass('modal-open');
		$('.modal-backdrop').remove();
			$.ajax({
				url:"update_room.php",
				method:"POST",
				data:{
					id: nrid,
					name: roomname,
					pass: roompass,
					edit: 1,
				},
				success:function(){
					window.location.href='index.php';
				}
			});
	});
 
});
</script>	
</body>
</html>
  <br>
</div>
      </div>



       <div class="tab-pane fade" id="list-attend" role="tabpanel" aria-labelledby="list-attend-list">...</div>

       <!-- <div class="tab-pane fade" id="list-mes" role="tabpanel" aria-labelledby="list-mes-list">

         <div class="col-md-8">
      <form class="form-group" action="messearch.php" method="post">
        <div class="row">
        <div class="col-md-10"><input type="text" name="mes_contact" placeholder="Enter Contact" class = "form-control"></div>
        <div class="col-md-2"><input type="submit" name="mes_search_submit" class="btn btn-primary" value="Search"></div></div>
      </form>
    </div>
        
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">User Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Message</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 

                    // $con=mysqli_connect("localhost","root","","pmsdb");
                    // global $con;

                    // $query = "select * from contactMsg_tbl ;";
                    // $result = mysqli_query($con,$query);
                    // while ($row = mysqli_fetch_array($result)){
              
                      #$fname = $row['fname'];
                      #$lname = $row['lname'];
                      #$email = $row['email'];
                      #$contact = $row['contact'];
                  ?>
                      <tr>
                        <td><?php //echo $row['name'];?></td>
                        <td><?php //echo $row['email'];?></td>
                        <td><?php //echo $row['contact'];?></td>
                        <td><?php //echo $row['message'];?></td>
                      </tr>
                    <?php //} ?>
                </tbody>
              </table>
        <br>
      </div> -->



    </div>
  </div>
</div>
   </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
  </body>
</html>
