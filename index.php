<?php require_once('config.php'); ?>
<html>
<?php include_once('header.html'); ?>
<body>

	 <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/1.4.1/less.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<div class="jumbotron">
<h1 align="center" style="font-family: 'Indie Flower', serif;">Welcome</h1>

</div>
<div class="container-fluid">
  <center>
  <div class="center-block" style="max-width:400px"><!-- block -->
  <div class="row">
     <div class="col-xs-12 col-md-18"><a class="btn btn-default btn-lg btn-block bg-warning" href="signup.php" role="button"><h4>Register</h4></a></div>
     </div><br/>
  <div class="row">
     <div class="col-xs-12 col-md-18"><a class="btn btn-default btn-lg btn-block bg-warning" href="login.php" role="button"><h4>Login</h4></a></div>
  </div>
  
</div><!-- block -->  
</center>
</div><!-- fluid container -->

	</body>
</html>

<?php

if(isset($_POST['logout'])) {
      
$_SESSION['logged_in'] = false;
}

?>