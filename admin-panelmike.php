<!DOCTYPE html>
<?php 
include('func.php');  
include('newfunc.php');

$con=mysqli_connect("localhost","root","","pmsdb");

  $pid = $_SESSION['pid'];
  $username = $_SESSION['username'];
  $email = $_SESSION['email'];
  $fname = $_SESSION['fname'];
  // $gender = $_SESSION['gender'];
  $lname = $_SESSION['lname'];
  $contact = $_SESSION['contact'];

// echo $pid;

if(isset($_POST['app-submit']))
{
  $pid = $_SESSION['pid'];
  $username = $_SESSION['username'];
  $email = $_SESSION['email'];
  $fname = $_SESSION['fname'];
  $lname = $_SESSION['lname'];
  $gender = $_SESSION['gender'];
  $contact = $_SESSION['contact'];
  $doctor=$_POST['doctor'];
  $email=$_SESSION['email'];
  // $docFees=$_POST['docFees'];

  $appdate=$_POST['appdate'];
  $apptime=$_POST['apptime'];
  $cur_date = date("Y-m-d");
  date_default_timezone_set('Asia/Kolkata');
  $cur_time = date("H:i:s");
  $apptime1 = strtotime($apptime);
  $appdate1 = strtotime($appdate);
	
  if(date("Y-m-d",$appdate1)>=$cur_date){
    if((date("Y-m-d",$appdate1)==$cur_date and date("H:i:s",$apptime1)>$cur_time) or date("Y-m-d",$appdate1)>$cur_date) {
      $check_query = mysqli_query($con,"select apptime from appointment_tbl where doctor='$doctor' and appdate='$appdate' and apptime='$apptime'");

        if(mysqli_num_rows($check_query)==0){
          // $query=mysqli_query($con,"insert into appointment_tbl(pid,fname,lname,gender,email,contact,doctor,docFees,appdate,apptime,userStatus,doctorStatus) values($pid,'$fname','$lname','$gender','$email','$contact','$doctor','$docFees','$appdate','$apptime','1','1')");
          $query=mysqli_query($con,"insert into appointment_tbl(pid,fname,lname,gender,email,contact,doctor,appdate,apptime,userStatus,doctorStatus) values($pid,'$fname','$lname','$gender','$email','$contact','$doctor','$appdate','$apptime','1','1')");

          if($query)
          {
            echo "<script>alert('Your appointment successfully booked');</script>";
          }
          else{
            echo "<script>alert('Unable to process your request. Please try again!');</script>";
          }
      }
      else{
        echo "<script>alert('We are sorry to inform that the doctor is not available in this time or date. Please choose different time or date!');</script>";
      }
    }
    else{
      echo "<script>alert('Select a time or date in the future!');</script>";
    }
  }
  else{
      echo "<script>alert('Select a time or date in the future!');</script>";
  }
  
}

if(isset($_GET['cancel']))
  {
    $query=mysqli_query($con,"update appointment_tbl set userStatus='0' where ID = '".$_GET['ID']."'");
    if($query)
    {
      echo "<script>alert('Your appointment successfully cancelled');</script>";
    }
  }

function generate_bill(){
  $con=mysqli_connect("localhost","root","","pmsdb");
  // $pid = $_SESSION['pid'];
  $output='';
  $query=mysqli_query($con,"select * from appointment_tbl where ID = '".$_GET['ID']."'");

  // $query=mysqli_query($con,"select p.pid,p.ID,p.fname,p.lname,p.doctor,p.appdate,p.apptime,p.disease,p.allergy,p.prescription,a.docFees from prestb p inner join appointmenttb a on p.ID=a.ID and p.pid = '$pid' and p.ID = '".$_GET['ID']."'");

  echo 'Bill geneatedmike';


  while($row = mysqli_fetch_array($query)){
    $output .= '
    <table id="table1100" style="width:100%;"  class="table table-hover">
    <tbody>
    <tr>
     	  <label> <b>Postpartum Patient:</b> </label>'.$row["fname"].' '.$row["lname"].'<br/><br/>
     	  <label> <b>Midwife Name:</b> </label>'.$row["doctor"].'<br/><br/>
     	  <label> <b>Date:</b> </label>'.$row["appdate"].'<br/><br/>
     	  <label> <b>Time:</b> </label>'.$row["apptime"].'<br/><br/>
      </tr>  
    </tbody>
    </table>
    ';
  }  
  return $output;
}


