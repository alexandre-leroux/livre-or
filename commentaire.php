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


<?php
if ( isset($_POST['submit_commentaire'])  )

                {
                    if (!$_POST['commentaire'] == NULL ) {

                                try 
                                    {
                                        $bdd = new PDO('mysql:host=localhost;dbname=livreor;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                                    }
                                catch (Exception $e)
                                    {
                                        die('Erreur : ' . $e->getMessage());
                                    }

                                    $commentaire = htmlspecialchars($_POST['commentaire']);

                                    $today = date("Y-m-d H:i:s"); 
                                    $requete = $bdd->prepare('INSERT INTO commentaires (commentaire, id_utilisateur,date) VALUES (:commentaire, :id_utilisateur, :date) ');
                                    $requete->execute(array(
                                        'commentaire'=> $commentaire,
                                        'id_utilisateur'=>$_SESSION['id'],
                                        'date'=>$today

                                    ));
                                    $bdd = NULL;
                            $commentaire_ajoute = 'Merci pour votre commentaire !';
                
                
                        }

                     else {$commentaire_vide = 'Veuillez saisir votre commentaire ' ;}   
                }



else { }


?>

      
<div class="container" id='div_formulaire_livreor' >
    <div class="row h-100">
        <div class="col mx-auto d-flex align-items-center">


                    <form class='w-75 mx-auto' action='livre-or.php' method='post'>
              
                    
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Ecrivez votre comentaire :</label>
                            <textarea class="form-control" name='commentaire' id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>

                        <p class='text-center text-danger'><?php echo @$commentaire_vide; ?></p>
                        <p class='text-center text-primary'><?php echo @$commentaire_ajoute; ?></p>

                        <button class="btn btn-primary" name='submit_commentaire' type="submit">Envoyer</button>

                    


                    </form>


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
        <div class="row">
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





































<script type="text/javascript" src="js/script.js"></script>





</body>


</html>