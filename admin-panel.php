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
        echo "<script>alert('We are sorry to inform that the midwife is not available in this time or date. Please choose different time or date!');</script>";
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
			$notifications[]="<i class='fa fa-bell'></i> Hello <b>{$row["fname"]}</b> today you are expected to go for your <b>{$row["age"]}</b> immunization";
		}
	}


  
?>




<html lang="en">
  <head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <script src="Algorithm\Doctor\Oyelami_sort.js"></script>
    <link rel="stylesheet" href="css/tabledesign.css">
    <link rel="stylesheet" href="css/buttona.css">
    <title>PMS - Patient Dashboard</title>
 
    <link rel="stylesheet" href="css/button.css">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="/css/setlocation.css"/>
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
     
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> Postanatal Care </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

    <style >
      .btn-outline-light:hover{
        color: #25bef7;
        background-color: #f8f9fa;
        border-color: #f8f9fa;
      }
    </style>

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
  </style>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav mr-auto">
       <li class="nav-item">
        <!-- <a class="nav-link" href="logout1.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a> -->
        <a class="nav-link" href="home.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
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
   <h3 style = "margin-left: 40%; padding-bottom: 20px; margin-top: -40px;">PATIENT DASHBOARD</h3>
    <h3 style = "margin-left: 40%; padding-bottom: 20px;font-family:'IBM Plex Sans', sans-serif; margin-top:-30px;"> Welcome &nbsp<?php echo $username ?></h3>


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
  <div class="col-md-4" style="max-width:18%;margin-top: 3%;">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" href="#list-dash" role="tab" aria-controls="home" data-toggle="list">Dashboard</a>
      <a class="list-group-item list-group-item-action" href="#list-book" id="list-book-list" role="tab" data-toggle="list" aria-controls="home">Request to see Midwife </a>
      <a class="list-group-item list-group-item-action" href="#list-app" id="list-app-list" role="tab" data-toggle="list" aria-controls="home">Visits' History</a>
      <a class="list-group-item list-group-item-action" href="#list-pat" id="list-pat-list"  role="tab" data-toggle="list" aria-controls="home">Upcoming Visit</a>
      <a class="list-group-item list-group-item-action" href="#list-pres" id="list-pres-list" role="tab" data-toggle="list" aria-controls="home"> Blog</a>
      <a class="list-group-item list-group-item-action" href="#list-doclist" id="list-doclist-list" role="tab" data-toggle="list" aria-controls="home"> Midwives</a>
      <a class="list-group-item list-group-item-action" href="chat.php" > ChatRooms</a>
      <a  href="messages.php" id="btn1" class="list-group-item list-group-item-action">Inbox Messages</a>
      <!-- <a class="list-group-item list-group-item-action" href="#list-loc" id="list-loc-list" role="tab" data-toggle="list" aria-controls="home"> Set Location</a> -->
      
    </div><br>
  </div>
  <div class="col-md-8" style="margin-top: 3%;">
    <div class="tab-content" id="nav-tabContent" style="width: 950px;">
      <div class="tab-pane fade show active" id="list-dash" role="tabpanel" aria-labelledby="list-dash-list">
        
              <div class="container-fluid container-fullw bg-white" >
              <div class="row">
               <div class="col-sm-4" style="left: 5%">
                  <div class="panel panel-white no-radius text-center">                
                    <div class="panel-body" >
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">My Upcoming visits to Midwife</h2>
                    
                      <p class="cl-effect-1">
                        <a href="#app-hist" onclick="clickDiv('#list-pat-list')">
                          View My Upcoming Visits to Midwife
                        </a>
                      </p>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4" style="left: 10%">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body" >
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-list-ul fa-stack-1x fa-inverse"></i> </span>
                      <h4 class="StepTitle" style="margin-top: 5%;">Blogs</h2>
                    
                      <p class="cl-effect-1">
                        <a href="#list-pres" onclick="clickDiv('#list-pres-list')">
                          View Blog List
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
    


<!-- appointment list -->
<?php
//array resetter
// $pid = array();
// $appdate = array();