if(isset($_GET["generate_bill"])){
  require_once("TCPDF/tcpdf.php");
  $obj_pdf = new TCPDF('P',PDF_UNIT,PDF_PAGE_FORMAT,true,'UTF-8',false);
  $obj_pdf -> SetCreator(PDF_CREATOR);
  $obj_pdf -> SetTitle("Generate Bill");
  $obj_pdf -> SetHeaderData('','',PDF_HEADER_TITLE,PDF_HEADER_STRING);
  $obj_pdf -> SetHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
  $obj_pdf -> SetFooterFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
  $obj_pdf -> SetDefaultMonospacedFont('helvetica');
  $obj_pdf -> SetFooterMargin(PDF_MARGIN_FOOTER);
  $obj_pdf -> SetMargins(PDF_MARGIN_LEFT,'5',PDF_MARGIN_RIGHT);
  $obj_pdf -> SetPrintHeader(false);
  $obj_pdf -> SetPrintFooter(false);
  $obj_pdf -> SetAutoPageBreak(TRUE, 10);
  $obj_pdf -> SetFont('helvetica','',12);
  $obj_pdf -> AddPage();

  $content = '';

  $content .= '
      <br/>
      <h2 align ="center"> Postnatal Care</h2></br>
      <h3 align ="center"> Appointment Receipt</h3> 

  ';
 
  $content .= generate_bill();
  $obj_pdf -> writeHTML($content);
  ob_end_clean();
  $obj_pdf -> Output("bill.pdf",'I');

}

function get_specs(){
  $con=mysqli_connect("localhost","root","","pmsdb");
  $query=mysqli_query($con,"select username,spec from midwife_tbl ");
  $docarray = array();
    while($row =mysqli_fetch_assoc($query))
    {
        $docarray[] = $row;
    }
    return json_encode($docarray);
}





// Print receipt


// // echo $app_id;

// function generate_bill(){
  
//   $app_id = $_GET['ID'];


// 	$output='';
// 	// $query=mysqli_query($con,"select * from `farm_input` left join `selected_farminput` on selected_farminput.offer_id=farm_input.item_id where farm_input.item_id='$offer_id'  ");


//   $con=mysqli_connect("localhost","root","","pmsdb");
//   // $query = "select * from appointment_tbl where fname ='mike';";
//   $query = "select * from appointment_tbl where ID='$app_id';";
//   $result = mysqli_query($con,$query);
            
//   while ($row = mysqli_fetch_array($result)){

  
// 	  $output .= '
// 	  <label> <b>Offer Title:</b> </label>'.$row["fname"].'<br/><br/>
// 	  <label> <b>Item type:</b> </label>'.$row["lname"].'<br/><br/>
// 	  <label> <b>Quantity:</b> </label>'.$row["email"].'<br/><br/>
// 	  <label> <b>Price Per Item:</b> Ksh.</label>'.$row["appdate"].'<br/><br/>
// 	  <label> <b>Farmer Name:</b> </label>'.$row["apptime"].'<br/><br/>
	  
// 	  ';
  
// 	}
  
	
// 	return $output;
//   }

  
  
//   if(isset($_GET["generate_bill"])){
// 	require_once("TCPDF/tcpdf.php");
// 	$obj_pdf = new TCPDF('P',PDF_UNIT,PDF_PAGE_FORMAT,true,'UTF-8',false);
// 	$obj_pdf -> SetCreator(PDF_CREATOR);
// 	$obj_pdf -> SetTitle("MCMS Receipt");
// 	$obj_pdf -> SetHeaderData('','',PDF_HEADER_TITLE,PDF_HEADER_STRING);
// 	$obj_pdf -> SetHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
// 	$obj_pdf -> SetFooterFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
// 	$obj_pdf -> SetDefaultMonospacedFont('helvetica');
// 	$obj_pdf -> SetFooterMargin(PDF_MARGIN_FOOTER);
// 	$obj_pdf -> SetMargins(PDF_MARGIN_LEFT,'5',PDF_MARGIN_RIGHT);
// 	$obj_pdf -> SetPrintHeader(false);
// 	$obj_pdf -> SetPrintFooter(false);
// 	$obj_pdf -> SetAutoPageBreak(TRUE, 10);
// 	$obj_pdf -> SetFont('helvetica','',12);
// 	$obj_pdf -> AddPage();
  
