<!--  -->
<button id="btn_all" class="btn btn-primary">Original Order</button>
<button id="btn0" class="btn btn-primary">Birth </button>
<button id="btn6w" class="btn btn-primary">Six Weeks</button>
<button id="btn10w" class="btn btn-primary">Ten Weeks </button>
<button id="btn14w" class="btn btn-primary">Fourteen Weeks </button>
<button id="btn6m" class="btn btn-primary">Six Months </button>
<button id="btn9m" class="btn btn-primary">Nine Months </button>


<br><br>

<?php
$birth = 'birth';
$six_weeks = 'six weeks';
$ten_weeks  ='Ten Weeks';
$fourteen_weeks = 'Fourteen Weeks';
$six_months = 'Six Months';
$nine_months = 'Nine Months';


?>



<!-- Birth -->
<table class="table table-hover" id="table0" style="width:100%;display:none">

            <tr>
              <th>Title</th>
              <th>Body</th>
              <th>Category</th>
            </tr>

            <?php 
              //defining conditions
              $con=mysqli_connect("localhost","root","","pmsdb");
              global $con;
              $query = "select  * from blog_tbl  where category = '$birth'";
             
              $result = mysqli_query($con,$query);

              while ($row = mysqli_fetch_array($result)){
                $boddy = $row['body'];
            ?>
                <tr>
                  <td><?php echo $row['title'];?></td>
                  <td><?php echo '<a href="'. $row['body'] .'">'. $row['body'].'</a>';?></td>
                  <td><?php echo $row['category'];?></td>
                </tr>
              <?php }
              ?>

</table>


<!-- 6 weeks -->
<table class="table table-hover" id="table6w" style="width:100%;display:none">

            <tr>
              <th>Title</th>
              <th>Body</th>
              <th>Category</th>
            </tr>

            <?php 
              //defining conditions
              $con=mysqli_connect("localhost","root","","pmsdb");
              global $con;
              $query = "select  * from blog_tbl  where category = '$six_weeks'";
             
              $result = mysqli_query($con,$query);

              while ($row = mysqli_fetch_array($result)){
                $boddy = $row['body'];
            ?>
                <tr>
                  <td><?php echo $row['title'];?></td>
                  <td><?php echo '<a href="'. $row['body'] .'">'. $row['body'].'</a>';?></td>
                  <td><?php echo $row['category'];?></td>
                </tr>
              <?php }
              ?>

</table>


<!-- 10 weeks -->
<table class="table table-hover" id="table10w" style="width:100%;display:none">

            <tr>
              <th>Title</th>
              <th>Body</th>
              <th>Category</th>
            </tr>

            <?php 
              //defining conditions
              $con=mysqli_connect("localhost","root","","pmsdb");
              global $con;
              $query = "select  * from blog_tbl  where category = '$ten_weeks'";
             
              $result = mysqli_query($con,$query);

              while ($row = mysqli_fetch_array($result)){
                $boddy = $row['body'];
            ?>
                <tr>
                  <td><?php echo $row['title'];?></td>
                  <td><?php echo '<a href="'. $row['body'] .'">'. $row['body'].'</a>';?></td>
                  <td><?php echo $row['category'];?></td>
                </tr>
              <?php }
              ?>

</table>


<!-- 14 weeks -->
<table class="table table-hover" id="table14w" style="width:100%;display:none">

            <tr>
              <th>Title</th>
              <th>Body</th>
              <th>Category</th>
            </tr>

            <?php 
              //defining conditions
              $con=mysqli_connect("localhost","root","","pmsdb");
              global $con;
              $query = "select  * from blog_tbl  where category = '$fourteen_weeks'";
             
              $result = mysqli_query($con,$query);

              while ($row = mysqli_fetch_array($result)){
                $boddy = $row['body'];
            ?>
                <tr>
                  <td><?php echo $row['title'];?></td>
                  <td><?php echo '<a href="'. $row['body'] .'">'. $row['body'].'</a>';?></td>
                  <td><?php echo $row['category'];?></td>
                </tr>
              <?php }
              ?>

</table>


<!-- 6m -->
<table class="table table-hover" id="table6m" style="width:100%;display:none">

            <tr>
              <th>Title</th>
              <th>Body</th>
              <th>Category</th>
            </tr>

            <?php 
              //defining conditions
              $con=mysqli_connect("localhost","root","","pmsdb");
              global $con;
              $query = "select  * from blog_tbl  where category = '$six_months'";
             
              $result = mysqli_query($con,$query);

              while ($row = mysqli_fetch_array($result)){
                $boddy = $row['body'];
            ?>
                <tr>
                  <td><?php echo $row['title'];?></td>
                  <td><?php echo '<a href="'. $row['body'] .'">'. $row['body'].'</a>';?></td>
                  <td><?php echo $row['category'];?></td>
                </tr>
              <?php }
              ?>

</table>

<!-- 9m -->
<table class="table table-hover" id="table9m" style="width:100%;display:none">

<tr>
  <th>Title</th>
  <th>Body</th>
  <th>Category</th>
</tr>

<?php 
  //defining conditions
  $con=mysqli_connect("localhost","root","","pmsdb");
  global $con;
  $query = "select  * from blog_tbl  where category = '$nine_months'";
 
  $result = mysqli_query($con,$query);
  if($result){
      while ($row= mysqli_fetch_array($result)){

        ?>


<tr>
      <td><?php echo $row['title'];?></td>
      <td><?php echo '<a href="'. $row['body'] .'">'. $row['body'].'</a>';?></td>
      <td><?php echo $row['category'];?></td>
    </tr>


          
     <?php }  ?>
     <!-- //end whilw -->
   <!-- } //end if -->

  <!-- while ($row = mysqli_fetch_array($result)){
    $boddy = $row['body'];
?> -->
    <!-- <tr>
      <td><?php //echo $row['title'];?></td>
      <td><?php //echo '<a href="'. $row['body'] .'">'. $row['body'].'</a>';?></td>
      <td><?php //echo $row['category'];?></td>
    </tr> -->
  <?php 
  }
  else { ?>
    <td><?php echo 'No data';?></td>
  <?php }
  ?>