//  $query = "select  pid, userStatus, doctorStatus from appointment_tbl where doctor= '$doctor'; ";
// $result = mysqli_query($con,$query);

// if ($result->num_rows > 0) {
//   // output data of each row
//   //assigning sql query in array in PHP

//   //defining the size of the row
//   $num = ($result->num_rows);
  
//   //defining row
//   $row = $result->fetch_assoc();

//   //defining the for loop to assign sql values to each index in array php
//   for ($i = 0; $i < $num; $i++){
//       //defining the array name


//       $pid[] = $row["pid"];
//       $userStatus[] = $row["userStatus"];
//       $doctorStatus[] = $row["doctorStatus"];
//      // $appdate[] = $row["appdate"];

//       //put the status here
//       if(($row['userStatus']==1) && ($row['doctorStatus']==1))
//       {
//         $status[] = 1; //true 
//       } else {
//         $status[] = 0; //not active
//       }






//       $row = $result->fetch_assoc();
//   }

//   //print the content of the array to debug
//   for ($i = 0; $i < $num; $i++){
//     //defining the array name
//     //echo  $username[$i] .  "<br />";
//    //echo  $docFees[$i] .  "<br />";
// }
// }
// else {
//   echo " "; //0 results";

// }
// $con->close();
?>




<!--Hidden Sorting Process-->
<script>
//assign to a js variable 

//main counter
var pid_js_count = <?php echo json_encode($pid); ?>;


var pid_js = <?php echo json_encode($pid); ?>;
var pid1_js64 = new Float64Array(pid_js);


var status_js = <?php echo json_encode($status); ?>;

/*
//diagnosing
document.write("content1: " + pid1_js64);


//diagnosing
document.write("          content2: " + status_js);*/
</script>


<script>
var i = 0 ;
var j = pid_js_count.length;
</script>

<script>
  //variable resetter to be used by other call
  var i = 0 ;
  var j = pid_js_count.length;
document.getElementById("SortBystatus").onclick = Oyelami_sort(status_js,pid1_js64  ); //this is where to display

</script>
<!--<button id="SortBystatus" onclick="cocktailSort(status_js,pid1_js64 ); Display13() ">Sort By Appointment Status</button>
-->

