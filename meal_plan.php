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
      <li class="dropdown active">          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Meal Plan <span class="caret"></span></a>
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

<form class="form" action="meal_plan.php" method="post">
  <div class="center-block" style="max-width:450px">
  <div class="form-group">
    <label for="ingredient_name">Recipe</label><br/>
    <select name = "recipe_name">
      <?php
$recipe = mysql_query("SELECT * from recipe;");
    $recipe_name = array();
        while ($row = mysql_fetch_assoc($recipe)) 
{     $recipe_name[] = $row['recipe_name']; 
      
 }       

foreach($recipe_name as $data)
{
           echo "<option value=\"$data\" name=\"recipe_name\" id=\"recipe_name\">$data</option>";
          }

      ?>
    </select>
  </div>
  <div class="form-group">
    <label for="serving_size">Serving Size</label>
    <input type="number" class="form-control" id="serving_size" name="serving_size" placeholder="Serving Size">
  </div>
  <div class="form-group">
    <label for="meal_type">Meal Type</label><br/>
    <label class="radio-inline">
  <input type="radio" name="meal_type" id="meal_type" value="Breakfast"> Breakfast
</label>
<label class="radio-inline">
  <input type="radio" name="meal_type" id="meal_type" value="Lunch"> Lunch
</label>
<label class="radio-inline">
  <input type="radio" name="meal_type" id="meal_type" value="Dinner"> Dinner
</label>
<label class="radio-inline">
  <input type="radio" name="meal_type" id="meal_type" value="Snack"> Snack
</label>
  </div>
<div class="form-group">
    <label for="meal_day">Meal Day</label><br/>
    <label class="radio-inline">
  <input type="radio" name="meal_day" id="meal_day" value="Sunday"> Sunday
</label>
<label class="radio-inline">
  <input type="radio" name="meal_day" id="meal_day" value="Monday"> Monday
</label>
<label class="radio-inline">
  <input type="radio" name="meal_day" id="meal_day" value="Tuesday"> Tuesday
</label>
<label class="radio-inline">
  <input type="radio" name="meal_day" id="meal_day" value="Wednesday"> Wednesday
</label>
<label class="radio-inline">
  <input type="radio" name="meal_day" id="meal_day" value="Thursday"> Thursday
</label>
<label class="radio-inline">
  <input type="radio" name="meal_day" id="meal_day" value="Friday"> Friday
</label>
<label class="radio-inline">
  <input type="radio" name="meal_day" id="meal_day" value="Saturday"> Saturday
</label>
  </div>
  <div class="form-group">
    <label>Image: </label><input type="file" name="meal_image" />
  </div>

  <br/><br/>
  <button type="submit" class="btn btn-default" name="add_meal" id="add_meal"><h4>Add Meal</h4></button></a>
</div>
  </div><!-- center block -->
</form> 

</div>
  </div><!-- container-fluid-->

</body>

</html>


<?php 

if(isset($_POST['add_meal'])) {
      

    $connect = mysql_connect ('localhost','root','');
    mysql_select_db('comp3161', $connect);

    $meal_type = $_POST['meal_type'];
    $meal_day = $_POST['meal_day'];
    $serving_size = $_POST['serving_size'];
    $meal_image = $_POST['meal_image'];
    $recipe_name = $_POST['recipe_name'];

    $temp = mysql_query("SELECT * FROM recipe WHERE recipe_name = '$recipe_name';"); 
    if (mysql_num_rows($temp) == 1) {

        while ($row = mysql_fetch_assoc($temp)) 
{          $recipe_id = $row['recipe_id'];
        }
      }

    mysql_query("INSERT INTO meal (meal_type, meal_day, serving_size, meal_image, recipe_id) values ('$meal_type', '$meal_day', '$serving_size', '$image_name', '$recipe_id')");
    header('Location: profile.php');
}
?>