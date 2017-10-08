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

<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
  <div class="navbar-header">

    <a class="navbar-brand" href="index.php">BetWin</a>
  </div>
  <ul class="nav navbar-nav">
    <li class="active"><a href="#"> Profil</a></li>

        <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href=""> Foot
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="print_bet.php?champ=Ligue 1">Ligue 1</a></li>
                <li><a href="print_bet.php?champ=Ligue A">Ligue A</a></li>
                <li><a href="print_bet.php?champ=Coupe Des Champions">Coupe Des Champions</a></li>
              </ul>
        </li>


        <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Basket
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Pro A</a></li>
                <li><a href="#">NBA</a></li>

              </ul>
        </li>

        <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Rugby
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Top 14</a></li>
                <li><a href="#">Tournoi des 6 Nations</a></li>
              </ul>
        </li>

        <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Tennis
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Grand chelem</a></li>
                <li><a href="#">Coupe Davis</a></li>
              </ul>
        </li>

  </ul>
  <ul class="nav navbar-nav navbar-right">
    <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Connexion</a></li>
    <li><a href="register.php"><span class="glyphicon glyphicon-log-in"></span> Inscription</a></li>
  </ul>
  </div>
</nav>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
