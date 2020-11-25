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
<div class="wrapper">


         <?php 
            include('includes/header-non-connect.html');
         ?>


<!-- pour garder le fond noir sur le header -->
<div class="masque_pour_header"></div>


<div class="container" id="div_formulaire_inscrip">
    <div class="row h-100">
        <div class="col-6 mx-auto d-flex align-items-center">

                        <form class="form-signin-inscription" action='inscription.php' method='post'>

                            <div class="text-center mb-4">

                                <h1 class="h3 mb-3 font-weight-normal">Créer un compte</h1>
                        
                            </div>

                            <div class="form-label-group-inscription">
                                <input name='login' type="text" id="inputlogin" class="form-control" placeholder="Login" required autofocus>
                                <label for="inputlogin">Choisir votre login</label>
                            </div>

                            <div class="form-label-group-inscription">
                                <input name='password' type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                                <label for="inputPassword">Password</label>
                            </div>

                            <div class="form-label-group-inscription">
                                <input name='confirm_password' type="password" id="confirmPassword" class="form-control" placeholder="Password" required>
                                <label for="confirmPassword">Confirm password</label>
                            </div>

                            <p class="text-center">test</p>

                            <button class="btn btn-lg btn-primary btn-block" type="submit">S'inscrire</button>
                            
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
            

    @$login = htmlspecialchars($_POST['login']);
    @$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    


    if ( !$_POST == NULL )

            {

                
                        $req = $bdd->prepare(' SELECT * FROM utilisateurs WHERE login = :login ');//on va chercher dans la bdd si le login existe déjà
                        $req->execute(array( 'login' => $_POST['login']   ));
                        $donnees = $req->fetchall();


                        if (@$donnees['login'] == $_POST['login'])// on compare le résultat, si c'est le cas on générère un form avec le message " login déjà utilisé " 
            
                                {
                                    $login_deja_pris = 'Login déjà utilisé, veuillez en choisir un autre';
                                }


                        else{



                                                
                                    if ( $_POST['login'] != NULL AND  $_POST['password'] != NULL AND  $_POST['confirm_password'] != NULL )
                                        // si tous les champs sont remplis, on peu passer à la suite
                                            
                                            {
                                    
                                                if ( @$_POST['confirm_password'] === @$_POST['password'] )
                                                // on verifie d'abord que les mdp sont bien identiques

                                                                {

                                                                    

                                                                        $req = $bdd->prepare('INSERT INTO utilisateurs(login, password) VALUES(:login, :password)');
                                                                        $req->execute(array(
                                                                            'login' => $login,                                                                         
                                                                            'password' => $password,  ));

                                                                            // header('Location: connexion.php');//redirection
                                                                        
                                                                }

                                                else 
                                                // si mdp non identiques, on génère le formulaire avec un message
                                                                {
                                                                    $password_non_identiques = 'Les password ne sot pas identiques';
                                                                }

                                            }

                                    else {

                                        $champs_manquants = 'veuillez remplir tous les champs';

                                        }


                            }


            }
?>


























<!-- footer -->
<?php 
  include('includes/footer.html');
  ?>


<!-- <script type="text/javascript" src="js/script.js"></script> -->





</body>


</html>