// 	$content = '';
  
// 	$content .= '
// 		<br/>
// 		<h2 align ="center"> Postnatal Management System</h2></br>
// 		<h3 align ="center"> Receipt</h3>
		
  
// 	';
   
// 	$content .= generate_bill();
// 	$obj_pdf -> writeHTML($content);
// 	ob_end_clean();
// 	$obj_pdf -> Output("receipt.pdf",'I');
  
//   }


$users=[];
	$current_month_day=date("m-d");
	$current_year=date("Y");
	$sql="select * from prescription_tbl where DATE_FORMAT(next_visit_date, '%m-%d')='{$current_month_day}' and reminder<>'{$current_year}'";
	$res=$con->query($sql);
	if($res->num_rows>0){
		while($row=$res->fetch_assoc()){
			$users[]=$row;
		}
	}

	
	$notifications=[];
	$current_month_day=date("m-d");
	$sql="select * from prescription_tbl where DATE_FORMAT(next_visit_date, '%m-%d')='{$current_month_day}' and fname ='$fname'";
	$res=$con->query($sql);
	if($res->num_rows>0){
		while($row=$res->fetch_assoc()){
			$age=(date("Y")-date("Y",strtotime($row["appdate"])))+1;
			$notifications[]="<i class='fa fa-bell'></i> Hello <b>{$row["fname"]}</b> today you are expected to go for a <b>{$row["age"]}</b> vaccination";
		}
	}
?>

