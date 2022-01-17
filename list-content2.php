<?php
$birth = 'birth';
$six_weeks = 'six weeks';
$ten_weeks  ='Ten Weeks';
$fourteen_weeks = 'Fourteen Weeks';
$six_months = 'Six Months';
$nine_months = 'Nine Months';


?>


<div class="col-sm-7" >

                        <!-- <div class="text-center p-3">
                            <img src="img/200.png">
                            <h2 class='text-muted'>DASHBOARD</h2>
                            <br>
                        </div> -->


                        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                            <li class="nav-item">
                              <!-- <a class="nav-link active" id="forum-tab" data-toggle="tab" href="#forum" role="tab" 
                                 aria-controls="forum" aria-selected="true">Recent Forums</a> -->
                              <a style="background-color: #342ac1; color:#fff; margin: 0px 2px; border-radius:8px;" class="nav-link active" id="forum-tab" data-toggle="tab" href="#forum" role="tab" 
                                 aria-controls="forum" aria-selected="true">Original Order</a>
                            </li>
                            <li class="nav-item">
                              <a style="background-color: #342ac1; color:#fff; margin: 2px 2px; border-radius:8px;" class="nav-link" id="blog-tab" data-toggle="tab" href="#blog" role="tab" 
                                 aria-controls="blog" aria-selected="false">Birth</a>
                            </li>
                            <li class="nav-item">
                                <a  style="background-color: #342ac1; color:#fff; margin: 2px 2px; border-radius:8px;" class="nav-link" id="poll-tab" data-toggle="tab" href="#poll" role="tab" 
                                aria-controls="poll" aria-selected="false">Six Weeks</a>
                            </li>
                            <li class="nav-item">
                                <a style="background-color: #342ac1; color:#fff; margin: 2px 2px; border-radius:8px;" class="nav-link" id="10weeks-tab" data-toggle="tab" href="#10weeks" role="tab" 
                                aria-controls="10weeks" aria-selected="false">Ten Weeks</a>
                                <!--  -->
                            </li>
                            
                            <li class="nav-item">
                                <a style="background-color: #342ac1; color:#fff; margin: 2px 2px; border-radius:8px;" class="nav-link" id="14weeks-tab" data-toggle="tab" href="#14weeks" role="tab" 
                                aria-controls="14weeks" aria-selected="false">Fourteen Weeks</a>
                            </li>
                            <li class="nav-item">
                                <a style="background-color: #342ac1; color:#fff; margin: 2px 2px; border-radius:8px;" class="nav-link" id="6months-tab" data-toggle="tab" href="#6months" role="tab" 
                                aria-controls="6months" aria-selected="false">Six Months</a>
                            </li>
                            <li class="nav-item">
                                <a style="background-color: #342ac1; color:#fff; margin: 2px 2px; border-radius:8px;" class="nav-link" id="9months-tab" data-toggle="tab" href="#9months" role="tab" 
                                aria-controls="9months" aria-selected="false">Nine Months</a>
                            </li>
                        </ul>

                        <br>

                        <div class="tab-content" id="myTabContent">

                            <div class="tab-pane fade show active" id="forum" role="tabpanel" aria-labelledby="forum-tab">



                                    <div class="row mb-2">

                                    


  <?php 
    //defining conditions
    $con=mysqli_connect("localhost","root","","pmsdb");
    global $con;
    
    $query = "select * from blog_tbl  ORDER BY id ASC; ";
    $result = mysqli_query($con,$query);
    while ($row = mysqli_fetch_array($result)){
      ?>
      


      <div class="col-md-6">
         <div class="card flex-md-row mb-4 shadow-sm h-md-250">
           <div class="card-body d-flex flex-column align-items-start">
             <h6 class="mb-0">
              <a class="text-dark" href="blog-page.php?id='.$row['blog_id'].'">
                <?php echo  substr($row['title'],0,10) ?>
                </a>
             </h6>
             <!-- <small class="mb-1 text-muted">'.date("F jS, Y", strtotime($row['blog_date'])).'</small> -->
             <small class="card-text mb-auto">
              <?php echo  substr($row['body'],0,40) ?>
            </small>
             <a href="blog-page.php?id=<?php echo $row['id'] ?>">Continue reading</a>
           </div>
           <!-- <a href="blog-page.php?id='.$row['blog_id'].'">
           <img class="card-img-right flex-auto d-none d-lg-block blogindex-cover" 
                 src="uploads/'.$row['blog_img'].'" alt="Card image cap">
                     </a> -->
         </div>
       </div>


    <?php } ?>


        


                                </div>

                            </div>

                            <div class="tab-pane fade" id="blog" role="blog" aria-labelledby="blog-tab">

                                <!-- <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
                                    <img class="mr-3" src="img/200.png" alt="" width="48" height="48">
                                  <div class="lh-100">
                                    <h1 class="mb-0 text-white lh-100">Latest Blogs</h1>
                                  </div>
                                </div>   -->

                                <div class="row mb-2">



  <?php 
    //defining conditions
    $con=mysqli_connect("localhost","root","","pmsdb");
    global $con;
    
    // $query = "select * from blog_tbl  ORDER BY id ASC; ";
    $query = "select  * from blog_tbl  where category = '$birth'";

    $result = mysqli_query($con,$query);
    while ($row = mysqli_fetch_array($result)){
      ?>
    



      <div class="col-md-6">
         <div class="card flex-md-row mb-4 shadow-sm h-md-250">
           <div class="card-body d-flex flex-column align-items-start">
             <h6 class="mb-0">
              <a class="text-dark" href="blog-page.php?id='.$row['blog_id'].'">
                <?php echo  substr($row['title'],0,10) ?>
                </a>
             </h6>
             <!-- <small class="mb-1 text-muted">'.date("F jS, Y", strtotime($row['blog_date'])).'</small> -->
             <small class="card-text mb-auto">
              <?php echo  substr($row['body'],0,40) ?>
            </small>
             <a href="blog-page.php?id=<?php echo $row['id'] ?>">Continue reading</a>
           </div>
           <!-- <a href="blog-page.php?id='.$row['blog_id'].'">
           <img class="card-img-right flex-auto d-none d-lg-block blogindex-cover" 
                 src="uploads/'.$row['blog_img'].'" alt="Card image cap">
                     </a> -->
         </div>
       </div>


    <?php } ?>

        


                                </div>

                            </div>

                            <div class="tab-pane fade" id="poll" role="poll" aria-labelledby="poll-tab">

                               

                                <div class="row mb-2">

                                    


  <?php 
    //defining conditions
    $con=mysqli_connect("localhost","root","","pmsdb");
    global $con;
    
    // $query = "select * from blog_tbl  ORDER BY id ASC; ";
    $query = "select  * from blog_tbl  where category = '$six_weeks'";

    $result = mysqli_query($con,$query);
    while ($row = mysqli_fetch_array($result)){
      ?>
      



      <div class="col-md-6">
         <div class="card flex-md-row mb-4 shadow-sm h-md-250">
           <div class="card-body d-flex flex-column align-items-start">
             <h6 class="mb-0">
              <a class="text-dark" href="blog-page.php?id='.$row['blog_id'].'">
                <?php echo  substr($row['title'],0,10) ?>
                </a>
             </h6>
             <!-- <small class="mb-1 text-muted">'.date("F jS, Y", strtotime($row['blog_date'])).'</small> -->
             <small class="card-text mb-auto">
              <?php echo  substr($row['body'],0,40) ?>
            </small>
             <a href="blog-page.php?id=<?php echo $row['id'] ?>">Continue reading</a>
           </div>
           <!-- <a href="blog-page.php?id='.$row['blog_id'].'">
           <img class="card-img-right flex-auto d-none d-lg-block blogindex-cover" 
                 src="uploads/'.$row['blog_img'].'" alt="Card image cap">
                     </a> -->
         </div>
       </div>


    <?php } ?>

        


                                </div>    

                            </div>

                            <div class="tab-pane fade" id="10weeks" role="10weeks" aria-labelledby="10weeks-tab">

                               
                                <div class="row mb-2">



  <?php 
    //defining conditions
    $con=mysqli_connect("localhost","root","","pmsdb");
    global $con;
    
    // $query = "select * from blog_tbl  ORDER BY id ASC; ";
    $query = "select  * from blog_tbl  where category = '$ten_weeks'";

    $result = mysqli_query($con,$query);
    while ($row = mysqli_fetch_array($result)){
      ?>
   


      <div class="col-md-6">
         <div class="card flex-md-row mb-4 shadow-sm h-md-250">
           <div class="card-body d-flex flex-column align-items-start">
             <h6 class="mb-0">
              <a class="text-dark" href="blog-page.php?id='.$row['blog_id'].'">
                <?php echo  substr($row['title'],0,10) ?>
                </a>
             </h6>
             <!-- <small class="mb-1 text-muted">'.date("F jS, Y", strtotime($row['blog_date'])).'</small> -->
             <small class="card-text mb-auto">
              <?php echo  substr($row['body'],0,40) ?>
            </small>
             <a href="blog-page.php?id=<?php echo $row['id'] ?>">Continue reading</a>
           </div>
           <!-- <a href="blog-page.php?id='.$row['blog_id'].'">
           <img class="card-img-right flex-auto d-none d-lg-block blogindex-cover" 
                 src="uploads/'.$row['blog_img'].'" alt="Card image cap">
                     </a> -->
         </div>
       </div>


    <?php } ?>

        


                                </div>    

                            </div>


