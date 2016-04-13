<?php require_once('config.php'); ?>
<html>
<?php include_once('header.html'); ?>


<body>
  <div class="container-fluid">
    <div class="jumbotron">
        <h1 align="center">Welcome <?php 
        $id = $_SESSION['id'];
        $name_return = mysql_query("SELECT fname FROM customer WHERE customer_id = '$id'");
        if (mysql_num_rows($name_return) == 1) {

        while ($row = mysql_fetch_assoc($name_return)) 
{          $_SESSION["name"] = $row['fname'];
        }
      }

if ($_SESSION['name']) {echo $_SESSION['name'];} else {echo "user";} ?></h1>
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
        <li class="active"><a href="#">Profile Home</a></li>
        <li><a href="recipeAdd.php">Add Recipe</a></li>
        <li><a href="meal_plan.php">Meal Plan</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="row">
  <div class="col-xs-1"><h4>Sunday</h4>
    <h6><a href="meal_plan.php">Breakfast</a></h6>
    <h6>Lunch</h6>
    <h6>Dinner</h6>
    <h6>Snack</h6>
    </div>

  <div class="col-xs-1"><h4>Monday</h4></div>
  <div class="col-xs-1"><h4>Tuesday</h4></div>
  <div class="col-xs-1"><h4>Wednesday</h4></div>
  <div class="col-xs-1"><h4>Thursday</h4></div>
  <div class="col-xs-1"><h4>Friday</h4></div>
  <div class="col-xs-1"><h4>Saturday</h4></div>
</div>


<?php
$meals = mysql_query("CALL get_meals();");
    $meal_image = array();
        while ($row = mysql_fetch_assoc($meals)) 
{     $meal_image[] = $row['meal_image']; 
      
 }       

foreach($meal_image as $data)
{
           echo "<img src=\"$data\" ";
          }

      ?>
  </div><!-- container-fluid-->

</body>

</html>