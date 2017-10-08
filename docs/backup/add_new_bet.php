<?php
//add a new bet in the db "events"
//care we have to write the championship with the same characters as nav menue for the print of the bet

include("connect_db.php");
$a='';
$b='';
$c='';


  if(isset($_POST["add"]))
  {

$team1 = $_POST["team1"];
$team2 = $_POST["team2"];
$odds1 = $_POST["odds1"];
$odds2 = $_POST["odds2"];
$sport=$_POST["sport"];
$championship = $_POST["championship"];


//odds1 and odds2 must be >=1.01
if ($odds1<1.01 || $odds2<1.01)
  {
  $a= "odds1 and odds2 must be >=1.01";
  }
else
{

$team1 = mysqli_real_escape_string($db, $team1);
$team2 = mysqli_real_escape_string($db, $team2);
$odds1 = mysqli_real_escape_string($db, $odds1);
$odds2 = mysqli_real_escape_string($db, $odds2);
$sport = mysqli_real_escape_string($db, $sport);
$championship = mysqli_real_escape_string($db, $championship);
//date of the bet year-month-day
$date = date('Y-m-d');

//insertion of the bet in the db "events"
    $sql ="INSERT INTO events ( team1, team2, odds1, odds2, sport, championship, dateofbet   )
                      VALUES ('$team1', '$team2', '$odds1', '$odds2', '$sport', '$championship', '$date')";
    $query=mysqli_query($db,$sql);


    if ($query)
     {
       $b="add bet done";
     }
     else
     {
       $c="add bet failed";
     }
  }
  }


  mysqli_close($db);

  ?>







<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>BetWin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

  </head>

<body>

<?php //include("menu.php"); ?>

<form class="form-horizontal" role="form" method="post" action='' autocomplete="on">

  <h2> Ajouter un nouveau paris </h2>


    <div class="form-group">
      <label class="control-label col-sm-2" for="team1">team1</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="team1" required="required" name="team1" placeholder="team1">
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-2" for="team2">team2</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="team2" required="required" name="team2" placeholder="team2">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="odds1">odds1</label>
      <div class="col-sm-10">
        <input type="float" class="form-control" id="odds1" required="required" name="odds1" placeholder="odds1">
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-2" for="odds2">odds2</label>
      <div class="col-sm-10">
        <input type="float" class="form-control" id="odds2" required="required" name="odds2" placeholder="odds2">
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-2" for="sport">sport</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="sport" required="required" name="sport" placeholder="sport">
      </div>
    </div>



    <div class="form-group">
      <label class="control-label col-sm-2" for="championship">championship</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="championship"  name="championship" required="required" placeholder="championship">
      </div>
    </div>




    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default" name="add" >add</button>
      </div>
    </div>


</form>
<div id="return"> <?php  echo "$a $b $c"   ?>  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
