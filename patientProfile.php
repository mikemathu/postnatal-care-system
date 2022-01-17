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

if(isset($_POST["editpatient"])){
    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $email=$_POST["email"];
    $contact=$_POST["contact"];
    // $password=$_POST["password"];
    // $cpassword=$_POST["cpassword"];

    // $sql = "UPDATE patient_tbl SET fname='$fname',lname='$lname', email='$email', contact='$contact' password='$password' cpassword='$password'  WHERE fname='$username'";
    $sql = "UPDATE patient_tbl SET fname='$fname',lname='$lname', email='$email', contact='$contact'  WHERE fname='$username'";
    
    $result = $con->query($sql);
    if($result==true){
        // header("location: farmerProfile2.php");
        echo "<script>alert('Updated Successfully');</script>";
    }
}

if(isset($_POST['addchild'])) {
  $child_fname=$_POST['child_fname'];
  $child_lname=$_POST['child_lname'];
  $child_gender=$_POST['child_gender'];
  $date_of_birth=$_POST['date_of_birth'];
 
  $query="insert into childinfo_tbl (username,password,email,docFees)values('$doctor','$dpassword','$demail','$docFees')";
  $result=mysqli_query($con,$query);
  if($result)
    {
      echo "<script>alert('Doctor added successfully!');</script>";

  }
}

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
  $pid = $_SESSION['pid'];
  $output='';
  $query=mysqli_query($con,"select p.pid,p.ID,p.fname,p.lname,p.doctor,p.appdate,p.apptime,p.disease,p.allergy,p.prescription,a.docFees from prescription_tbl  p inner join appointment_tbl a on p.ID=a.ID and p.pid = '$pid' and p.ID = '".$_GET['ID']."'");
  while($row = mysqli_fetch_array($query)){
    $output .= '
    <label> Patient ID : </label>'.$row["pid"].'<br/><br/>
    <label> Appointment ID : </label>'.$row["ID"].'<br/><br/>
    <label> Patient Name : </label>'.$row["fname"].' '.$row["lname"].'<br/><br/>
    <label> Doctor Name : </label>'.$row["doctor"].'<br/><br/>
    <label> Appointment Date : </label>'.$row["appdate"].'<br/><br/>
    <label> Appointment Time : </label>'.$row["apptime"].'<br/><br/>
    <label> Disease : </label>'.$row["disease"].'<br/><br/>
    <label> Allergies : </label>'.$row["allergy"].'<br/><br/>
    <label> Prescription : </label>'.$row["prescription"].'<br/><br/>
    <label> Fees Paid : </label>'.$row["docFees"].'<br/>    
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
      <h3 align ="center"> Bill</h3> 

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

?>
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
    <div class="row">
  <div class="col-md-4" style="max-width:25%; margin-top: 3%">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" href="admin-panel.php" >Back to Dashboard</a>
      <!-- <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Book Appointment</a> -->
    </div><br>
  </div>
  <div class="col-md-8" style="margin-top: 3%;">
    <div class="tab-content" id="nav-tabContent" style="width: 950px;">
      <div class="tab-pane fade  show active" id="list-dash" role="tabpanel" aria-labelledby="list-dash-list">
        <h1>Patient Profile</h1>




                    <!-- Edit Profile -->
                    <!-- <div class="tab-pane fade" id="list-home" role="tabpanel" aria-labelledby="list-home-list"> -->
        <!-- <h1>Edit Profile</h1> -->

        
        <div class="container">
        <div class="row">
            <div class="col-md-8 ">
              

                <?php

$con=mysqli_connect("localhost","root","","pmsdb");
global $con;
$pid = $_SESSION['pid'];       
  
//$query = "select doctor,ID,appdate,apptime,disease,allergy,prescription from prescription_tbl  where pid='$pid';";
$query = "select * from patient_tbl  where fname = '$username';";
$result = mysqli_query($con,$query);

while ($row = mysqli_fetch_array($result)){

}
?>  

                <form id="registrationForm" action="patientprofile.php" method="post" class="form-horizontal">

                <!-- <div class="form-group">
                    <label class="col-sm-4 control-label">Choose photo</label>
                        <div class="col-sm-5">
                        <input type="file" name="photo" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                </div> -->
                <div class="form-group">
                    <label class="col-sm-4 control-label">First Name</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="fname" value="<?php echo $fname; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Last Name</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="lname" value="<?php echo $lname; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Email</label>
                    <div class="col-sm-5">
                        <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Contact</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="contact" value="<?php echo $contact; ?>" />
                    </div>
                </div>

<?php

//                 $query = "select * from patient_tbl where fname ='$fname' and lname='$lname';";
//   $result = mysqli_query($con,$query);
            
//   while ($row = mysqli_fetch_array($result)){
    
//     $password = $row['password'];
//     $cpassword = $row['cpassword'];

//     echo '
//     <div class="form-group">
//     <label class="col-sm-4 control-label">Password</label>
//     <div class="col-sm-5">
//         <input type="text" class="form-control" name="password" value='. $password.' />
//     </div>
// </div>
// <div class="form-group">
//     <label class="col-sm-4 control-label">Confirm Password</label>
//     <div class="col-sm-5">
//         <input type="text" class="form-control" name="cpassword" value='.$cpassword.' />
//     </div>
// </div>

// <div class="form-group">
//     <div class="col-sm-9 col-sm-offset-3">
//         <button type="submit" name="editpatient" class="btn btn-info btn-lg">Save changes</button>
//     </div>
// </div>
    
    
//     ';

//   }

  ?>

<div class="form-group">
     <div class="col-sm-9 col-sm-offset-3">
         <button type="submit" name="editpatient" class="btn btn-info btn-lg">Edit Profile</button>
     </div>
 </div>
            
            </form>

            

            </div>


            <!--  -->
            <!-- <div class="col-md-8 ">
                <div class="page-header">
                    <h2>Add child Info</h2>
            </div>

                <?php   
                
  // $con=mysqli_connect("localhost","root","","pmsdb");
// global $con;
// $pid = $_SESSION['pid'];       
  
// //$query = "select doctor,ID,appdate,apptime,disease,allergy,prescription from prescription_tbl  where pid='$pid';";
// $query = "select * from patient_tbl  where fname = '$username';";
// $result = mysqli_query($con,$query);

// while ($row = mysqli_fetch_array($result)){

// }  

?>
<?php
// $con=mysqli_connect("localhost","root","","pmsdb");
// global $con;
// $queryy = "select * from patient_tbl  where fname=$username";
// $resultt = mysqli_query($con,$query);
          
// while ($row = mysqli_fetch_array($resultt)){
//   $mother_id = $row['pid'];

// //   echo  ' Mother ID IS'.$mother_id;
// }
  echo  ' Mother ID IS'.$mother_id;

$queryy = "select * from childInfo_tbl  where mother_id=$mother_id";
$resultt = mysqli_query($con,$query);
          
while ($row = mysqli_fetch_array($resultt)){
  $child_fname = $row['child_fname'];

}
//   echo  ' Mother ID IS'.$mother_id;
// }

// echo '
// Niaje
//                 <form action="patientProfile.php" method="post" >

//                 <!-- <div class="form-group">
//                     <label class="col-sm-4 control-label">Choose photo</label>
//                         <div class="col-sm-5">
//                         <input type="file" name="photo" class="form-control-file" id="exampleFormControlFile1">
//                     </div>
//                 </div> -->
//                 <div class="form-group">
//                     <label class="col-sm-4 control-label">First Name</label>
//                     <div class="col-sm-5">
// <input type="text" class="form-control" name="child_fname" value=" '.
//  $row["child_fname"].' " />
//                     </div>
//                 </div>

//                 <div class="form-group">
//                     <label class="col-sm-4 control-label">Last Name</label>
//                     <div class="col-sm-5">
//                         <input type="text" class="form-control" name="child_lname" value="<?php //echo $lname; ?>" />
//                     </div>
//                 </div>

//                 <div class="form-group">
//             <label class="col-sm-4 control-label">Gender</label>
//             <div class="col-sm-5">

//                 <select  name="child_gender" class="form-control" id="doctor" required="required">
//                     <option value="<?php //echo $farm_size; ?>" disabled selected>Select gender of your child</option>                
//                     <option value="Male">Male</option>
//                     <option value="Female">Female</option>
//                 </select>

//             </div>
//         </div>

//         <div class="col-md-4"><label>Date of Birth</label></div>
//         <div class="col-md-8"><input type="date" class="form-control datepicker" name="date_of_birth"></div><br><br>

//                 <div class="form-group">
//                     <div class="col-sm-9 col-sm-offset-3">
//                         <!-- Do NOT use name="submit" or id="submit" for the Submit button 
//                         <button type="submit" name="addchild" class="btn btn-info btn-lg">Ssave changes</button>
//                     </div>
//                 </div>
//             </form> ';
            
    ?>
            

            </div> -->
            
        </div>
    </div>
      </div>

      <!-- End of edit profile -->
                
          


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

      

      <div class="tab-pane fade" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
        <h1>Edit Profile</h1>

        
        <div class="container">
        <div class="row">
            <div class="col-md-8 ">
              

                <?php

$con=mysqli_connect("localhost","root","","pmsdb");
global $con;
$pid = $_SESSION['pid'];       
  
//$query = "select doctor,ID,appdate,apptime,disease,allergy,prescription from prescription_tbl  where pid='$pid';";
$query = "select * from patient_tbl  where fname = '$username';";
$result = mysqli_query($con,$query);

while ($row = mysqli_fetch_array($result)){

}
?>  

                <form id="registrationForm" action="patientprofile.php" method="post" class="form-horizontal">

                <!-- <div class="form-group">
                    <label class="col-sm-4 control-label">Choose photo</label>
                        <div class="col-sm-5">
                        <input type="file" name="photo" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                </div> -->
                <div class="form-group">
                    <label class="col-sm-4 control-label">First Name</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="fname" value="<?php echo $fname; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Last Name</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="lname" value="<?php echo $lname; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Email</label>
                    <div class="col-sm-5">
                        <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Contact</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="contact" value="<?php echo $contact; ?>" />
                    </div>
                </div>

<?php

//                 $query = "select * from patient_tbl where fname ='$fname' and lname='$lname';";
//   $result = mysqli_query($con,$query);
            
//   while ($row = mysqli_fetch_array($result)){
    
//     $password = $row['password'];
//     $cpassword = $row['cpassword'];

//     echo '
//     <div class="form-group">
//     <label class="col-sm-4 control-label">Password</label>
//     <div class="col-sm-5">
//         <input type="text" class="form-control" name="password" value='. $password.' />
//     </div>
// </div>
// <div class="form-group">
//     <label class="col-sm-4 control-label">Confirm Password</label>
//     <div class="col-sm-5">
//         <input type="text" class="form-control" name="cpassword" value='.$cpassword.' />
//     </div>
// </div>

// <div class="form-group">
//     <div class="col-sm-9 col-sm-offset-3">
//         <button type="submit" name="editpatient" class="btn btn-info btn-lg">Save changes</button>
//     </div>
// </div>
    
    
//     ';

//   }

  ?>

<div class="form-group">
     <div class="col-sm-9 col-sm-offset-3">
         <button type="submit" name="editpatient" class="btn btn-info btn-lg">Save changes</button>
     </div>
 </div>
            
            </form>

            

            </div>


            <!--  -->
            <!-- <div class="col-md-8 ">
                <div class="page-header">
                    <h2>Add child Info</h2>
            </div>

                <?php   
                
  // $con=mysqli_connect("localhost","root","","pmsdb");
// global $con;
// $pid = $_SESSION['pid'];       
  
// //$query = "select doctor,ID,appdate,apptime,disease,allergy,prescription from prescription_tbl  where pid='$pid';";
// $query = "select * from patient_tbl  where fname = '$username';";
// $result = mysqli_query($con,$query);

// while ($row = mysqli_fetch_array($result)){

// }  

?>
<?php
// $con=mysqli_connect("localhost","root","","pmsdb");
// global $con;
// $queryy = "select * from patient_tbl  where fname=$username";
// $resultt = mysqli_query($con,$query);
          
// while ($row = mysqli_fetch_array($resultt)){
//   $mother_id = $row['pid'];

// //   echo  ' Mother ID IS'.$mother_id;
// }
  echo  ' Mother ID IS'.$mother_id;

$queryy = "select * from childInfo_tbl  where mother_id=$mother_id";
$resultt = mysqli_query($con,$query);
          
while ($row = mysqli_fetch_array($resultt)){
  $child_fname = $row['child_fname'];

}
//   echo  ' Mother ID IS'.$mother_id;
// }

// echo '
// Niaje
//                 <form action="patientProfile.php" method="post" >

//                 <!-- <div class="form-group">
//                     <label class="col-sm-4 control-label">Choose photo</label>
//                         <div class="col-sm-5">
//                         <input type="file" name="photo" class="form-control-file" id="exampleFormControlFile1">
//                     </div>
//                 </div> -->
//                 <div class="form-group">
//                     <label class="col-sm-4 control-label">First Name</label>
//                     <div class="col-sm-5">
// <input type="text" class="form-control" name="child_fname" value=" '.
//  $row["child_fname"].' " />
//                     </div>
//                 </div>

//                 <div class="form-group">
//                     <label class="col-sm-4 control-label">Last Name</label>
//                     <div class="col-sm-5">
//                         <input type="text" class="form-control" name="child_lname" value="<?php //echo $lname; ?>" />
//                     </div>
//                 </div>

//                 <div class="form-group">
//             <label class="col-sm-4 control-label">Gender</label>
//             <div class="col-sm-5">

//                 <select  name="child_gender" class="form-control" id="doctor" required="required">
//                     <option value="<?php //echo $farm_size; ?>" disabled selected>Select gender of your child</option>                
//                     <option value="Male">Male</option>
//                     <option value="Female">Female</option>
//                 </select>

//             </div>
//         </div>

//         <div class="col-md-4"><label>Date of Birth</label></div>
//         <div class="col-md-8"><input type="date" class="form-control datepicker" name="date_of_birth"></div><br><br>

//                 <div class="form-group">
//                     <div class="col-sm-9 col-sm-offset-3">
//                         <!-- Do NOT use name="submit" or id="submit" for the Submit button 
//                         <button type="submit" name="addchild" class="btn btn-info btn-lg">Ssave changes</button>
//                     </div>
//                 </div>
//             </form> ';
            
    ?>
            

            </div> -->
            
        </div>
    </div>
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


<script>
// document.getElementById("btn11").addEventListener("click", function(){

//   document.getElementById("table11").style.display = "block";
//   document.getElementById("table22").style.display = "none";//hide
//   document.getElementById("table1100").style.display = "none";//hide
// });
// document.getElementById("btn22").addEventListener("click", function(){
//   document.getElementById("table22").style.display = "block";
//   document.getElementById("table11").style.display = "none";//hide
//   document.getElementById("table1100").style.display = "none";//hide
// });
// document.getElementById("btn1100").addEventListener("click", function(){
//   document.getElementById("table1100").style.display = "block";
//   document.getElementById("table11").style.display = "none";//hide
//   document.getElementById("table22").style.display = "none";//hide
// });
</script>

</div>

        <table class="table table-hover">
              </table>
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
