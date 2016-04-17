<?php require_once('config.php'); ?>
<html>
<?php include_once('header.html'); ?>
<body>
	<div class="container-fluid">
		<div class="jumbotron">
  			<h1 align="center">Search for Recipe</h1>
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
<li class="dropdown active">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Recipe <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="recipeAdd.php">Add Recipe</a></li>
            <li><a href="ingredientsAdd.php">Add Ingredients</a></li>
            <li><a href="instructionAdd.php">Add Instructions</a></li>
            <li><a href="search.php">Search Recipes</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Meal Plan <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="meal_plan.php">Add Meal</a></li>
            <li><a href="generate_meal.php">Generate Based on Calories</a></li>
            <li><a href="display.php">Display Meals</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


 <div class="center-block" style="max-width:700px">

<form class="form" action="search.php" method="post">
  <div class="center-block" style="max-width:450px">
  <div class="form-group">
    <label for="recipe_name">Recipe Name</label>
    <input type="text" class="form-control" id="recipe_name" name="recipe_name" placeholder="Recipe Name">
  </div>
  <br/><br/>
  <button type="submit" class="btn btn-default" name="search" id="search"><h4>Search</h4></button></a>
</div>
  </div><!-- center block -->
</form> 

</div>
	</div><!-- container-fluid-->
</body>

</html>

<?php 
if(isset($_POST['search'])) {
    $connect = mysql_connect ('localhost','root','');
    mysql_select_db('comp3161', $connect);


$recipe_name = $_POST['recipe_name'];

    $temp = mysql_query("SELECT * FROM recipe WHERE recipe_name LIKE '%$recipe_name%';"); 
    $recipe_name = array();
    if (mysql_num_rows($temp) > 0) {

        while ($row = mysql_fetch_assoc($temp)) 
{      $recipe_name[] = $row['recipe_name'];
        }

?>

<h4>Recipes found are:</h4>

<?php


       foreach($recipe_name as $name) {
  
           echo "<div><a href=\"\">$name</a></div>";
          }
      }
      else {
        echo "Not found";
      }

  }

?>