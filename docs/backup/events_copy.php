<!DOCTYPE html>
  <html lang="fr">
<head>
  <title>BetWin</title>
  <meta charset="utf-8">
  <?php echo '<link href="' . WEBSITE_ROOT . 'vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">'; ?>
      <?php echo '<link rel="stylesheet" href="' . WEBSITE_ROOT . 'public/css/event.css">'; ?>
</head>

<body>





  <?php

     include_once(DIR_ROOT . 'app/view/component/navbar.php');
     $check=TRUE;

     $username=$_SESSION['username'];
     include_once(DIR_ROOT . 'app/model/db_users_get_id.php');
     $user_id = db_users_get_id($_SESSION['username']);




    //Events table contains some entries
    if (mysqli_num_rows($events) != 0) {
      while ($row = mysqli_fetch_assoc($events))
      {
        $events_id=$row['id'];
        $sport=$row['sport'];
        $team1=$row['team1'];
        $odd1=$row['odds1'];
        $team2=$row['team2'];
        $odd2=$row['odds2'];
        $check_bet=FALSE;  //Pour vérifier qu'un paris a été effectué sur l'évènement





        //Block
        ?>
<div class="container">
    <div class="row">
           <h2 id="sport"><?php echo "$sport" ?>
           <h2 id="match"><?php echo "$team1" ?> vs <?php echo "$team2" ?> </h2>

           <div class="col-sm-6 team">
              <?php echo "$team1" ?>   cote: <?php echo "$odd1" ?>
           </div>
           <div class="col-sm-6 team">
              <?php echo "$team2" ?>    cote: <?php echo "$odd2" ?>
           </div>

<form  role="form" method="post" action='' >
           <div class="col-sm-6 bet" >
                <button type="submit" class="btn btn-default" name="<?php echo "$events_id$team1"  ?>"  >Parier pour <?php echo "$team1" ?></button>
           </div>
           <div class="col-sm-6 bet"  >
                <button type="submit" class="btn btn-default" name="<?php echo "$events_id$team2"  ?>" >Parier pour <?php echo "$team2" ?>  </button>
           </div>

           <div class="form-group money_form">
             <label class="control-label col-sm-2" for="money">Argent que vous voulez parier:</label>
              <div class="col-sm-3">
               <input type="number" class="form-control"  name="money" placeholder="Argent"  min="0">
             </div>
           </div>

            <div class="col-sm-1">
             <button type="submit" class="btn btn-default" id="end_event" name="<?php echo "end_$events_id"  ?>" >Terminer l'évènement </button>
           </div>
</form>

    </div>
</div>


         <?php
         if (isset($_POST["$events_id$team1"]) OR isset($_POST["$events_id$team2"])){
           $money=$_POST["money"];
           include_once(DIR_ROOT . 'app/model/events_check_money.php');
           $money_check=events_check_money($user_id);

           if ($money==0){
             echo "Vous ne pouvez pas parier 0 euros";
           }

           if($money>=$money_check){
             $check=FALSE;
              echo "Vous n'avez pas assez d'argent sur votre compte pour faire ce paris !";
           }

         }

         if (isset($_POST["$events_id$team1"]) AND $money>0){
           if ($check){

             include_once(DIR_ROOT . 'app/model/events_add_in_user1.php');
             $events_add_in_user_success1=events_add_in_user1($user_id, $events_id, $money, $odd1, $team1);

             if( $events_add_in_user_success1){
               include(DIR_ROOT . 'app/model/profile_money_alter.php');
               $response_alteration = profile_money_alter($_SESSION['username'], -$money);
               $check_bet=TRUE;
               echo "done";


                }
              else {
                echo "Vous avez déjà parié sur cet évènement, choisissez un autre événement ! ";
                    }
                }
          }

          if (isset($_POST["$events_id$team2"])  AND $money>0){
                if ($check){
                  include_once(DIR_ROOT . 'app/model/events_add_in_user2.php');
                  $events_add_in_user_success2=events_add_in_user2($user_id, $events_id, $money, $odd2, $team2);

                  if( $events_add_in_user_success2){
                    include(DIR_ROOT . 'app/model/profile_money_alter.php');
                    $response_alteration = profile_money_alter($_SESSION['username'], -$money);
                    $check_bet=TRUE;
                    echo "paris pris en compte dans la base de données";


                     }
                   else {
                     echo "Vous avez déjà parié sur cet évènement, choisissez un autre événement ! ";
                        }
                    }
              }




               if (isset($_POST["end_$events_id"]) /*AND $check_bet*/) {//Le isset($check_bet) ne fonctionne pas

                  $nbr_aléa=rand(0,1);
                  if ($nbr_aléa==0){
                      $team_win=$team1;
                      include(DIR_ROOT . 'app/model/events_add_winner.php');
                      $have_final_winner=events_add_winner($events_id,$team_win);
                      if ($have_final_winner){
                        echo "Le vainceur est $team_win <br />";
                      }
                    else {
                      echo "ajout du vainqueur n'a pas marché";
                    }
                  }

                  if ($nbr_aléa==1){
                      $team_win=$team2;
                      include(DIR_ROOT . 'app/model/events_add_winner.php');
                      $have_final_winner=events_add_winner($events_id,$team_win);
                      if ($have_final_winner){
                        echo "Le vainceur est $team_win <br />";
                      }
                      else {
                        echo "ajout du vainqueur n'a pas marché";
                      }
                  }

                  include_once(DIR_ROOT . 'app/model/events_which_team.php');
                  $which_team=events_which_team($user_id,$events_id);
                  include_once(DIR_ROOT . 'app/model/events_which_odd.php');
                  $which_odd=events_which_odd($user_id,$events_id);
                  include_once(DIR_ROOT . 'app/model/events_which_betting_money.php');
                  $which_betting_money=events_which_betting_money($user_id,$events_id);

                 if (strcmp ( $which_team, $team_win) ==0 ) {
                    include(DIR_ROOT . 'app/model/profile_money_alter.php');
                    $response_alteration = profile_money_alter($_SESSION['username'],($which_odd*$which_betting_money) );
                    echo "Bravo vous avez gagné le paris ! La somme à été crédité sur votre compte <br />";
              }
              else {
                echo "dommage vous avez perdu..<br \> ";
              }

                    include_once(DIR_ROOT . 'app/model/events_delete.php');
                    $delete=events_delete($events_id);
                    if ($delete){
                      echo "l'évènement n'est plus dans la base de données <br \>";
                      echo "Veuillez rafraichir la page <br \>";
                    }

                  else {
                    echo"delete failed <br \>";
                  }


               }
          }
        mysqli_free_result($events);
          }



    //Events table is empty
    else {
      echo '<p> No events currently. Please wait and be ready to bet on some amazing events! </p>';
      mysqli_free_result($events);                                     //Good to do it or not?
    }
  ?>

  <?php include_once(DIR_ROOT . 'app/view/component/footer.php');?>

 </body>
</html>