<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="home.php">Simple Birthday Reminder</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<!-- <a class="nav-link" href="home.php"><span class='fa fa-user'></span> Welcome : <?php //echo $_SESSION["login_info"]["ANAME"]; ?> </a> -->
			<!-- </li>
			<li class="nav-item">
				<a class="nav-link" href="home.php"><span class='fa fa-home'></span> Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="add_reminder.php"><span class='fa fa-plus'></span> Add Reminder</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					<span class='fa fa-bell'></span>(<?php //echo count($notifications);?>)
				</a>
				<?php //if(count($notifications)>0): ?>
					<div class="dropdown-menu dropdown-menu-right p-2" aria-labelledby="navbarDropdown">
						<?php //foreach($notifications as $row):?>
							<a class="dropdown-item pt-3 pb-3 alert alert-success" href="#"><?php //echo $row; ?></a>
						<?php //endforeach;?>
					</div>
				<?php //endif; ?>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="logout.php">Logout</a>
			</li>
		</ul>
	</div>
</nav>  -->


<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <script src="Algorithm\Patient\Oyelami_sort.js"></script>
    <link rel="stylesheet" href="css/tabledesign.css">
    <link rel="stylesheet" href="css/buttona.css">    
    <title>PMS - Patient Dashboard</title>
     
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

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
	<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css"> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.css" >
	<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
	<script>
		$(document).ready(function(){
			$(".datepicker").datepicker({
			dateFormat:"dd-mm-yy",
			changeMonth: true,
            changeYear: true,
			yearRange: '1960:2050',
            });
			
		});
	</script>

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
      <li>
        <a class="nav-link" href="patientProfile.php"><i class="fa fa-user" aria-hidden="true"></i>Profile</a>
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
   <h3 style = "margin-left: 40%; margin-top:-30px;  padding-bottom: 20px;" >PATIENT DASHBOARD</h3>
    <h3 style = "margin-left: 40%; margin-top:-20px;  padding-bottom: 20px; font-family: 'IBM Plex Sans', sans-serif;"> Welcome &nbsp<?php echo $username ?> 
   </h3>

   <!-- Norification Reminder -->
   <div class='container mt-4'>
			<div class='row'>
				
				<div class='col-md-12'>
					<?php foreach($notifications as $row):?>
						<!-- <h1 class="display-4">Birthday Reminder</h1> -->

         

					  <div class="alert alert-primary mb-3 pt-4 pb-4" href="#"><?php echo $row; ?></div>
					<?php endforeach;?>
				</div>
				<!-- <div class='col-md-8'>
					<div class="jumbotron">
						<h1 class="display-4">Birthday Reminder</h1>
						<hr class="my-4">
						<p class="lead">In this project we  create simple birthday reminder system and send birthday wishes to mail id using PHP and MySQL.</p>
					</div>
				</div> -->
			</div>
		</div>


    <div class="row">
  <div class="col-md-4" style="max-width:25%; margin-top: 3%">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-dash-list" data-toggle="list" href="#list-dash" role="tab" aria-controls="home">Dashboard</a>
      <a class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Book Appointment</a>
      <a class="list-group-item list-group-item-action" href="#app-hist" id="list-pat-list" role="tab" data-toggle="list" aria-controls="home">Appointment History</a>
      <a class="list-group-item list-group-item-action" href="#list-pres" id="list-pres-list" role="tab" data-toggle="list" aria-controls="home">Vaccinations</a>
      <a class="list-group-item list-group-item-action" href="#list-content" id="list-content-list" role="tab" data-toggle="list" aria-controls="home">Content List</a>
      <!-- <a class="list-group-item list-group-item-action" href="#list-cha" id="list-cha-list"  role="tab" data-toggle="list" aria-controls="home">Chat1</a> -->
      <a class="list-group-item list-group-item-action" href="#list-distances" id="list-distances-list" role="tab" data-toggle="list" aria-controls="home">Doctors</a>      
      <a class="list-group-item list-group-item-action" href="chat.php">Chat</a>
    </div><br>
  </div>
  <div class="col-md-8" style="margin-top: 3%;">
    <div class="tab-content" id="nav-tabContent" style="width: 950px;">
      <div class="tab-pane fade  show active" id="list-dash" role="tabpanel" aria-labelledby="list-dash-list">
        <div class="container-fluid container-fullw bg-white" >
              <div class="row">
               <div class="col-sm-4" style="left: 5%">
                  <div class="panel panel-white no-radius text-center">                
                    <div class="panel-body" >
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">My Appointments</h2>
                    
                      <p class="cl-effect-1">
                        <a href="#app-hist" onclick="clickDiv('#list-pat-list')">
                          View Appointment History
                        </a>
                      </p>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4" style="left: 10%">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body" >
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-list-ul fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Prescriptions</h2>
                    
                      <p class="cl-effect-1">
                        <a href="#list-pres" onclick="clickDiv('#list-pres-list')">
                          View Prescription List
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
                </div>

                <div class="col-sm-4" style="left: 20%;margin-top:5%">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-list fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;"> Content List</h4>

                      <script>
                        function clickDiv(id) {
                          document.querySelector(id).click();
                        }
                      </script>     

                      <p class="links cl-effect-1">
                        <a href="#list-content" onclick="clickDiv('#list-content-list')">
                          View Content List
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
        
                <div class="col-sm-4" style="left: 5% ; margin-top:5%">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-list fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;"> Chat </h4>

                      <script>
                        function clickDiv(id) {
                          document.querySelector(id).click();
                        }
                      </script>     

                      <p class="links cl-effect-1">
                        <a href="#list-chat" onclick="clickDiv('#list-chat-list')">
                         View Chat
                        </a>
                      </p>
                    </div>

                    
                  </div>
                </div>                

                <div class="col-sm-4" style="left: 45% ; margin-top:-16%">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-list fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Doctors</h4>
                      <script>
                        function clickDiv(id) {
                          document.querySelector(id).click();
                        }
                      </script>       

                      <p class="links cl-effect-1">
                        <a href="#list-loc" onclick="clickDiv('#list-distances-list')">
                          Doctors
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
            </div>
          </div>

<?php include('distance_in_js1.php'); ?>

<!--Distances Sort -->

      <?php 
              $pid = array();
              $doctor = array();
              $query = "select  username from midwife_tbl ";
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
                    $doctor[] = $row["username"];
                    $row = $result->fetch_assoc();
                }

                //print the content of the array to debug
                for ($i = 0; $i < $num; $i++){
                  //defining the array name
              }
              }
              else {
                echo " "; //"0 results";

              }
              $con->close();
      ?>


        <!--Hidden Sorting Process-->
        <script>
        //assign to a js variable 

        //main counter
        var pat_doc_js_count = <?php echo json_encode($doctor); ?>;

        var pat_doc_js = <?php echo json_encode($doctor); ?>;
        var pat_doc_js_l = pat_doc_js.map(pat_doc_js => pat_doc_js.toLowerCase());

        //put here the distances 
        var pat_doc_dis_js = distance_km;
        var pat_doc_dis_js64 = new Float64Array(pat_doc_dis_js);

        </script>


