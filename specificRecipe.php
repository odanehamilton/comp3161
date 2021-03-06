<?php require_once('config.php'); ?>
<html>
<?php include_once('header.html'); ?>
<body>
  <div class="container-fluid">
    <div class="jumbotron">
        <h1 align="center" style="font-family: 'Indie Flower', serif;">Recipes</h1>
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

  <div class="center-block" style="max-width:450px">

<?php
$recipes = mysql_query("SELECT * from recipe where recipe_id = 18");
        while ($row = mysql_fetch_assoc($recipes)) 
{     $recipe_name[] = $row['recipe_name']; 
      $calories[] = $row['recipe_calories'];
      
 }       

for ($i=0; $i<mysql_num_rows($recipes); $i++)
{
           echo "<h3>$recipe_name[$i]</h3><br/><h3>Calories</h3><p>$calories[$i]</p>";
          }


      ?>



    <h3>Instructions</h3>
      <?php
$instructions = mysql_query("SELECT * from instructions where recipe_id = 18");
        while ($row = mysql_fetch_assoc($instructions)) 
{     $instruction[] = $row['instruction']; 
      $step_num[] = $row['step_num'];
      
 }       

for ($i=0; $i<mysql_num_rows($instructions); $i++)
{
           echo "<h4>$step_num[$i]. $instruction[$i]</h4>";
          }

      ?>

  </div><!-- center block -->

</div>
  </div><!-- container-fluid-->
</body>

</html>
