<?php
//add a new bet in the db "events"
//care we have to write the championship with the same characters as nav menue for the print of the bet

$check=TRUE;
$check_odds='';
$add_bet_success='';
$add_bet_failed='';


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
  $check=FALSE;
  $a= "odds1 and odds2 must be >=1.01";
  }

$team1 = mysqli_real_escape_string($db, $team1);
$team2 = mysqli_real_escape_string($db, $team2);
$odds1 = mysqli_real_escape_string($db, $odds1);
$odds2 = mysqli_real_escape_string($db, $odds2);
$sport = mysqli_real_escape_string($db, $sport);
$championship = mysqli_real_escape_string($db, $championship);
//date of the bet year-month-day
$date = date('Y-m-d');

//insertion of the bet in the db "events"
  include_once(DIR_ROOT . 'app/model/add_new_bet.php');
  $db_add_new_bet=add_new_bet($team1, $team2, $odds1, $odds2, $sport, $championship, $date);


    if($db_add_new_bet)
     {
       $add_bet_success="add bet done";
     }
     else
     {
       $add_bet_failed="add bet failed";
     }
}

include_once(DIR_ROOT . 'app/view/add_new_bet.php');
