<?php require_once('config.php'); ?>
<html>
<?php include_once('header.html'); ?>

<body>
		<div class="container-fluid">
		<div class="jumbotron">
  			<h1 align="center">Welcome</h1>
		</div>


<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<div class="center-block" style="max-width:500px">

<form class="form" action="signup.php" method="post" id="signup">
  <div class="center-block" style="max-width:450px">
  <div class="form-group">
    <label class="sr-only" for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Email address" autofocus="">
  </div>
  <div class="form-group">
    <label class="sr-only" for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
  </div>
  <br/><br/>
  <button type="submit" class="btn btn-default btn-lg btn-block" name="submit" id="submit">Sign up</button>
  </div><!-- center block -->
</form> 

</div>
	</div><!-- container-fluid-->

</body>


</html>

<?php 
if(isset($_POST['submit'])) {
		$connect = mysql_connect ('localhost','root','');
		mysql_select_db('comp3161', $connect);

		$email_add = $_POST['email'];
		$password = $_POST['password'];

		mysql_query("INSERT INTO account (email, password) values ('$email_add', '$password')");
		header('Location: index.php');
}
?>