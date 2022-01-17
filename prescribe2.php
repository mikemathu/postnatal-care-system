<!DOCTYPE html>
<?php
include('func1.php');
// include('newfunc.php');
$pid='';
$ID='';
$appdate='';
$apptime='';
$fname = '';
$lname= '';
$doctor = $_SESSION['dname'];
if(isset($_GET['pid']) && isset($_GET['ID']) && ($_GET['appdate']) && isset($_GET['apptime']) && isset($_GET['fname']) && isset($_GET['lname'])) {
$pid = $_GET['pid'];
  $ID = $_GET['ID'];
  $fname = $_GET['fname'];
  $lname = $_GET['lname'];
  $appdate = $_GET['appdate'];
  $apptime = $_GET['apptime'];
}



// if(isset($_POST['prescribe']) && isset($_POST['pid']) && isset($_POST['ID']) && isset($_POST['appdate']) && isset($_POST['apptime']) && isset($_POST['lname']) && isset($_POST['fname'])){
if(isset($_POST['prescribe_btn']) && isset($_POST['child_age']) && isset($_POST['antigen']) && isset($_POST['disease_prevented'])){
  $child_age = $_POST['child_age'];
  $antigen = $_POST['antigen'];
  $disease_prevented = $_POST['disease_prevented'];
  $pid = $_POST['pid'];
  $ID = $_POST['ID'];
  $appdate = $_POST['appdate'];
  $apptime = $_POST['apptime'];
//   $allergy = $_POST['allergy'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];

  $appdate=$_POST['appdate'];
  // $appdate1 = strtotime($appdate);

//   $pid = $_POST['pid'];
//   $ID = $_POST['ID'];
//   $prescription = $_POST['prescription'];
  
//   $query=mysqli_query($con,"insert into prescription_tbl (doctor,pid,ID,fname,lname,appdate,apptime,disease,allergy,prescription) values ('$doctor','$pid','$ID','$fname','$lname','$appdate','$apptime','$disease','$allergy','$prescription')");
  // $query=mysqli_query($con,"insert into prescription_tbl (doctor,pid,ID,fname,lname,appdate,apptime,age,antigen,disease_prevented) values ('$doctor','$pid','$ID', '$fname','$lname','$appdate','$apptime','$child_age','$antigen','$disease_prevented')");
  $query=mysqli_query($con,"insert into prescription_tbl (doctor,pid,ID,fname,lname,appdate,apptime,age,antigen,disease_prevented,next_visit_date) values ('$doctor','$pid','$ID', '$fname','$lname','$appdate','$apptime','$child_age','$antigen','$disease_prevented', '$appdate')");
    if($query)
    {
      echo "<script>alert('Prescribed successfully!');</script>";
      header("Location:doctor-panel.php");

    }
    else{
      echo "<script>alert('Unable to process your request. Try again!');</script>";
    }
  // else{
  //   echo "<script>alert('GET is not working!');</script>";
  // }initial
  // enga error?
}

?>

