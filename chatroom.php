<!DOCTYPE html>

<?php 
$con=mysqli_connect("localhost","root","","pmsdb");

include('newfunc.php');

if(isset($_POST['docsub'])) {
  $doctor=$_POST['doctor'];
  $dpassword=$_POST['dpassword'];
  $demail=$_POST['demail'];
  $spec=$_POST['special'];
  $docFees=$_POST['docFees'];
  $dgender = $_POST['dgender'];
  $docContact = $_POST['docContact'];
  $docAddress = $_POST['docAddress'];
  $query="insert into midwife_tbl (username,password,email,spec,docFees,gender)values('$doctor','$dpassword','$demail','$spec','$docFees','$dgender')";
  $result=mysqli_query($con,$query);
  if($result)
    {
      echo "<script>alert('Doctor added successfully!');</script>";
      echo '<script>window.location.href = "http://localhost/postnatal-care-system/admin-panel1.php";</script>';
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
      echo "<script>alert('content added successfully!');</script>";
  }
}


if(isset($_POST['docsub1']))
{
  $demail=$_POST['demail'];
  $query="delete from midwife_tbl  where email='$demail';";
  $result=mysqli_query($con,$query);
  if($result)
    {
      echo "<script>alert('Doctor removed successfully!');</script>";
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

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> Gglobal Hospital </a>
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
        <a class="nav-link" href="logout1.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
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
    <h3 style = "margin-left: 40%; padding-bottom: 20px;font-family: 'IBM Plex Sans', sans-serif;"> WELCOME ADMIN </h3>
    <div class="row">
  <div class="col-md-4" style="max-width:25%;margin-top: 3%;">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action " id="list-dash-list" data-toggle="list" href="#list-dash" role="tab" aria-controls="home">Dashboard</a>
      <a class="list-group-item list-group-item-action" href="#list-doc" id="list-doc-list"  role="tab"    aria-controls="home" data-toggle="list">Doctor List</a>
      <a class="list-group-item list-group-item-action" href="#list-pat" id="list-pat-list"  role="tab" data-toggle="list" aria-controls="home">Patient List</a>
      <a class="list-group-item list-group-item-action" href="#list-app" id="list-app-list"  role="tab" data-toggle="list" aria-controls="home">Appointment Details</a>
      <a class="list-group-item list-group-item-action" href="#list-pres" id="list-pres-list"  role="tab" data-toggle="list" aria-controls="home">Prescription List</a>
      <a class="list-group-item list-group-item-action" href="#list-settings" id="list-adoc-list"  role="tab" data-toggle="list" aria-controls="home">Add Doctor</a>
      <a class="list-group-item list-group-item-action" href="#list-settings1" id="list-ddoc-list"  role="tab" data-toggle="list" aria-controls="home">Delete Doctor</a>
      <a class="list-group-item list-group-item-action" href="#list-contents" id="list-contents-list"  role="tab" data-toggle="list" aria-controls="home">Add Content</a>
      <a class="list-group-item list-group-item-action" href="#list-contentlist" id="list-contentlist-list"  role="tab" data-toggle="list" aria-controls="home">Content List</a>
      <a class="list-group-item list-group-item-action" href="#list-chat" id="list-chat-list"  role="tab" data-toggle="list" aria-controls="home">Chat</a>
      <a class="list-group-item list-group-item-action active" href="#list-inbox" id="list-inbox-list"  role="tab" data-toggle="list" aria-controls="home">Inbox</a>
      
    </div><br>
  </div>
  <div class="col-md-8" style="margin-top: 3%;">
    <div class="tab-content" id="nav-tabContent" style="width: 950px;">



	<div class="tab-pane fade show active" id="list-inbox" role="tabpanel" aria-labelledby="list-inbox-list">
	<!-- <div class="tab-pane fade" id="list-dash-list" role="tabpanel" aria-labelledby="list-inbox-list"> -->

  <?php

$chatroomid = $_GET['id'];

$con=mysqli_connect("localhost","root","","pmsdb");
global $con;

$query = "select * from `chatroom`  where chatroomid='$chatroomid'";
$result = mysqli_query($con,$query);


while ($row = mysqli_fetch_array($result)){
  $chat_name = $row['chat_name'];
?>

<div class="panel panel-default" style="height:50px;">
				<span style="font-size:18px; margin-left:10px; position:relative; top:13px;"><strong>Chat Room: <?php echo $chat_name; ?></strong></span>
				<div class="pull-right" style="margin-right:10px; margin-top:7px;">
					<span id="user_details" style="font-size:18px; position:relative; top:2px;"><strong>Members: </strong><span class="badge"><?php //echo mysqli_num_rows($cmem); ?></span></span>
					<a href="#add_member" data-toggle="modal" class="btn btn-primary">Add Member</a>
					<a href="#delete_room" data-toggle="modal" class="btn btn-danger">Delete Room</a>
					<a href="index.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
				</div>

    
				
          </div>

<?php  } ?>


<div>
				<div class="panel panel-default" style="height: 400px; overflow:auto;">
					<div style="height:10px;"></div>
					<span style="margin-left:10px;">Welcome to Chatroom</span><br>
					<span style="font-size:10px; margin-left:10px;"><i>Note: Avoid using foul language and hate speech to avoid banning of account</i></span>
					<div style="height:10px;"></div>
					<div id="chat_area" style="margin-left:10px; max-height:320px; overflow-y:scroll;">
					</div>
					
					<?php

						$chatroomid = $_GET['id'];

              $con=mysqli_connect("localhost","root","","pmsdb");
              global $con;
              // $query = "select * from chatroomMsg_tblwhere chatroomid='$chatroomid'";
              // $query = "select * from chatroomMsg_tblwhere chatroomid=$chatroomid";
              $query = "select * from `chat` left join `patreg` on patreg.pid=chat.userid where chatroomid='$chatroomid'";

              $result = mysqli_query($con,$query);
              if(!$result){
                echo mysqli_error($con);
              }
              
              while ($row = mysqli_fetch_array($result)){
							$message = $row['message'];
							$fname = $row['fname'];


						?>	
						<div>
							<img src="<?php if(empty($row['photo'])){echo "img/profile.jpg";}else{echo $row['photo'];} ?>" style="height:30px; width:30px; position:relative; top:15px; left:10px;">
							<span style="font-size:10px; position:relative; top:7px; left:15px;"><i><?php echo date('M-d-Y h:i A',strtotime($row['chat_date'])); ?></i></span><br>
              <span style="font-size:11px; position:relative; top:-2px; left:50px;"><strong><?php echo $fname ?></strong> </span>
							<span style="font-size:11px; position:relative; top:-2px; left:50px;"><strong></strong>: <?php echo $message ?></span>
						</div>
						<?php
						}
					?>

				</div>

        <?php

        if(isset($_POST['send_msg'])) {
			$msg=$_POST["chat_msg"];
      $conn=mysqli_connect("localhost","root","","pmsdb");

		$query=mysqli_query($conn,"select * from `user` where username='$user'");
		while($row=mysqli_fetch_array($query)){
			$id = $row['userid'];
		}		
			$userid = $id;
			// $userid = 3;
			$chatroomid = $_GET['id'];

      echo $userid;
      echo $chatroomid;
      echo $msg;

       $query="insert into chat(userid, chatroomid, message)values('$userid','$chatroomid','$msg')";;
		  }

        ?>
				
				<form method="post">
					<div class="input-group">
						<input type="text" name="chat_msg" class="form-control" placeholder="Type message..." id="chat_msg">
						<span class="input-group-btn">
						<button class="btn btn-success" name="send_msg" type="submit" id="send_msg" value="<?php echo $id; ?>">
						<span class="glyphicon glyphicon-comment"></span> Ssend
						</button>
						</span>
					</div>
				</form>				
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

  <!--patient-->  
  
<?php 
$con=mysqli_connect("localhost","root","","pmsdb");
global $con;
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
      // $fname[] = $row["fname"];
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

<!--prescription sort -->



<?php 
$con=mysqli_connect("localhost","root","","pmsdb");
global $con;
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

<br>









        


























<!--Appoinment Sort -->







  
<?php 

$pid = array();
$doctor = array();
$con=mysqli_connect("localhost","root","","pmsdb");
              global $con;
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



      
<!-- Inbox here -->

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
	
	$(document).on('click', '#addchatroom', function(){
		chatname=$('#chat_name').val();
		chatpass=$('#chat_password').val();
			$.ajax({
				url:"add_chatroom.php",
				method:"POST",
				data:{
					chatname: chatname,
					chatpass: chatpass,
				},
				success:function(data){
				window.location.href='chatroom.php?id='+data;
				}
			});
		
	});
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