<script>
function Display13() {
document.write("<br>");
document.write(pid1_js64);
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
var pid_js_count = <?php echo json_encode($pid); ?>;


var pid_js = <?php echo json_encode($pid); ?>;
var pid1_js64 = new Float64Array(pid_js);


var status_js = <?php echo json_encode($status); ?>;

</script>



<script>
  //variable resetter to be used by other call
  var i = 0 ;
var j = pid_js_count.length;
document.getElementById("SortByPID1").onclick = Oyelami_sort(pid1_js64,status_js); //this is where to display

</script>
<!--<button id="SortByPID1" onclick="cocktailSort(pid1_js64,status_js); Display14()" >Sort By Patient's ID - Appointment </button>
-->
<script>
function Display14() {
    document.write("<br>");
    document.write(pid1_js64);
    document.write("<br>");
    document.write(status_js);
    document.write("<br>");
    document.write("LnameLnameLnameDoes it changed and altered the contents? Lname: " + "<br>");
    document.write(status_js);
    document.write("    <----------- Yes, ready for cocktailss");
}
</script>



    <div class="tab-pane fade" id="list-app" role="tabpanel" aria-labelledby="list-home-list">
        
    <div class="col-md-8">
                      
                      </div>
             
                      <div class = "frame">
                
                      </div>
                      <br><br>






    <div class='title' style="margin-top:-150px; ">
<!-- <h1>Table Sorting in JavaScript (Oyelami + CockTail Sort)</h1> -->
</div>

<!-- <button style="color: #fff; background-color: #28a745; border-color: #28a745;"  id="btn11005" class="btn btn-primary">Original Order</button>
<button style="color: #fff; background-color: #28a745; border-color: #28a745;" id="btn115" class="btn btn-primary">Sort By Appointment Status </button>
<button style="color: #fff; background-color: #28a745; border-color: #28a745;" id="btn225" class="btn btn-primary">Sort By Patient ID </button>
<br><br> -->






<!--table1--><!--table1--><!--table1--><!--table1--><!--table1--><!--table1--><!--table1-->
<script>
            var counter = 0;
            var counterplus = 0;
</script>

<table id="table115" style="width:100%;display:none">

            <script>
              Oyelami_sort(status_js,pid1_js64 );
              cocktailSort(status_js,pid1_js64);
  </script>
            <tr>
              <th>Patient ID</th>
              <th>Status</th>
              <th>Vaccination</th>
            </tr>

            <?php 
              //defining conditions
              // $con=mysqli_connect("localhost","root","","pmsdb");
              // global $con;
              // $query = "select  pid, userStatus, doctorStatus from appointment_tbl where doctor= '$doctor'; ";
             
              // $result = mysqli_query($con,$query);
                        
              // while ($row = mysqli_fetch_array($result)){
            ?>

            <tr>
              <td>
                            <script type="text/javascript">
                           // document.write(pid1_js64[counter]);
                          
                            </script>
              </td>

              <td>
                            <script type="text/javascript">
                            //var number = 123;
                            //document.write(number)
                           // document.write(status_js[counter]);
                          
                            </script>
              </td>

              <td>


              <script>
              //  if((status_js[counter]) == 1){
              // document.write('<button class="btn btn-success">Prescibe</button>')
              //  }else{
              //   document.write('<button class="btn btn-danger">Inactive</button>')
              //  }
              //  counter++;
              
              </script>



              </td>
            </tr>
            <?php //}
          ?>
</table>



<!--table2--><!--table2--><!--table2--><!--table2--><!--table2--><!--table2--><!--table2-->
<script>
            var counter = 0;
            var counterplus = 0;
</script>
<table id="table225" style="width:100%;display:none">

<script>
              Oyelami_sort(pid1_js64, status_js );
              cocktailSort(pid1_js64, status_js);
  </script>

<tr>
    <th>Patient ID</th>
    <th>Status</th>
    <th>Vaccination</th>
  </tr>

  <?php 
    //defining conditions
    // $con=mysqli_connect("localhost","root","","pmsdb");
    // global $con;
    // $query = "select  pid, userStatus, doctorStatus from appointment_tbl where doctor= '$doctor'; ";
    // $result = mysqli_query($con,$query);
              
    // while ($row = mysqli_fetch_array($result)){
  ?>

  <tr>
    <td>
                  <script type="text/javascript">
                  //var number = 123;
                  //document.write(number)
                  // document.write(pid1_js64[counter]);
                  
                 
                  </script>
    </td>

    <td>
                  <script type="text/javascript">
                  //var number = 123;
                  //document.write(number)
                  // document.write(status_js[counter]);
                
                  </script>
    </td>
    
    <td>

<script>
    // if((status_js[counter]) == 1){
    //           document.write('<button class="btn btn-success">Prescibe</button>')
    //            }else{
    //             document.write('<button class="btn btn-danger">Inactive</button>')
    //            }
    //            counter++;
</script>


</td>



  </tr>
  <?php //}
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


<script>
document.getElementById("btn115").addEventListener("click", function(){

  document.getElementById("table115").style.display = "block";
  document.getElementById("table225").style.display = "none";//hide
  document.getElementById("table11005").style.display = "none";//hide
});
document.getElementById("btn225").addEventListener("click", function(){
  document.getElementById("table225").style.display = "block";
  document.getElementById("table115").style.display = "none";//hide
  document.getElementById("table11005").style.display = "none";//hide
});
document.getElementById("btn11005").addEventListener("click", function(){
  document.getElementById("table11005").style.display = "block";
  document.getElementById("table115").style.display = "none";//hide
  document.getElementById("table225").style.display = "none";//hide
});
</script>







      </div>


      <!-- Patients List -->
      <div class="tab-pane fade" id="list-pat" role="tabpanel" aria-labelledby="list-pat-list">


                  <div style="margin-top: -135px;" class="col-md-8">
                      
                      </div>
             
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
<table class="table table-striped table-bordered table-hover" >
                <thead>
                  <tr>
                    <th style="background-color: #04AA6D; color:#fff;" scope="col">Age</th>
                    <th  style="background-color: #04AA6D; color:#fff; "scope="col">Antigen</th>
                    <th style="background-color: #04AA6D; color:#fff;" scope="col">Disease_Prevented</th>
                    <th style="background-color: #04AA6D; color:#fff;" scope="col">Next Visit Day</th>
                    <th style="background-color: #04AA6D; color:#fff;" scope="col">Status</th>
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
                        <td><?php echo $row['next_visit_date'];?></td>
                        
            <td>
    <?php 
    if(($row['status']==0))  
    {
      echo "Pedding";
    }
    if(($row['status']==1))  
    {
      echo "Done";
    }
        ?>
        </td>
                    </form>

                    
                      </tr>
                    <?php }
                    ?>
                </tbody>
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
      </div>
      <!-- end of list-pat-list-->


      <!-- Book Appointments -->
      <div class="tab-pane fade" id="list-book" role="tabpanel" aria-labelledby="list-book-list">

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




