</table>



<!--table2--><!--table2--><!--table2--><!--table2--><!--table2--><!--table2--><!--table2-->
<!-- <script>
            var counter = 0;
            var counterplus = 0;
</script>
<table class="table table-hover" id="table10w" style="width:100%;display:none">

<script>
              Oyelami_sort(pid1_js64, status_js );
              cocktailSort(pid1_js64, status_js);
  </script>

<tr>
    <th>Patient ID</th>
    <th>Status</th>
    <th>Prescribe</th>
  </tr>

  <?php 
    //defining conditions
    // $con=mysqli_connect("localhost","root","","pmsdb");
    // global $con;
    // $query = "select  * from blog_tbl  where category = '$ten_weeks'";

    // $result = mysqli_query($con,$query);
              
    // while ($row = mysqli_fetch_array($result)){
  ?>

  <tr>
    <td>
                  <script type="text/javascript">
                 
                  document.write(pid1_js64[counter]);
                  
                 
                  </script>
    </td>

    <td>
                  <script type="text/javascript">
                  document.write(status_js[counter]);
                
                  </script>
    </td>
    
    <td>

<script>
    if((status_js[counter]) == 1){
              document.write('<button class="btn btn-success">Prescibe</button>')
               }else{
                document.write('<button class="btn btn-danger">Inactive</button>')
               }
               counter++;
</script>


</td>



  </tr>
  <?php 
  //}
?>
</table> -->




<script>
            var counter = 0;
            var counterplus = 0;
</script>
<table class="table table-hover" id="table_all" style="width:100%; ">
<tr>
                    <th scope="col">Title</th>
                    <th scope="col">Body</th>
                    <th scope="col">Category</th>
                  
  </tr>

  <?php 
    //defining conditions
    $con=mysqli_connect("localhost","root","","pmsdb");
    global $con;
    
    $query = "select * from blog_tbl  ORDER BY id ASC; ";
    $result = mysqli_query($con,$query);
    while ($row = mysqli_fetch_array($result)){
      ?>
      <tr>
      <td><?php echo $row['title'];?></td>
        <td><?php echo '<a href="'. $row['body'] .'">'. $row['body'].'</a>';?></td>

        <td><?php echo $row['category'];?></td>

      </tr>
    <?php } ?>

</table>


<script>
document.getElementById("btn0").addEventListener("click", function(){

  document.getElementById("table0").style.display = "block";
  document.getElementById("table10w").style.display = "none";//hide
  document.getElementById("table6w").style.display = "none";//hide
  document.getElementById("table14w").style.display = "none";
  document.getElementById("table6m").style.display = "none";
  document.getElementById("table9m").style.display = "none";
  document.getElementById("table_all").style.display = "none";
});
document.getElementById("btn10w").addEventListener("click", function(){
    document.getElementById("table10w").style.display = "block";
    document.getElementById("table0").style.display = "none";//hide
    document.getElementById("table6w").style.display = "none";//hide
    document.getElementById("table14w").style.display = "none";
    document.getElementById("table6m").style.display = "none";
    document.getElementById("table9m").style.display = "none";
    document.getElementById("table_all").style.display = "none";
});
document.getElementById("btn6w").addEventListener("click", function(){
    document.getElementById("table6w").style.display = "block";
    document.getElementById("table0").style.display = "none";//hide
    document.getElementById("table10w").style.display = "none";//hide
    document.getElementById("table14w").style.display = "none";
    document.getElementById("table6m").style.display = "none";
    document.getElementById("table9m").style.display = "none";
    document.getElementById("table_all").style.display = "none";
});
document.getElementById("btn14w").addEventListener("click", function(){
    document.getElementById("table14w").style.display = "block";
    document.getElementById("table6w").style.display = "none";
  document.getElementById("table0").style.display = "none";//hide
  document.getElementById("table10w").style.display = "none";//hide
  document.getElementById("table6m").style.display = "none";
  document.getElementById("table9m").style.display = "none";
  document.getElementById("table_all").style.display = "none";
});
document.getElementById("btn6m").addEventListener("click", function(){
    document.getElementById("table6m").style.display = "block";
    document.getElementById("table14w").style.display = "none";
    document.getElementById("table6w").style.display = "none";
  document.getElementById("table0").style.display = "none";//hide
  document.getElementById("table10w").style.display = "none";//hide
  document.getElementById("table9m").style.display = "none";
  document.getElementById("table_all").style.display = "none";
});
document.getElementById("btn9m").addEventListener("click", function(){
    document.getElementById("table6m").style.display = "none";
    document.getElementById("table14w").style.display = "none";
    document.getElementById("table6w").style.display = "none";
  document.getElementById("table0").style.display = "none";//hide
  document.getElementById("table10w").style.display = "none";//hide
  document.getElementById("table_all").style.display = "none";
  document.getElementById("table9m").style.display = "block";
});
document.getElementById("btn_all").addEventListener("click", function(){
    document.getElementById("table6m").style.display = "none";
    document.getElementById("table14w").style.display = "none";
    document.getElementById("table6w").style.display = "none";
    document.getElementById("table0").style.display = "none";//hide
    document.getElementById("table10w").style.display = "none";//hide
    document.getElementById("table9m").style.display = "none";
  document.getElementById("table_all").style.display = "block";
});
</script>