<script>
var i = 0 ;
var j = pat_doc_js_count.length;
</script>

<script>
  //variable resetter to be used by other call
  var i = 0 ;
  var j = pat_doc_js_count.length;
document.getElementById("SortBydistance").onclick = Oyelami_sort(pat_doc_dis_js64,pat_doc_js_l  ); //this is where to display

</script>

<script>
function Display001() {
document.write("<br>");
document.write(pat_doc_js_l);
document.write("<br>");
document.write(pat_doc_dis_js64 );
document.write("<br>");
document.write("FNameFNameDoes it changed and altered the contents?: FName " + "<br>");
document.write(pat_doc_dis_js64 );
document.write("    <----------- Yes, ready for cocktail");
}
</script>
<!--above code is done -->
<!--SEARCH FOR AVAILABLE DOCTORS DISTANCES-->
      <div style="margin-top:-65px;" class="tab-pane fade" id="list-distances" role="tabpanel" aria-labelledby="list-distances-list">
      <div class='title'>
</div>

<a style="color: #fff; background-color: #342ac1; border-color: #342ac1;" href="messages.php" id="btn1" class="btn btn-primary">Inbox Messages</a>

<br><br>

<script>
            var counter = 0;
            var counterplus = 0;
</script>
<script>
            var counter = 0;
            var counterplus = 0;
</script>
<table id="table11100" style="width:100%; ">
<tr>

              <th scope="col">Midwife Name</th>
              <th scope="col">Send Message</th>

  </tr>

  <?php 
    //defining conditions
    $con=mysqli_connect("localhost","root","","pmsdb");
    global $con;
    $query = "select * from midwife_tbl ";
    $result = mysqli_query($con,$query);
      
  while ($row = mysqli_fetch_array($result)){
    ?>
        <tr>
        <td><?php echo $row['username'];?></td>            

<td>
<form method="post">
    <a href="contactMidwife.php?id=<?php echo $row['midwife_id']; ?>" type = "submit"  class = "btn btn-success" value="Send Message" > Send Message</a>
</form>
</td>

        </tr>
      <?php } ?>
  </tbody>

</table>
<script>
document.getElementById("btn1").addEventListener("click", function(){

  document.getElementById("table111").style.display = "block";
  document.getElementById("table11100").style.display = "none";//hide
});

document.getElementById("btn100").addEventListener("click", function(){
  document.getElementById("table11100").style.display = "block";
  document.getElementById("table111").style.display = "none";//hide
});
</script>
        <br>
      </div>

      <div class="tab-pane fade" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <center><h4>Create an appointment</h4></center><br>
              <form class="form-group" method="post" action="admin-panel.php">
                <div class="row">    

                    <!-- <div class="col-md-4">
                          <label for="spec">Specialization:</label>
                        </div> -->
                        <!-- <div class="col-md-8">
                          <select name="spec" class="form-control" id="spec">
                              <option value="" disabled selected>Select Specialization</option>
                              <?php 
                              display_specs();
                              ?>
                          </select>
                        </div> -->

                        <br><br>

                        <script>
                        document.getElementById('spec').onchange = function foo() {
                        let spec = this.value;   
                        console.log(spec)
                        let docs = [...document.getElementById('doctor').options];
                        
                        docs.forEach((el, ind, arr)=>{
                          arr[ind].setAttribute("style","");
                          if (el.getAttribute("data-spec") != spec ) {
                            arr[ind].setAttribute("style","display: none");
                          }
                        });
                      };

                  </script>

              <div class="col-md-4"><label for="doctor">Midwives:</label></div>
                <div class="col-md-8">
                    <select name="doctor" class="form-control" id="doctor" required="required">
                      <option value="" disabled selected>Select Doctor</option>
                
                      <?php display_docs(); ?>
                    </select>
                  </div><br/><br/> 


                        <script>
              document.getElementById('doctor').onchange = function updateFees(e) {
                var selection = document.querySelector(`[value=${this.value}]`).getAttribute('data-value');
                document.getElementById('docFees').value = selection;
              };
            </script>

                  <div class="col-md-4"><label>Appointment Date</label></div>
                  <div class="col-md-8"><input type="date" class="form-control datepicker" name="appdate"></div><br><br>

                  <div class="col-md-4"><label>Appointment Time</label></div>
                  <div class="col-md-8">
                    <select name="apptime" class="form-control" id="apptime" required="required">
                      <option value="" disabled selected>Select Time</option>
                      <option value="08:00:00">8:00 AM</option>
                      <option value="10:00:00">10:00 AM</option>
                      <option value="12:00:00">12:00 PM</option>
                      <option value="14:00:00">2:00 PM</option>
                      <option value="16:00:00">4:00 PM</option>
                    </select>

                  </div><br><br>

                  <div class="col-md-4">
                    <input type="submit" name="app-submit" value="Submit" class="btn btn-primary" id="inputbtn">
                  </div>
                  <div class="col-md-8"></div>                  
                </div>
              </form>
            </div>
          </div>
        </div><br>
      </div>
      