<html lang="en">
  <head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
     
    <meta name="viewport" content="width=device-width, -scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    
        <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> Gglobal Hospital </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <style >
    .bg-primary {
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
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
        <a class="nav-link" href="logout1.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
        
      </li>
       <li class="nav-item">
       <a class="nav-link" href="doctor-panel.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Back</a>
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
    <h3 style = "margin-left: 40%;  padding-bottom: 20px; font-family: 'IBM Plex Sans', sans-serif;"> Weelcome &nbsp<?php echo $doctor ?>
   </h3>

   <div class="tab-pane" id="list-pres" role="tabpanel" aria-labelledby="list-pres-list">


   <!-- selection -->
   <div >
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <center><h4>Create an appointment</h4></center><br>
              <form class="form-group" method="post" action="prescribe2.php">
                <div class="row">
                  
                  <!-- <?php

                        // $con=mysqli_connect("localhost","root","","pmsdb");
                        // $query=mysqli_query($con,"select * from immunization_tbl ");
                        // $docarray = array();
                        //   while($row =mysqli_fetch_assoc($query))
                        //   {
                        //       $docarray[] = $row;
                        //   }
                        //   echo json_encode($docarray);

                  ?> -->
        
                        <!-- <script>
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

                  </script> -->



                        <!-- <script>
              document.getElementById('doctor').onchange = function updateFees(e) {
                var selection = document.querySelector(`[value=${this.value}]`).getAttribute('data-value');
                document.getElementById('docFees').value = selection;
              };
            </script> -->
                  
                  <!-- <div class="col-md-4"><label for="consultancyfees">
                                Consultancy Fees
                              </label></div>
                              <div class="col-md-8">
                              <div id="docFees">Select a doctor</div>
                              <input class="form-control" type="text" name="docFees" id="docFees" readonly="readonly"/>
                  </div><br><br>

                  <div class="col-md-4"><label>Appointment Date</label></div>
                  <div class="col-md-8"><input type="date" class="form-control datepicker" name="appdate"></div><br><br>

                  <div class="col-md-4"><label>Appointment Time</label></div>
                  <div class="col-md-8">
                    <input type="time" class="form-control" name="apptime">
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
                    <input type="submit" name="app-submit" value="Create new entry" class="btn btn-primary" id="inputbtn">
                  </div>
                  <div class="col-md-8"></div>                  
                </div>
              </form>
            </div>
          </div>
        </div><br>
      </div> -->


        <form class="form-group" name="prescribeform" method="post" action="prescribe2.php">
        
          <div class="row">
                  <!-- <div class="col-md-4"><label>Disease:</label></div> -->
                  <div class="col-md-4"><label>Age: </label></div>
                  <div class="col-md-8">
                  <!-- <input type="text" class="form-control" name="disease" required> -->
                  <!-- <textarea id="disease" cols="86" rows ="5" name="disease" required></textarea> -->
                  <div class="col-md-8">
                          <select name="child_age" class="form-control" id="child_age">
                              <option value="" disabled selected>Select Age</option>
                              <?php 
                              display_age();
                              ?>
                          </select>
                        </div>
                  </div><br><br><br>

                  <script>
                        document.getElementById('child_age').onchange = function updateFees(e) {
                            var selection = document.querySelector(`[value=${this.value}]`).getAttribute('data-antigen');
                            document.getElementById('antigen').value = selection;

                            var selection = document.querySelector(`[value=${this.value}]`).getAttribute('data-pdisease');
                            document.getElementById('disease_prevented').value = selection;
                        };
                    </script>

             
                  
                  <!-- <div class="col-md-4"><label>Allergies:</label></div> -->
                  <div class="col-md-4"><label>Antigen:</label></div>
                  <div class="col-md-8">
                  <!-- <input type="text"  class="form-control" name="allergy" required> -->
                  <!-- <textarea id="allergy" cols="86" rows ="5" name="allergy" required></textarea> -->


                  <div class="col-md-8">
                    <select name="antigen" class="form-control" id="antigen" required="required">
                      <option  value="" disabled selected>Select Antigen</option>
                
                      <?php  display_antigen(); ?>
                    </select>

                 

                    <!-- <input class="form-control" type="text" name="antigen" id="antigen" readonly="readonly"/> -->

                  </div>


                  </div><br><br><br>
                  <!-- <div class="col-md-4"><label>Prescription:</label></div> -->
                  <div class="col-md-4"><label>Disease Prevented:</label></div>
                  <div class="col-md-8">
                  <!-- <input type="text" class="form-control"  name="prescription"  required> -->
                  <!-- <textarea id="prescription" cols="86" rows ="10" name="prescription" required></textarea> -->


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



                  <div class="col-md-8">
                    <select name="disease_prevented" class="form-control" id="disease_prevented">
                        <option value="" disabled selected>Select Disease Prevented</option>
                        <?php 
                      display_disease_prevented();
                        ?>
                    </select>
                </div>


                



                  </div><br><br><br>


                  <div class="col-md-4">
                    <!-- <label>Appointment Date</label> -->
                  </div>
                  <div class="col-md-6"><input disabled type="date" class="form-control datepicker" name="appdate"></div><br><br>

                  <input type="hidden" name="fname" value="<?php echo $fname ?>" />
                  <input type="hidden" name="lname" value="<?php echo $lname ?>" />
                  <input type="hidden" name="appdate" value="<?php echo $appdate ?>" />
                  <input type="hidden" name="apptime" value="<?php echo $apptime ?>" />
                  <input type="hidden" name="pid" value="<?php echo $pid ?>" />
                  <input type="hidden" name="ID" value="<?php echo $ID ?>" />
                  <br><br><br><br>
          <input type="submit" name="prescribe_btn" value="Submit" class="btn btn-primary" style="margin-left: 40pc;">
      
                    </form>
        
        <!-- selection -->
      </div>
    </div>
      

  
