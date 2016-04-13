<?php require_once('config.php'); ?>
<html>
<?php include_once('header.html'); ?>


<body>
  <div class="container-fluid">
    <div class="jumbotron">
        <h1 align="center">Welcome</h1>
    </div>


 <div class="center-block" style="max-width:700px">

<form class="form" action="update.php" method="post">
  <div class="center-block" style="max-width:450px">
  <div class="form-group">
    <label for="fname">Firstname</label>
    <input type="text" class="form-control" id="fname" name="fname" placeholder="Firstname" autofocus="">
  </div>
  <div class="form-group">
    <label for="lname">Lastname</label>
    <input type="text" class="form-control" id="lname" name="lname" placeholder="Lastname">
  </div>
  <div class="form-group">
    <label for="password">Date of Birth</label>
    <input type="date" class="form-control" id="dob" name="dob" placeholder="Date of birth">
  </div>
  <div class="form-group">
    <label for="gender">Gender</label><br/>
    <label class="radio-inline">
  <input type="radio" name="gender" id="gender" value="M"> Male
</label>
<label class="radio-inline">
  <input type="radio" name="gender" id="gender" value="F"> Female
</label>
  </div>
  <br/><br/>
  <button type="submit" class="btn btn-default" name="update" id="update"><h4>Submit</h4></button></a>
</div>
  </div><!-- center block -->
</form> 

</div>
  </div><!-- container-fluid-->

</body>

</html>


<?php 

if(isset($_POST['update'])) {
      

    $connect = mysql_connect ('localhost','root','');
    mysql_select_db('comp3161', $connect);

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $user_id = $_SESSION['id'];
    $gender = $_POST['gender'];


    mysql_query("INSERT INTO customer (customer_id, fname, lname, gender) values ('$user_id', '$fname', '$lname', '$gender')");
    header('Location: profile.php');
}
?>