<!-- Ten weeks -->
<div class="tab-pane fade" id="14weeks" role="14weeks" aria-labelledby="14weeks-tab">

                               
                                <div class="row mb-2">

                                    


  <?php 
    //defining conditions
    $con=mysqli_connect("localhost","root","","pmsdb");
    global $con;
    
    // $query = "select * from blog_tbl  ORDER BY id ASC; ";
    $query = "select  * from blog_tbl  where category = '$fourteen_weeks'";

    $result = mysqli_query($con,$query);
    while ($row = mysqli_fetch_array($result)){
      ?>
     


      <div class="col-md-6">
         <div class="card flex-md-row mb-4 shadow-sm h-md-250">
           <div class="card-body d-flex flex-column align-items-start">
             <h6 class="mb-0">
              <a class="text-dark" href="blog-page.php?id='.$row['blog_id'].'">
                <?php echo  substr($row['title'],0,10) ?>
                </a>
             </h6>
             <!-- <small class="mb-1 text-muted">'.date("F jS, Y", strtotime($row['blog_date'])).'</small> -->
             <small class="card-text mb-auto">
              <?php echo  substr($row['body'],0,40) ?>
            </small>
             <a href="blog-page.php?id=<?php echo $row['id'] ?>">Continue reading</a>
           </div>
           <!-- <a href="blog-page.php?id='.$row['blog_id'].'">
           <img class="card-img-right flex-auto d-none d-lg-block blogindex-cover" 
                 src="uploads/'.$row['blog_img'].'" alt="Card image cap">
                     </a> -->
         </div>
       </div>


    <?php } ?>

