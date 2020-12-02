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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="css/style.css">
     
   </head>



   <body>


<!-- header selon si tuilisateur connecté ou non -->
 <?php 

        include('fonctions/fonctions.php');
 
        if ( isset($_SESSION['login']))
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




<!--  titre principal  -->
<div class="container mx-auto" id='containeur_titre_livreor'>
    <div class="row h-100 no-gutters mx-auto">
        <div class="col-6 mx-auto d-flex align-items-center ">
            <h1 class='w-100 text-center text-info'>Bienvenue sur le livre d'or</h1>
        </div>
    </div>
</div>

<?php if ( isset($_SESSION['login']))// pour afficher le lien d'ajout de commentaire si l'utilisateur est connecté
                {
                  echo '<div class="container my-5"><div class="row"><div class="col-6 mx-auto d-flex justify-content-center"><a class="text-nowrap mx-5 text-uppercase" href="commentaire.php">écrire un message</a></li></div></div></div>';
                }
     
 ?>




<?php

connection_bdd();
$bdd = connection_bdd();



$requete = $bdd->prepare('SELECT commentaire, date, login FROM commentaires INNER JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id ORDER BY date DESC');
$requete->execute(array());//récupération des message dans la bdd
$bdd = NULL;


while ( $donnees = $requete->fetch(PDO::FETCH_ASSOC) )
{?>

    <div class="containeur">
        <div class="row  no-gutters">
            <div class="col-6 mx-auto">
                <table class="table table-bordered">

                    <tbody>
                            <tr>
                                <!-- affichage de la date et de l'utilisateur qui a posté le message -->
                                <td id='td_messages'> <?php echo 'Message posté le '. date('d/m/Y', strtotime( $donnees['date'])). ' par  <span class="terme"><strong>'.$donnees['login'].'</strong></span>' ; ?> </td>

                            </tr>

                            <tr class='message'>
                                 <!-- affichage du message -->
                                <td ><?php echo $donnees['commentaire']?></td>
                            
                            </tr>

                    </table>

            </div>
        </div>
    </div>

<?php
}
?>







<!-- footer -->
<?php 
  include('includes/footer.html');
?>










</body>


</html>