<script src="Algorithm\Doctor\Oyelami_sort.js"></script>

<!--list pres -->


<?php 

//array resetter
// $pid = array();
// $appdate = array();

//  $query = "select  pid, appdate from prescription_tbl  where doctor= '$doctor'; ";
// $result = mysqli_query($con,$query);

// if ($result->num_rows > 0) {
//   // output data of each row
//   //assigning sql query in array in PHP

//   //defining the size of the row
//   $num = ($result->num_rows);
  
//   //defining row
//   $row = $result->fetch_assoc();

//   //defining the for loop to assign sql values to each index in array php
//   for ($i = 0; $i < $num; $i++){
//       //defining the array name


//       $pid[] = $row["pid"];
//       $appdate[] = $row["appdate"];
//       $row = $result->fetch_assoc();
//   }

//   //print the content of the array to debug
//   for ($i = 0; $i < $num; $i++){
//     //defining the array name
//     //echo  $username[$i] .  "<br />";
//    //echo  $docFees[$i] .  "<br />";
// }
// }
// else {
//   echo " "; //0 results";

// }
// $con->close();
?>


<!--Hidden Sorting Process-->
<script>
//assign to a js variable 

//main counter
var pid_js_count = <?php echo json_encode($pid); ?>;


var pid_js = <?php echo json_encode($pid); ?>;
var pid_js64 = new Float64Array(pid_js);

var appdate_js = <?php echo json_encode($appdate); ?>;

</script>


<script>
var i = 0 ;
var j = pid_js_count.length;
</script>

<script>
  //variable resetter to be used by other call
  var i = 0 ;
  var j = pid_js_count.length;
document.getElementById("SortByPID").onclick = Oyelami_sort(pid_js64,appdate_js  ); //this is where to display

</script>
<!--<button id="SortByPID" onclick="cocktailSort(pid_js64,appdate_js ); Display11() ">Sort By Patient ID - Prescription</button>
-->
<script>
function Display11() {
document.write("<br>");
document.write(pid_js64);
document.write("<br>");
document.write(appdate_js );
document.write("<br>");
document.write("FNameFNameDoes it changed and altered the contents?: FName " + "<br>");
document.write(appdate_js );
document.write("    <----------- Yes, ready for cocktail");
}
</script>
<!--above code is done -->




<!--Hidden Sorting Process-->
<script>
//assign to a js variable
//refresher 
//main counter
var pid_js_count = <?php echo json_encode($pid); ?>;


var pid_js = <?php echo json_encode($pid); ?>;
var pid_js64 = new Float64Array(pid_js);

var appdate_js = <?php echo json_encode($appdate); ?>;

</script>



<script>
  //variable resetter to be used by other call
  var i = 0 ;
var j = pid_js_count.length;
document.getElementById("SortByAPP").onclick = Oyelami_sort(appdate_js,pid_js64); //this is where to display

</script>
<!--<button id="SortByAPP" onclick="cocktailSort(appdate_js,pid_js64); Display12()" >Sort By Patient's Appointment - Prescription </button>
-->