<!-- appointment list -->
<?php
//array resetter
$pid = array();
$appdate = array();
$doctor = array ();

$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];

$con=mysqli_connect("localhost","root","","pmsdb");
global $con;

$query = "select * from appointment_tbl where fname ='$fname' and lname='$lname';";
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


      $doctor[] = $row["doctor"];
      
      $userStatus[] = $row["userStatus"];
      
      $doctorStatus[] = $row["doctorStatus"];
     // $appdate[] = $row["appdate"];

      //put the status here
      if(($row['userStatus']==1) && ($row['doctorStatus']==1))
      {
        $status[] = 1; //true 
      } else {
        $status[] = 0; //not active
      }

      $row = $result->fetch_assoc();
  }

  //print the content of the array to debug
  for ($i = 0; $i < $num; $i++){
    //defining the array name
}
}
else {
  echo " "; //"0 results";

}
$con->close();
?>

<!--Hidden Sorting Process-->
<script>

//assign to a js variable 

//main counter
var doctor_js_count = <?php echo json_encode($doctor); ?>;


var doctor_js = <?php echo json_encode($doctor); ?>;
var doctor_js_l = doctor_js.map(doctor_js => doctor_js.toLowerCase());


var status_js = <?php echo json_encode($status); ?>;
//document.write(status_js);
//document.write("<br> size of status" + status_js.length + "<br>")
/*
//diagnosing
//diagnosing
document.write("          content2: " + status_js);*/
</script>


<script>
var i = 0 ;
var j = doctor_js_count.length;
</script>

<script>
  //variable resetter to be used by other call
  var i = 0 ;
  var j = doctor_js_count.length;
document.getElementById("SortBystatus").onclick = Oyelami_sort(status_js,doctor_js_l  ); //this is where to display

</script>

<!--
<button id="SortBystatus" onclick="cocktailSort(status_js,doctor_js_l ); Display13() ">Sort By Appointment Status</button>-->


<script>
function Display13() {
document.write("<br>");
document.write(doctor_js_l);
document.write("<br>");
document.write(status_js );
document.write("<br>");
document.write("FNameFNameDoes it changed and altered the contents?: FName " + "<br>");
document.write(status_js );
document.write("    <----------- Yes, ready for cocktail");
}
</script>
<!--above code is done -->

<!--Hidden Sorting Process-->
<script>
//assign to a js variable
//refresher 
//main counter
var doctor_js_count = <?php echo json_encode($doctor); ?>;


var doctor_js = <?php echo json_encode($doctor); ?>;
var doctor_js_l = doctor_js.map(doctor_js => doctor_js.toLowerCase());



var status_js = <?php echo json_encode($status); ?>;
</script>



<script>
  //variable resetter to be used by other call
  var i = 0 ;
var j = doctor_js_count.length;
document.getElementById("SortByPID1").onclick = Oyelami_sort(doctor_js_l,status_js); //this is where to display

