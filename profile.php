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
        <li class="active"><a href="#">Profile Home</a></li>
        <li class="dropdown">
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
       <li><a href="index.php"><? $_POST['logout'] = true; ?>Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
  </div><!-- container-fluid-->

</body>

</html>