<script>
function Display12() {
    document.write("<br>");
    document.write(pid_js64);
    document.write("<br>");
    document.write(appdate_js);
    document.write("<br>");
    document.write("LnameLnameLnameDoes it changed and altered the contents? Lname: " + "<br>");
    document.write(appdate_js);
    document.write("    <----------- Yes, ready for cocktailss");
}
</script>





      

      <div class="tab-pane fade" id="list-pres" role="tabpanel" aria-labelledby="list-pres-list">



      <div class='title' style="margin-top:-60px;">
<!-- <h1>Table Sorting in JavaScript (Oyelami + CockTail Sort)</h1> -->
</div>

<!-- <button style="color: #fff; background-color: #28a745; border-color: #28a745;" id="btn100" class="btn btn-primary">Original Order</button>
<button style="color: #fff; background-color: #28a745; border-color: #28a745;" id="btn1" class="btn btn-primary">Sort By Patient ID</button>
<button style="color: #fff; background-color: #28a745; border-color: #28a745;" id="btn2" class="btn btn-primary">Sort By Appointment Date</button>
<br><br> -->


<!--table1--><!--table1--><!--table1--><!--table1--><!--table1--><!--table1--><!--table1-->
<script>
            var counter = 0;
            var counterplus = 0;
</script>





<!--table2--><!--table2--><!--table2--><!--table2--><!--table2--><!--table2--><!--table2-->
<script>
            var counter = 0;
            var counterplus = 0;
</script>





<!--table100-->
<script>
            var counter = 0;
            var counterplus = 0;
</script>
<?php
              //  include('list-content.php');
              include('list-content2.php');
              ?>
 
</div>
<!-- End of list-pres-list -->

<!-- Doc List -->
<div class="tab-pane fade" id="list-doclist" role="tabpanel" aria-labelledby="list-doclist-list">

<!-- <a style="color: #fff; background-color: #342ac1; border-color: #342ac1;" href="messages.php" id="btn1" class="btn btn-primary">Inbox Messages</a> -->

<br><br>

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
  

</table>

        

     
      </div>
      <!-- End of doclist -->






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

</div>

        <table class="table table-hover">
              </table>
      </div>















































      <!-- <div class="tab-pane fade" id="list-loc" role="tabpanel" aria-labelledby="list-loc-list">
        <table class="table table-hover">
                
  
<p> Set location </p>
<a href="setlocation.php">Click Here to set your location</a>









                </tbody>
              </table>
      </div> -->

































      <div class="tab-pane fade" id="list-pres" role="tabpanel" aria-labelledby="list-pres-list">
        <table class="table table-hover">
                <thead>
                  <tr>
                    
                    <th scope="col">Patient ID</th>
                    
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Appointment ID</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Appointment Time</th>
                    <th scope="col">Disease</th>
                    <th scope="col">Allergy</th>
                    <th scope="col">Allergy</th>
                    <th scope="col">Vaccination</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 

                    $con=mysqli_connect("localhost","root","","pmsdb");
                    global $con;

                    $query = "select pid,fname,lname,ID,appdate,apptime,disease,allergy,prescription from prescription_tbl  where doctor='$doctor';";
                    
                    $result = mysqli_query($con,$query);
                    if(!$result){
                      echo mysqli_error($con);
                    }
                    

                    while ($row = mysqli_fetch_array($result)){
                  ?>
                      <tr>
                        <td><?php echo $row['pid'];?></td>
                        <td><?php echo $row['fname'];?></td>
                        <td><?php echo $row['lname'];?></td>
                        <td><?php echo $row['ID'];?></td>
                        
                        <td><?php echo $row['appdate'];?></td>
                        <td><?php echo $row['apptime'];?></td>
                        <td><?php echo $row['disease'];?></td>
                        <td><?php echo $row['allergy'];?></td>
                        <td><?php echo $row['prescription'];?></td>
                    
                      </tr>
                    <?php }
                    ?>
                </tbody>
              </table>

      </div>


      <!-- Inbox -->
      <div class="tab-pane fade"   id="list-inbox" role="tabpanel" aria-labelledby="list-inbox-list">
       
