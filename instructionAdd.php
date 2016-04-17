<?php require_once('config.php'); ?>
<html>
<?php include_once('header.html'); ?>
<body>
  <div class="container-fluid">
    <div class="jumbotron">
        <h1  align="center" style="font-family: 'Indie Flower', serif;">Add Instruction</h1>
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
            <li><a href="viewRecipe.php">View Recipes</a></li>
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

<form class="form" action="instructionAdd.php" method="post">
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
    <label for="instruction">Instruction</label>
    <input type="text" class="form-control" id="instruction" name="instruction" placeholder="Instruction">
  </div>
  <div class="container">

</div><!-- container -->
<div class="form-group">
    <label for="step_num">Instruction Number</label>
    <input type="number" class="form-control" id="step_num" name="step_num" placeholder="Instruction Number">
  </div>
  <br/><br/>
  <button type="submit" class="btn btn-default btn-lg btn-block" name="iAdd">Add Recipe</button>
  </div><!-- center block -->
</form> 

</div>
  </div><!-- container-fluid-->
</body>

</html>

<?php 

if(isset($_POST['iAdd'])) {
    $connect = mysql_connect ('localhost','root','');
    mysql_select_db('comp3161', $connect);


    $instruction = $_POST['instruction'];
    $step_num = $_POST['step_num'];
    $recipe_name = $_POST['recipe_name'];


#get recipe ID here
 $temp = mysql_query("SELECT * FROM recipe WHERE recipe_name = '$recipe_name';");
    if (mysql_num_rows($temp) == 1) {

        while ($row = mysql_fetch_assoc($temp)) 
{        $recipe_id = $row['recipe_id'];
        }
      }

    mysql_query("INSERT INTO instructions (recipe_id, step_num, instruction) values ('$recipe_id', '$step_num', '$instruction')");
    
}
?>