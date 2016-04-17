<?php require_once('config.php'); ?>
<html>
<?php include_once('header.html'); ?>


<body>
  <div class="container-fluid">
    <div class="jumbotron">
        <h1  align="center" style="font-family: 'Indie Flower', serif;">Hello there, <?php 
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
            <li><a href="viewRecipe.php">View Recipes</a></li>
          </ul>
        </li>
 <li class="dropdown active">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Meal Plan <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="meal_plan.php">Add Meal</a></li>
            <li><a href="generate_meal.php">Generate Based on Calories</a></li>
            <li><a href="#">Display Meals</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
       <li><a href="index.php"><? $_POST['logout'] = true; ?>Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<h2>Meals that were created already include the following</h2><br/><br/>


<?php

$meals = mysql_query("SELECT * from meal;");



        while ($row = mysql_fetch_assoc($meals)) 
{     $meal_type[] = $row['meal_type']; 
      $meal_day[] = $row['meal_day'];
      $meal_image[] = $row['meal_image'];
      $recipe_id[] = $row['recipe_id'];
      
 }      


 for($i=0;$i<mysql_num_rows($meals); $i++) {


  
$data = $meal_type[$i];
$day = $meal_day[$i];
$image = $meal_image[$i];

$temp = mysql_query("SELECT * FROM recipe WHERE recipe_id = '$recipe_id[$i]';"); 
    if (mysql_num_rows($temp) == 1) {

        while ($row = mysql_fetch_assoc($temp)) 
{          $recipe_name = $row['recipe_name'];
        }
      }


?>



<div class="row">
  <div class="col-sm-6 col-md-3">
    <div class="thumbnail">
      <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($image).'"/>'; ?>
      <div class="caption">
        <h3><?php echo "$recipe_name"?></h3>
        <p><p class="btn btn-primary"><?php echo "$data"; ?></p> <p class="btn btn-default"><?php echo "$day"; ?></p></p>
      </div>
    </div>
  </div>
</div>



<?php
          }


      ?>
  </div><!-- container-fluid-->

</body>

</html>