<?php require_once('config.php'); ?>
<html>
<?php include_once('header.html'); ?>
<body>
	<div class="container-fluid">
		<div class="jumbotron">
  			<h1 align="center">Add Recipe</h1>
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


<div class="center-block" style="max-width:500px">

<form class="form" action="recipeAdd.php" method="post">
  <div class="center-block" style="max-width:450px">
  <div class="form-group">
    <label for="recipe_name">Recipe Name</label>
    <input type="text" class="form-control" id="recipe_name" name="recipe_name" placeholder="Recipe Name" autofocus="">
  </div>
  <div class="container">
<?php 

$connect = mysql_connect ('localhost','root','');
    mysql_select_db('comp3161', $connect);

    $measurements = mysql_query("SELECT * FROM measurements;"); 
    $ingredients = mysql_query("SELECT * FROM ingredients;");
$unit = array();
$ingre_name = array();
        while ($row = mysql_fetch_assoc($measurements)) 
{     $unit[] = $row['measurement_unit']; 
      
 }         
while ($row = mysql_fetch_assoc($ingredients)) {

$ingre_name[] = $row['ingredient_name'];} 

foreach($ingre_name as $data_name)
{

?>
  <select name = "measurement_unit">
    <?php
foreach ($unit as $data)
          {
           echo "<option value=\"$data\" name=\"measurement_unit\" id=\"measurement_unit\">$data</option>";
          }
  echo "<input type=\"checkbox\" name=\"ingredient_name\" value=\"$data_name\"> $data_name <br><br>";
   
?>
</select>
<?php
}

?>
</div><!-- container -->
<div class="form-group">
    <label for="recipe_calorie">Calorie Count</label>
    <input type="number" class="form-control" id="recipe_calorie" name="recipe_calorie" placeholder="Calorie Count">
  </div>
  <br/><br/>
  <button type="submit" class="btn btn-default btn-lg btn-block" name="recipeAdd">Add Recipe</button>
  </div><!-- center block -->
</form> 

</div>
	</div><!-- container-fluid-->
</body>

</html>

<?php 
if(isset($_POST['recipeAdd'])) {
    $connect = mysql_connect ('localhost','root','');
    mysql_select_db('comp3161', $connect);



$measurements = mysql_query("SELECT * FROM measurements;"); 
$ingre_name = array();
        while ($row = mysql_fetch_assoc($measurements)) 
{     $unit[] = $row['measurement_unit']; }

    $ingredient_name = $_POST['ingredient_name'];

    $recipe_name = $_POST['recipe_name'];
    $measurement_unit = $_POST['measurement_unit'];
    $recipe_calorie = $_POST['recipe_calorie'];
    $temp = mysql_query("SELECT ingredient_id FROM ingredients WHERE ingredient_name = '$ingredient_name';"); 
    if (mysql_num_rows($temp) == 1) {

        while ($row = mysql_fetch_assoc($temp)) 
{          $ingredient_id = $row['ingredient_id'];
        }
      }
    

    $result = mysql_query("INSERT INTO recipe (recipe_name, ingredient_id, measurement_unit, recipe_calories) VALUES ('$recipe_name', '$ingredient_id', '$measurement_unit', '$recipe_calorie')"); 

}
?>