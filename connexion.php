
<?php session_start() ;?>

<html lang="fr">
   <head>

      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>index</title>
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>      
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="css/style.css">
     
   </head>



   <body>


<!-- header -->
<?php   
        include('includes/header-non-connect.html');
        include('fonctions/fonctions.php');
?>


<!-- pour garder le fond noir sur le header -->
<div class="masque_pour_header"></div>


<?php

  @$login = htmlspecialchars($_POST['login']);
  @$password = password_hash($_POST['password'], PASSWORD_DEFAULT);


    if ( isset($_POST['submit']) AND !$_POST['login']== NULL AND !$_POST['password']== NULL )//teste si tous les champs sont rempli lors de la validation du formulaire


        {
            //connexion à la bdd
            connection_bdd();
            $bdd = connection_bdd();

            //requête pour trouver le login dans la bdd
            recherche_login_existant($bdd);
            $données_utilisateur = recherche_login_existant($bdd);
            $bdd = NULL;


            //si login trouvé, vérification du mdp
            if (!$données_utilisateur == NULL AND password_verify($_POST['password'], $données_utilisateur['password'])) 
            
                {
                    //si ok, fermeture de la bdd création de la session et redirection sur l'accueil
                    $_SESSION['login'] = $données_utilisateur['login'];
                    $_SESSION['id'] = $données_utilisateur['id'];
                    header('location:index.php');
                    exit();
                }

            //sinon message erreur, la variable est echo dans le form
            else    {$mauvais_login_mdp = ' login ou mot de passe incorrect';}
     

        }


    //sinon message erreur, la variable est echo dans le form
     else    {$champs_manquants = 'Veuillez remplir tous les champs';}


?>




<!-- ---------------------------------------- formulaire de connexion html--------------------------------- -->
<div class="container" id="div_formulaire_connect">
    <div class="row h-100">
        <div class="col-6 mx-auto d-flex align-items-center">

            <form class="form-signin my-auto" action='connexion.php' method='post'>
                   <p class='text-center text-primary'><?php  if (isset($_SESSION['inscription_ok'])){echo $_SESSION['inscription_ok'] ; } //pour afficher un message quand l'utilisateur arrive ici depuis la page inscription  ?></p>
                    <h1 class="h3 mb-3 font-weight-normal text-center">Se connecter</h1>

                    <label for="inputEmail" class="sr-only">Login</label>
                    <input type="text" id="login_connect" name="login" class="form-control" placeholder="Login"  autofocus>

                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" >

                    <p class="text-center text-danger"><?php  if(isset($_POST['submit']) AND isset($champs_manquants)) {echo $champs_manquants;}  
                                                              if(isset($_POST['submit']) AND isset($mauvais_login_mdp)) {echo $mauvais_login_mdp;}    
                                                                ?></p>

                    <button class="btn btn-lg btn-primary btn-block" name='submit' type="submit">Envoyer</button>
                   

            </form>

        </div>
    </div>
</div>



<!-- footer -->
<?php 
  include('includes/footer.html');
?>








</body>


</html>