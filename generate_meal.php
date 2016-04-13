<?php require_once('config.php'); ?>
<html>
<?php include_once('header.html'); ?>


<body>
  <div class="container-fluid">
    <div class="jumbotron">
        <h1 align="center">Hello there, <?php 
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
        <li><a href="profile.php">Profile Home</a></li>
<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Recipe <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="recipeAdd.php">Add Recipe</a></li>
            <li><a href="ingredientsAdd.php">Add Ingredients</a></li>
            <li><a href="instructionAdd.php">Add Instructions</a></li>
            <li><a href="search.php">Search Recipes</a></li>
          </ul>
        </li>
        <li class="dropdown active">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Meal Plan <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="meal_plan.php">Add Meal</a></li>
            <li><a href="generate_meal.php">Generate Based on Calories</a></li>
            <li><a href="display.php">Display Meals</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php"><? $_POST['logout'] = true; ?>Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


 <div class="center-block" style="max-width:700px">

<form class="form" action="generate_meal.php" method="post">
  <div class="center-block" style="max-width:450px">
  <div class="form-group">
    <label for="calorie_count">Number of Calories</label>
    <input type="number" class="form-control" id="calorie_count" name="calorie_count" placeholder="Number of calories">
  </div>
  <br/><br/>
  <button type="submit" class="btn btn-default" name="request_meal" id="request_meal"><h4>Request Meal</h4></button></a>
</div>
  </div><!-- center block -->
</form> 

</div>
  </div><!-- container-fluid-->

</body>

</html>


<?php 

if(isset($_POST['request_meal'])) {
      

    $connect = mysql_connect ('localhost','root','');
    mysql_select_db('comp3161', $connect);

    $calorie_count = $_POST['calorie_count'];

    $temp = mysql_query("SELECT * FROM meal WHERE meal_calories <= '$calorie_count';"); 
    $meal_id = array();
    if (mysql_num_rows($temp) > 0) {

        while ($row = mysql_fetch_assoc($temp)) 
{          $meal_id[] = $row['meal_id'];
        }
       for($i=0;$i<count($meal_id); $i++) {
  
           echo "<div><h6>Meals found are:</h6>$meal_id[$i]</div>";
          }
      }
      else {
        echo "Not found";
      }
}
?>