<div class="card" style="padding:20px 20px 5px 20px;">
			<div class="panel panel-success" >
			  <div class="panel-heading"><h3>All Messages</h3></div>
			  <div class="panel-body" ><h4 style="font-size: 1rem!important;" >
                  <table style="width:100%">
                      <tr>
                          <td style="font-weight:bold; padding-bottom:10px;">Message</td>
                          <td style="font-weight:bold; padding-bottom:10px;">From</td>
                      </tr>
                      <?php
                        $conn=mysqli_connect("localhost","root","","pmsdb");

                        

                      	$sql = "SELECT * from messageInbox_tbl  WHERE receiver='$doctor' ORDER BY timestamp DESC";
                        $result = $conn->query($sql);
                        // $f=0;
                      	// if ($result->num_rows > 0) {
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

                 

                                echo '
                                <form action="reply.php" method="post">
                                <input type="hidden" name="sr" value="ccc">
                                    <tr>
                                    <td><textarea readonly disabled style="backgroung-color:white; resize:none; border-color:white;">'.$msg.'</textarea></td>
                                    <td>'.$sender.'</td>
                                    </form>
                                    <form action="reply.php" method="post">
                                    <input type="hidden" name="rep" value="bbb">
                                    <td>
                                  
                                    '; ?>
                                    <?php

                                         $con=mysqli_connect("localhost","root","","pmsdb");
                    global $con;
                    $query = "select * from patient_tbl  where fname='$sender'";
                    $resul = mysqli_query($con,$query);
                      
                  while ($row = mysqli_fetch_array($resul)){
                    $pid = $row['pid'];
                  }
                                    ?>
                                    <?php

                                    

                                    ?>
                                    <!-- <a href="reply.php?id=<?php //echo $row['chatroomid']; ?>" type="submit" class="btn btn-primary btn-lg"> -->
                                    <a style="color: #fff; background-color: #28a745; border-color: #28a745; margin: 1px 0px padding:0px!important" href="reply.php?id=<?php echo $pid; ?>" type="submit" class="btn btn-primary">
                                    Reply
                                    </a>
                                   <?php
                                   '
                                    </td>
                                    </tr>
                                </form>
                                ';

                                }
                              
                        // } else {
                        //     echo "<tr></tr><tr><td></td><td>N/A</td></tr>";
                        // }

                       ?>
                     </table>
              </h4></div>
			</div>
			<p></p>
		</div>
      </div>
      <!-- End of Inbox -->


      

      <div class="tab-pane fade" id="list-app" role="tabpanel" aria-labelledby="list-pat-list">
        
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Eemail</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Doctor Name</th>
                    <th scope="col">Consultancy Fees</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Appointment Time</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 

                    $con=mysqli_connect("localhost","root","","pmsdb");
                    global $con;

                    $query = "select * from appointment_tbl;";
                    $result = mysqli_query($con,$query);
                    while ($row = mysqli_fetch_array($result)){
              
                      #$fname = $row['fname'];
                      #$lname = $row['lname'];
                      #$email = $row['email'];
                      #$contact = $row['contact'];
                  ?>
                      <tr>
                        <td><?php echo $row['fname'];?></td>
                        <td><?php echo $row['lname'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['contact'];?></td>
                        <td><?php echo $row['doctor'];?></td>
                        <td><?php echo $row['docFees'];?></td>
                        <td><?php echo $row['appdate'];?></td>
                        <td><?php echo $row['apptime'];?></td>
                      </tr>
                    <?php } ?>
                </tbody>
              </table>
        <br>
      </div>








     
      


      <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
        <form class="form-group" method="post" action="admin-panel1.php">
          <div class="row">
                  <div class="col-md-4"><label>Doctor Name:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="doctor" required></div><br><br>
                  <div class="col-md-4"><label>Password:</label></div>
                  <div class="col-md-8"><input type="password" class="form-control"  name="dpassword" required></div><br><br>
                  <div class="col-md-4"><label>Email ID:</label></div>
                  <div class="col-md-8"><input type="email"  class="form-control" name="demail" required></div><br><br>
                  <div class="col-md-4"><label>Consultancy Fees:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control"  name="docFees" required></div><br><br>
                </div>
          <input type="submit" name="docsub" value="Add Doctor" class="btn btn-primary">
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
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
  </body>
</html>