</script>
<!--<button id="SortByPID1" onclick="cocktailSort(doctor_js_l,status_js); Display14()" >Sort By Doctor's Name</button>
-->
<script>
function Display14() {
    document.write("<br>");
    document.write(doctor_js_l);
    document.write("<br>");
    document.write(status_js);
    document.write("<br>");
    document.write("LnameLnameLnameDoes it changed and altered the contents? Lname: " + "<br>");
    document.write(status_js);
    document.write("    <----------- Yes, ready for cocktailss");
}
</script>

 <!--app history -->     
<div class="tab-pane fade" style="margin-top: -140px;" id="app-hist" role="tabpanel" aria-labelledby="list-pat-list">
 

<div class="col-md-8">
                      
                      </div>
             
                      <div class = "frame">
                      </div>
                      <br><br>


<div class='title'>
</div>

<br><br>
<!--table1--><!--table1--><!--table1--><!--table1--><!--table1--><!--table1--><!--table1-->
<script>
            var counter = 0;
            var counterplus = 0;
</script>



<table id="table11" style="width:100%;display:none">

            <script>
              Oyelami_sort(status_js,doctor_js_l );
              cocktailSort(status_js,doctor_js_l);
  </script>
            <tr>
              <th>Midwife Name</th>
              <th>Appointment Status</th>
            </tr>

            <?php 
              //defining conditions
              $con=mysqli_connect("localhost","root","","pmsdb");
              global $con;
              $query = "select * from appointment_tbl where fname ='$fname' and lname='$lname';";
              //$query = "select  pid, appdate from prescription_tbl  where doctor= '$doctor'; ";
              $result = mysqli_query($con,$query);
                        
              while ($row = mysqli_fetch_array($result)){
            ?>

            <tr>
              <td>
                            <script type="text/javascript">
                            document.write(doctor_js_l[counter]);
                          
                            </script>
              </td>

              <td>
                            <script type="text/javascript">
                            //var number = 123;
                            //document.write(number)
                            document.write(status_js[counter]);
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
     
              Oyelami_sort(doctor_js_l, status );
              cocktailSort(doctor_js_l, status);
  </script>

<tr>
    <th>Midwife Name</th>
    <th>Appointment Status</th>
  </tr>

  <?php 
    //defining conditions
    $con=mysqli_connect("localhost","root","","pmsdb");
    global $con;
    $query = "select * from appointment_tbl where fname ='$fname' and lname='$lname';";
    $result = mysqli_query($con,$query);
              
    while ($row = mysqli_fetch_array($result)){
  ?>

  <tr>
    <td>
                  <script type="text/javascript">
                  //var number = 123;
                  //document.write(number)
                  document.write(doctor_js_l[counter]);
                  
                 
                  </script>
    </td>

    <td>
                  <script type="text/javascript">
                  //var number = 123;
                  //document.write(number)
                  document.write(status_js[counter]);
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

<table id="table1100" style="width:100%;"  class="table table-hover">
                <thead>
                  <tr>
                    
                  <th scope="col">Midwife Name</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Appointment Time</th>
                    <th scope="col">Current Status</th>
                    <th scope="col">Action</th>
                    <th scope="col">Receipt</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 

    $con=mysqli_connect("localhost","root","","pmsdb");
    $query = "select * from appointment_tbl where fname ='$fname' and lname='$lname' ORDER BY ID DESC;";
    $result = mysqli_query($con,$query);
                    

                    while ($row = mysqli_fetch_array($result)){
                  ?>
                      <tr>
                      <td><?php echo $row['doctor'];?></td>
                    <!-- <td><?php //echo $row['docFees'];?></td> -->
                    <td><?php echo $row['appdate'];?></td>
                    <td><?php echo $row['apptime'];?></td>
                    <td>
                <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
                {
                  echo "Active";
                }
                if(($row['userStatus']==0) && ($row['doctorStatus']==1))  
                {
                  echo "Cancelled by You";
                }

                if(($row['userStatus']==1) && ($row['doctorStatus']==0))  
                {
                  echo "Cancelled by Midwife";
                }
                    ?></td>
                    <td>
                    <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
                    { ?>

                      
                      <a href="admin-panel.php?ID=<?php echo $row['ID']?>&cancel=update" 
                          onClick="return confirm('Are you sure you want to cancel this appointment ?')"
                          title="Cancel Appointment" tooltip-placement="top" tooltip="Remove"><button class="btn btn-danger">Cancel</button></a>
                      <?php } else {

                            echo "Cancelled";
                            } ?>
                    
                    </td>
                        <td>
                          <form method="get">

                              <a href="admin-panel.php?ID=<?php echo $row['ID']?>">
                              <input type ="hidden" name="ID" value="<?php echo $row['ID']?>"/>
                              <input type = "submit" onclick="alert('Printing Successfully');" name ="generate_bill" class = "btn btn-success" value="Print Receipt"/>
                              </a>
                            </form>
                          </td>

                    
                      </tr>
                    <?php }
                    ?>
                </tbody>
              </table>
 
</div>



<!-- </div> -->

        <table class="table table-hover">
              </table>
      </div>

      <div class="tab-pane fade" id="list-pres" role="tabpanel" aria-labelledby="list-pres-list">
              <table class="table table-striped table-bordered table-hover" >
                <thead>
                  <tr>
                    <th style="background-color: #04AA6D; color:#fff;" scope="col">Age</th>
                    <th  style="background-color: #04AA6D; color:#fff; "scope="col">Antigen</th>
                    <th style="background-color: #04AA6D; color:#fff;" scope="col">Disease_Prevented</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 

                    $con=mysqli_connect("localhost","root","","pmsdb");
                    global $con;
                    $pid = $_SESSION['pid'];       
                      
                    $query = "select * from prescription_tbl  where pid = '$pid' ORDER BY ID DESC;";
                    $result = mysqli_query($con,$query);
                    if(!$result){
                      echo mysqli_error($con);
                    }
                    

                    while ($row = mysqli_fetch_array($result)){
                  ?>
                      <tr>
                     
                        <td><?php echo $row['age'];?></td>
                        <td><?php echo $row['antigen'];?></td>
                        <td><?php echo $row['disease_prevented'];?></td>
                    </form>

                    
                      </tr>
                    <?php }
                    ?>
                </tbody>
              </table>
        <br>
        <br>
      </div>

      <!-- Content List -->
      <div class="tab-pane fade" id="list-content" role="tabpanel" aria-labelledby="list-content-list">
        
        
        <?php
              //  include('list-content.php');
              include('list-content2.php');
              ?>
      </div>
      
      <!-- Chat code -->
   
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
<div class="col-lg-12">
    <div class="panel panel-default" style="height:50px; margin-top:-55px;">
		<span style="font-size:18px; margin-left:10px; position:relative; top:13px;"><strong><span class="glyphicon glyphicon-list"></span> List of Chat Rooms</strong></span>
	</div>
	<table width="100%" class="table table-striped table-bordered table-hover" id="chatRoom">
        <thead>
            <tr>
                <th style="background-color: #04AA6D; color:#fff;" >Chat Room Name</th>
                <th style="background-color: #04AA6D; color:#fff;" >Password</th>
				<th style="background-color: #04AA6D; color:#fff;" >Date Created</th>
				<th style="background-color: #04AA6D; color:#fff;" >Action</th>
			</tr>
		</thead>
		<tbody>
		<?php
        $con=mysqli_connect("localhost","root","","pmsdb");
        global $con;
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

        <td><a style="color: #fff; background-color: #28a745; border-color: #28a745;" href="chatroom2.php?id=<?php echo $row['chatroomid']; ?>" class="btn btn-info"><span class="glyphicon glyphicon-comment"></span> Join</a> 
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
	
	$(document).on('click', '#addchatroom', function(){
		chatname=$('#chat_name').val();
		chatpass=$('#chat_password').val();
			$.ajax({
				url:"add_chatroom2.php",
				method:"POST",
				data:{
					chatname: chatname,
					chatpass: chatpass,
				},
				success:function(data){
				window.location.href='chatroom2.php?id='+data;
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


        

</div>



      <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
        <form class="form-group" method="post" action="func.php">
          <label>Doctors name: </label>
          <input type="text" name="name" placeholder="Enter doctors name" class="form-control">
          <br>
          <input type="submit" name="doc_sub" value="Add Doctor" class="btn btn-primary">
        </form>
      </div>
       <div class="tab-pane fade" id="list-attend" role="tabpanel" aria-labelledby="list-attend-list">...</div>
    </div>
  </div>
</div>
   </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js">
   </script>



  </body>
</html>
