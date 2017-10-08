<?php
//print a bet from the db events on the right place
//use of GET methods add in the menue href="print_bet.php?champ=Ligue 1"
//we have to had submit button

include("connect_db.php");
$sp='';
$ch='';
$t1='';
$od1='';
$t2='';
$od2='';

$ch=$_GET['champ'];

$sql ="SELECT * FROM events WHERE championship='$ch'";
$query=mysqli_query($db,$sql);
while ($values = mysqli_fetch_assoc($query))
{
  $sp=$values['sport'];
  $ch=$values['championship'];
	$t1=$values['team1'];
  $od1=$values['odds1'];
	$t2=$values['team2'];
  $od2=$values['odds2'];

  ?>


 <!DOCTYPE html>
   <html lang="fr">
 <head>
   <title>BetWin</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 </head>


<body>
   <div class="container">
  <h2><?php echo "$t1" ?> vs <?php echo "$t2" ?> </h2>
    <div class="panel panel-default">
      <div class="panel-heading"> <?php echo "$t1" ?>   cote: <?php echo "$od1" ?></div>
      <div class="panel-body"><?php echo "$t2" ?>    cote: <?php echo "$od2" ?></div>
    </div>

  </body>
 </html>



<?php
}

mysqli_free_result($query);
?>
