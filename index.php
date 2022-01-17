<html>
<head>
	<title>PMS - Login</title>
	<!-- <!-- <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" /> --> 
    <link rel="stylesheet" type="text/css" href="style1.css">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<style >
     .form-control {
    border-radius: 0.75rem;
}

#loading {
	position: fixed;
	width: 100%;
	height: 100vh;
	background:#3736b2
	url('assets/wecare4u.gif')
	no-repeat center;
	z-index: 99999;
}

#preloader {
  transition:1s ease;
}

#wrapper {
  opacity:0;/*Remove display and hide opacity*/
 }
</style>

<script>
    var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('cpassword').value) {
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
}

function checklen()
{
    var pass1 = document.getElementById("password");  
    if(pass1.value.length<6){  
        alert("Password must be at least 6 characters long. Try again!");  
        return false;  
  }  
}

if(isset($_POST['docsub']))
{
  $Midwife=$_POST['Midwife'];
  $dpassword=$_POST['dpassword'];
  $demail=$_POST['demail'];
  $spec=$_POST['special'];
  $docFees=$_POST['docFees'];
  $dgender = $_POST['dgender'];
  $docContact = $_POST['docContact'];
  $docAddress = $_POST['docAddress'];
  $query="insert into midwife_tbl (username,password,email,spec,docFees,gender,docContact, docAddress)values('$Midwife','$dpassword','$demail','$spec','$docFees','$dgender', '$docContact', '$docAddress')";
  $result=mysqli_query($con,$query);
  if($result)
    {
      echo 
       alert("Midwife added successfully!") 
  }
}

</script>

</head>

<!------ Include the above in your HEAD tag ---------->
<!-- <body  style="background-color:rgba(88, 82, 182, 0.9);"> -->
<body  style="background: -webkit-linear-gradient(left, #3f5efb, #fc466b);color: #e4d6d6;">

<!-- <div id = "loading"></div> -->



<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" >
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#" style="margin-top: 10px;margin-left:-65px;font-family: 'IBM Plex Sans', sans-serif;"><h4><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp POSTNATAL CARE</h4></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item" style="margin-right: 40px;">
            <a class="nav-link js-scroll-trigger" href="home.php" style="color: white;font-family: 'IBM Plex Sans', sans-serif;"><h6>HOME</h6></a>
          </li>
  
         

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="contactpage.php" style="color: white;font-family: 'IBM Plex Sans', sans-serif;"><h6>CONTACT</h6></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>	

<div class="container register" style="font-family: 'IBM Plex Sans', sans-serif;">
                <div class="row">
                    <div class="col-md-10 register-right" style="margin-top: 40px;left: 10vw;">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist" style="width: 40%;">                            
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Patient</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="home1-tab" data-toggle="tab" href="#home1" role="tab" aria-controls="home1" aria-selected="true">Midwife</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#admin" role="tab" aria-controls="admin" aria-selected="false">Admin</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Login as Patient</h3>


            <!-- <form class="form-group" method="POST" action="func.php">
                <div class="row" style="margin-top: 10%">
                  <div class="col-md-4"><label>Email-ID: </label></div>
                  <div class="col-md-8">
                      <input type="text" name="email" class="form-control" placeholder="enter email ID" required/>
                    </div><br><br>
                  <div class="col-md-4" style="margin-top: 8%"><label>Password: </label></div>
                  <div class="col-md-8" style="margin-top: 8%">
                  <input type="password" class="form-control" name="password2" placeholder="enter password" required/>
                </div><br><br><br>
                </div>
                <div class="row">
                 <div class="col-md-4"  style="padding-left: 160px;margin-top: 10%">
                    <center>
                        <input type="submit" id="inputbtn" name="patsub" value="Login" class="btn btn-primary">
                    </center></div>           
                </div>
            </form> -->



              <form method="post" action="func.php">
                <div class="row register-form">
                    <div class="col-md-6">
                        <div class="form-group">
                            <!-- <input type="text" class="form-control" placeholder="User Name *" name="username3" onkeydown="return alphaOnly(event);" required/> -->
                      <!-- <input type="text" name="email" class="form-control" placeholder="enter email ID" required/> -->
                      <input type="text" name="email" class="form-control" placeholder="email" required/>


                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <!-- <input type="password" class="form-control" placeholder="Password *" name="password3" required/> -->
                  <input type="password" class="form-control" name="password2" placeholder="enter password" required/>

                        </div>                        
            
                        <!-- <input type="submit" class="btnRegister" name="docsub1" value="Login"/> -->
                        <input type="submit" id="inputbtn" name="patsub" value="Login" class="btnRegister">


                    </div>
                </div>
            </form>


              



                                <!-- <form method="post" action="func2.php">
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
                                        <div class="form-group">
                                            <!-- <div class="maxl">
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
                                        </div>
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
                                        <!-- <div class="form-group">
                                            <input type="text" class="form-control"  placeholder="Your Address *" name="patAddress"  onkeydown="return alphaOnly(event);" required/>
                                        </div> 
                                        <input type="submit" class="btnRegister" name="patsub1" onclick="return checklen();" value="Register"/>
                                    </div>

                                </div>
                            </form> -->


                            </div>
