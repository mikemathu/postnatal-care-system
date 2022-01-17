<!DOCTYPE html>

<?php 
$con=mysqli_connect("localhost","root","","pmsdb");

include('func.php');  
include('newfunc.php');
//include('distance_in_js1.php');

$con=mysqli_connect("localhost","root","","pmsdb");


  $pid = $_SESSION['pid'];
  $username = $_SESSION['username'];

// include('newfunc.php');

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
   <h3 style = "margin-left: 40%;  padding-bottom: 20px; margin-top:-40px" >PATIENT DASHBOARD</h3>
    <h3 style = "margin-left: 40%;  padding-bottom: 20px; font-family: 'IBM Plex Sans', sans-serif; margin-top:-30px"> Welcome &nbsp<?php echo $username ?> 
   </h3>
    <div class="row">
  <div class="col-md-4" style="max-width:25%; margin-top: 30vh;">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" href="admin-panel.php" >Back to Dashboard</a>
      
    </div><br>
  </div>

  <div class="col-md-8" style="margin-top: 3%; margin-left: 10vw;">
    <div class="tab-content" id="nav-tabContent" style="width: 950px;">


	<?php //include('includes/server.php');
// if(isset($_SESSION["Username"])){
//     $username=$_SESSION["Username"];
//     if ($_SESSION["Usertype"]==1) {
//         $linkPro="farmerProfile.php";
//         $linkEditPro="editartisan.php";
//         $linkBtn="bidOffer.php";
//         $textBtn="Bid this Offer";
//     }
//     else{
//         $linkPro="farmerProfile.php";
//         $linkEditPro="editclient.php";
//         $linkBtn="editFarmOutputOffer.php";
//         $textBtn="Edit the Offer";
//     }
// }
// else{
//     $username="";
// }


// if(isset($_SESSION["msgRcv"])){
//     $msgRcv=$_SESSION["msgRcv"];
// }

$id= $_GET["id"];

// echo $id;

$query = "select * from midwife_tbl  where midwife_id='$id'";
$result = mysqli_query($con,$query);
if(!$result){
  echo mysqli_error($con);
}

while ($row = mysqli_fetch_array($result)){
  $docname= $row['username'];

}

if(isset($_POST["send"])){


  // $message = $row['message'];
    $msgTo=$docname;
    $msgBody=$_POST["msgBody"];
    $sender =  $_SESSION['fname'];

    $query="insert into messageInbox_tbl (sender, receiver, msg)values('$sender', '$msgTo', '$msgBody')";
    $result=mysqli_query($con,$query);



    // $result = $conn->query($sql);
    if($result==true){
        // header("location: message.php");
        echo 'Message sent successfully';
    }
}

//include('includes/header.php');

//include('includes/client-navbar.php');


 ?>

<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <form id="registrationForm" method="post" class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-4 control-label">To</label>
                    <div class="col-sm-8">
                        <input readonly disabled  type="text" class="form-control" name="msgTo" value="<?php 
                       
                         echo $docname;
                         ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Message Body</label>
                    <div class="col-sm-8">
                        <textarea style="resize:none; height:200px;" class="form-control" rows="12" name="msgBody"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <!-- Do NOT use name="submit" or id="submit" for the Submit button -->
                        <button style="color: #fff; background-color: #342ac1; border-color: #342ac1; margin: 1px 0px;;" type="submit" name="send" class="btn btn-info btn-lg">Send Message</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>


<?php //include('includes/footer.php');?>




      
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
    //   $username[] = $row["username"];
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
