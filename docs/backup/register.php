
<?php
//Inscription sur le site avec cryptage du mpd
//vérification que les deux mpd sont les mêmes et vérification que l'email utilisé n'est pas déja utilisé.

include("connect_db.php");
$a='';
$b='';
$c='';
$d='';
$e='';


  if(isset($_POST["submit"]))
  {

$fname = $_POST["firstnamesignup"];
$lname = $_POST["lastnamesignup"];
$uname = $_POST["usernamesignup"];
$password = $_POST["passwordsignup"];
$password_comfirm=$_POST["passwordsignup_confirm"];
$email = $_POST["emailsignup"];
$adress = $_POST["adresssignup"];

//Vérif mpd et mpd_confirmation sont les mêmes
if ($password!=$password_comfirm)
  {
  $a= "Oups vous n'avez pas rentré deux fois le même mot de passe!";
  }
else
{

if ( strlen($password)<6){
  $d= "le mot de passe doit faire au moins 6 caractères!";
}
else {

if( strlen($lname)<2 || strlen($lname)<2 || strlen($uname)<2){
  $e="le nom, le prénom et le pseudo doivent faire au moins 2 caractères !";
}
else
{

$fname = mysqli_real_escape_string($db, $fname);
$lname = mysqli_real_escape_string($db, $lname);
$uname = mysqli_real_escape_string($db, $uname);
$password = mysqli_real_escape_string($db, $password);
//hach du mpd, possibilité d'utiliser sha256 pour plus de sécurtié.
$password = md5($password);
$email = mysqli_real_escape_string($db, $email);
$adress = mysqli_real_escape_string($db, $adress);

//Vérification que l'email n'est pas déja dans la bd users
$sql_verif_email="SELECT email FROM users WHERE email='$email'";
$verif_email=mysqli_query($db,$sql_verif_email);

if (mysqli_num_rows($verif_email)==1)
  {
  $b= "Il existe déja un compte associé a l'email ";
  }
else
  {

    $sql ="INSERT INTO users ( username, password, firstname, lastname, address, email)
                      VALUES ('$uname', '$password', '$fname', '$lname', '$adress', '$email')";
    $query=mysqli_query($db,$sql);


    if ($query)
     {
       header('Location: after_register.php');
       exit();


     }
     else
     {
       $c=("Input users failed");
     }
  }
  }
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
    <link rel="stylesheet" href="css/register.css" >
  </head>

<body>

<?php include("menu.php"); ?>

<form class="form-horizontal" role="form" method="post" action='' autocomplete="on">

  <h2> Inscription </h2>


    <div class="form-group">
      <label class="control-label col-sm-2" for="firstnamesignup">Nom:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="firstnamesignup" required="required" name="firstnamesignup" placeholder="firstname">
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-2" for="lastnamesignup">Prénom:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="lastnamesignup" required="required" name="lastnamesignup" placeholder="lastname">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="usernamesignup">Pseudo:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="usernamesignup" required="required" name="usernamesignup" placeholder="username">
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-2" for="passwordsignup">mot de passe:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="passwordsignup" required="required" name="passwordsignup" placeholder="Password 6 character mini">
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-2" for="passwordsignup_confirm">Confirmer mot de passe:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="passwordsignup_confirm" required="required" name="passwordsignup_confirm" placeholder="Password">
      </div>
    </div>



    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email"  name="emailsignup" required="required" placeholder="Enter email">
      </div>
    </div>



    <div class="form-group">
      <label class="control-label col-sm-2" for="adress">*Votre Adresse: </label>
      <div class="col-sm-10">
        <input type="adress" class="form-control" id="adresssignup"  name="adresssignup"  placeholder="Adress">
      </div>
    </div>



    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default" name="submit" >Register</button>
      </div>
    </div>

<div id="non_obligatoire" > * non obligatoire    </div>
<div id="return"> <?php  echo "$a $b $c $d $e"   ?>  </div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