</table>
        


                                </div>    

                            </div>
                            


                            <!-- 6 MONTHS -->
                           <div class="tab-pane fade" id="6months" role="6months" aria-labelledby="6months-tab">

                               
                                <div class="row mb-2">

                                    


  <?php 
    //defining conditions
    $con=mysqli_connect("localhost","root","","pmsdb");
    global $con;
    
    // $query = "select * from blog_tbl  ORDER BY id ASC; ";
    $query = "select  * from blog_tbl  where category = '$six_months'";

    $result = mysqli_query($con,$query);
    while ($row = mysqli_fetch_array($result)){
      ?>
   



      <div class="col-md-6">
         <div class="card flex-md-row mb-4 shadow-sm h-md-250">
           <div class="card-body d-flex flex-column align-items-start">
             <h6 class="mb-0">
              <a class="text-dark" href="blog-page.php?id='.$row['blog_id'].'">
                <?php echo  substr($row['title'],0,10) ?>
                </a>
             </h6>
             <!-- <small class="mb-1 text-muted">'.date("F jS, Y", strtotime($row['blog_date'])).'</small> -->
             <small class="card-text mb-auto">
              <?php echo  substr($row['body'],0,40) ?>
            </small>
             <a href="blog-page.php?id=<?php echo $row['id'] ?>">Continue reading</a>
           </div>
           <!-- <a href="blog-page.php?id='.$row['blog_id'].'">
           <img class="card-img-right flex-auto d-none d-lg-block blogindex-cover" 
                 src="uploads/'.$row['blog_img'].'" alt="Card image cap">
                     </a> -->
         </div>
       </div>


    <?php } ?>

        


                                </div>    

                            </div>


                            <!-- Nine Months -->
                            <div class="tab-pane fade" id="9months" role="9months" aria-labelledby="9months-tab">

                               
                                <div class="row mb-2">

                                    


  <?php 
    //defining conditions
    $con=mysqli_connect("localhost","root","","pmsdb");
    global $con;
    
    // $query = "select * from blog_tbl  ORDER BY id ASC; ";
    $query = "select  * from blog_tbl  where category = '$nine_months'";

    $result = mysqli_query($con,$query);
    while ($row = mysqli_fetch_array($result)){
      ?>
   



      <div class="col-md-6">
         <div class="card flex-md-row mb-4 shadow-sm h-md-250">
           <div class="card-body d-flex flex-column align-items-start">
             <h6 class="mb-0">
              <a class="text-dark" href="blog-page.php?id='.$row['blog_id'].'">
                <?php echo  substr($row['title'],0,10) ?>
                </a>
             </h6>
             <!-- <small class="mb-1 text-muted">'.date("F jS, Y", strtotime($row['blog_date'])).'</small> -->
             <small class="card-text mb-auto">
              <?php echo  substr($row['body'],0,40) ?>
            </small>
             <a href="blog-page.php?id=<?php echo $row['id'] ?>">Continue reading</a>
           </div>
           <!-- <a href="blog-page.php?id='.$row['blog_id'].'">
           <img class="card-img-right flex-auto d-none d-lg-block blogindex-cover" 
                 src="uploads/'.$row['blog_img'].'" alt="Card image cap">
                     </a> -->
         </div>
       </div>


    <?php } ?>

        


                                </div>    

                            </div>




















                        </div>

                    </div>