<?php session_start() ;
$_SESSION['inscription_ok'] = NULL;
?>


<!DOCTYPE html>
<html lang="fr">
   <head>

      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>index</title>
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
      <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
      
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="css/style.css">
     
   </head>



   <body>


<!-- header -->
 <?php if ( isset($_SESSION['login']))
                {
                   include('includes/header-connect.php');
                }
       else
                {
                   include('includes/header-non-connect.html');
                }
 ?>
      <!-- pour garder le fond noir sur le header -->
<div class="masque_pour_header"></div>





<div class="container mx-auto" id='containeur_titre_livreor'>
    <div class="row h-100 no-gutters mx-auto">
        <div class="col-6 mx-auto d-flex align-items-center ">
            <h1 class='text-center text-info'>Bienvenue sur le livre d'or</h1>
        </div>
    </div>
</div>

<?php
 try 
 {
     $bdd = new PDO('mysql:host=localhost;dbname=livreor;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
 }
catch (Exception $e)
 {
     die('Erreur : ' . $e->getMessage());
 }




 $requete = $bdd->prepare('SELECT commentaire, date, login FROM commentaires INNER JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id');
 $requete->execute(array());
// $donnees = $requete->fetch(PDO::FETCH_ASSOC);

// echo $donnees['login'];




while ( $donnees = $requete->fetch(PDO::FETCH_ASSOC) )
{?>

    <div class="containeur">
        <div class="row  no-gutters">
        <div class="col-6 mx-auto">
        <table class="table table-bordered">

        <tbody>
        <tr>
            <td id='td_messages'><?php echo 'Message posté par <span class="terme"><strong>'.$donnees['login'].'</strong></span>, le ' . $donnees['date'];?></td>
            
        </tr>
        <tr class='message'>
            <td ><?php echo $donnees['commentaire']?></td>
          
        </tr>

        </table>

        </div>
        </div></div>
<?php
}
?>
<?php
echo '<pre>';
print_r($donnees) ;
echo '</pre>';



$bdd = NULL;
echo '<pre>';
print_r($donnees) ;
echo '</pre>';
?>





















echo '<pre>';
print_r($donnees) ;
echo '</pre>';



$bdd = NULL;
echo '<pre>';
print_r($donnees) ;
echo '</pre>';




?>




















<!-- footer -->
<?php 
  include('includes/footer.html');
  ?>











































</body>


</html>