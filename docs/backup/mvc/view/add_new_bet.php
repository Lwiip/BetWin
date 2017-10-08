
<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>BetWin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

  </head>

<body>

<?php // include_once(DIR_ROOT . 'app/view/menu.php'); ?>

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
<div id="return"> <?php  echo "$check_odds $add_bet_success $add_bet_failed " ?>  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
