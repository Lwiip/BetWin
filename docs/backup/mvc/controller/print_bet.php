<?php
//print a bet from the db events on the right place
//use of GET methods add in the menue href="print_bet.php?champ=Ligue 1"
//we have to had submit button


$sp='';
$ch='';
$t1='';
$od1='';
$t2='';
$od2='';

$ch=$_GET['champ'];


include_once(DIR_ROOT . 'app/model/print_bet.php');
$query=print_bet($ch);

while ($values = mysqli_fetch_assoc($query))
{
  $sp=$values['sport'];
  $ch=$values['championship'];
	$t1=$values['team1'];
  $od1=$values['odds1'];
	$t2=$values['team2'];
  $od2=$values['odds2'];
  include(DIR_ROOT . 'app/view/print_bet.php');

}
mysqli_free_result($query);