<!--Midwife-->

                            <!-- <div class="tab-pane fade show" id="home1" role="tabpanel" aria-labelledby="home1-tab">
                                <!-- <h3  class="register-heading">Register as Midwife</h3> 
                                <!-- <form method="post" action="admin-panel2.php"> 
                                <div class="row register-form">

                                <div class="row"> -->

                                    
                                <!-- <div style="margin-left:180px;" class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab"> -->
                                <div  class="tab-pane fade show" id="home1" role="tabpanel" aria-labelledby="home1-tab">

                                <h3  class="register-heading">Login as Midwife</h3>
                                <form method="post" action="func1.php">
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="User Name *" name="username3" onkeydown="return alphaOnly(event);" required/>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password *" name="password3" required/>
                                        </div>
                                        
                            
                                        <!-- <input type="submit" id="inputbtn" name="docsub1" value="Login" class="btn btn-primary"> -->
                                        <input type="submit" class="btnRegister" name="docsub1" value="Login"/>

                                    </div>
                                </div>
                            </form>
                                </div>










                                
                            <!-- </div> -->
                                    <!-- <div class="col-md-4"><label>Your Name:</label></div>
                                    <div class="col-md-8"><input type="text" class="form-control" name="Midwife" onkeydown="return alphaOnly(event);" required></div><br><br>
                                    
                                    <div class="col-md-4"><label>Contact #:</label></div>
                                    <div class="col-md-8"><input type="text" class="form-control"  name="docContact" required></div><br><br>

                                    <div class="col-md-4"><label>Address:</label></div>
                                    <div class="col-md-8"><input type="text" class="form-control"  name="docAddress" required></div><br><br>

                                    <div class="col-md-4"><label>Specialization:</label></div>
                                    <div class="col-md-8">
                                    <select name="special" class="form-control" id="special" required="required">
                                        <option value="head" name="spec" disabled selected>Select Specialization</option>
                                        <option value="General" name="spec">General</option>
                                        <option value="Cardiologist" name="spec">Cardiologist</option>
                                        <option value="Neurologist" name="spec">Neurologist</option>
                                        <option value="Pediatrician" name="spec">Pediatrician</option>
                                        </select>
                                        </div><br><br>
                                    <div class="col-md-4"><label>Email ID:</label></div>
                                    
                                    <div class="col-md-8"><input type="email"  class="form-control" name="demail" required></div><br><br>
                                    <div class="col-md-4"><label>Password:</label></div>
                                    <div class="col-md-8"><input type="password" class="form-control"  onkeyup='check();' name="dpassword" id="dpassword"  required></div><br><br>
                                    <div class="col-md-4"><label>Confirm Password:</label></div>

                                    <div class="col-md-8"  id='cpass'><input type="password" class="form-control" onkeyup='check();' name="cdpassword" id="cdpassword" required>&nbsp &nbsp<span id='message'></span> </div><br><br>
                                    <div class="col-md-4"><label>Consultancy Fees:</label></div>

                                    <div class="col-md-8"><input type="text" class="form-control"  name="docFees" required></div><br><br>

                                        <div class="form-group">
                                            <div class="maxl">
                                                <label class="radio inline"> 
                                                    <input type="radio" name="dgender" value="Male" checked>
                                                    <span> Male </span> 
                                                </label>
                                                <label class="radio inline"> 
                                                    <input type="radio" name="dgender" value="Female">
                                                    <span>Female </span> 
                                                </label>
                                            </div>

                                            <br>
                                            
                                            <input type="submit" name="docsub" value="Register" class="btn btn-primary">

                                            <a href="index2.php">Already have an account? Login</a>
                                        </div> -->
                                    <!-- </div> -->
                                <!-- </div> -->
                            <!-- </form> -->
                        <!-- </div> -->
                            <div class="tab-pane fade show" id="admin" role="tabpanel" aria-labelledby="profile-tab">
                                <h3  class="register-heading">Login as Admin</h3>
                                <form method="post" action="func3.php">
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="User Name *" name="username1" onkeydown="return alphaOnly(event);" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password *" name="password2" required/>
                                        </div>                                        
                                        <input type="submit" class="btnRegister" name="adsub" value="Login"/>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </body>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</html>