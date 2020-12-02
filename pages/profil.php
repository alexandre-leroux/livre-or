<?php session_start() ?>
<!DOCTYPE html>
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
      <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
      <!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> -->
      <link rel="stylesheet" href="css/style.css">
     
   </head>



   <body>

<?php 
   include('fonctions/fonctions.php');
?>


<?php

@$login = htmlspecialchars($_POST['login']);
@$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            if ( isset($_POST['submit_login']) )//modification du login


                    {


                        if ( !$_POST['login'] == NULL )

                        {
                                connection_bdd();
                                $bdd = connection_bdd();


                                recherche_login_existant($bdd);
                                $données_utilisateur = recherche_login_existant($bdd);
                            

                                if (isset($données_utilisateur['login']))
                                        {
                                            $login_deja_pris = 'Login déjà utilisé, veuillez en choisir un autre';
                                        }
                                else { 
                                    

                                    $req = $bdd->prepare('UPDATE utilisateurs SET login = :login WHERE id = :id');
                                    $req->execute(array(
                                
                                    'login' => $_POST['login'],
                                    'id' => $_SESSION['id']
                                            ));    
                                            
                                    $_SESSION['login'] = $_POST['login'];

                                    $bdd = NULL;

                                    $login_modifie = 'Votre changement de login a bien été enregistré';
                                    }
                        }


                        else 

                        {
                            $input_login_vide = 'Vous n\'avez pas saisi de login' ;
                        }
                        

                    }


                







            if ( isset($_POST['submit_password'])  )//modification du password


            {
                    
                                 
                    if (  $_POST['password'] != NULL AND  $_POST['confirm_password'] != NULL )
                    // si tous les champs sont remplis, on peu passer à la suite
                        

                        {
                
                            if ( @$_POST['confirm_password'] === @$_POST['password'] )
                            // on verifie d'abord que les mdp sont bien identiques

                                            {

                                                if ( strlen($_POST['password']) >= 8 AND strlen($_POST['password']) <= 15 AND preg_match('#[a-z]#',$_POST['password']) AND  preg_match('#[A-Z]#',$_POST['password']) AND  preg_match('#[,;:!&_"-]#',$_POST['password']) AND  preg_match('#[0-9]#',$_POST['password']) ) 
                                                    //obligation de caractères spéciaux, lettre min et maj et chiffres
                                                        {


                                                                connection_bdd();
                                                                $bdd = connection_bdd();
                                                                      
                                                                $password = $_POST['password'];
                                                                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                                                                $req = $bdd->prepare('UPDATE utilisateurs SET password = :password WHERE id = :id');
                                                                $req->execute(array(
                                                                    'password' => $password,                                                                    
                                                                    'id' => $_SESSION['id']
                                                                ));    
                                                            
                                                                $password_modifie = 'Votre password a bien été modifié';

                                                                $bdd = NULL;
                                                                                        
                                                        }

                                                else  
                                                // si mdp ne contient pas tout ce qu'il faut on génère le formulaire avec un message
                                                        {
            
                                                            $caractere_mdp = 'Le mot de passe doit contenir entre 8 et 15 caractères, minuscules, majuscules, au moins un chiffre et un caractère spécial (,;:!&_"-) ';
            
                                                        }   

                                            }

                             
                             else 
                             // si mdp non identiques, on génère le formulaire avec un message
                                     {
                                         $password_non_identiques = 'Les passwords ne sont pas identiques';
                                     }


                        }

                else
                // si des champs sont vides
                    {

                    $champs_manquants = 'veuillez remplir tous les champs';

                    }
            }
?>

<!-- header -->
<?php 
   include('includes/header-connect.php');
?>

<div class="masque_pour_header"></div>







<div class="container h-75" id="div_formulaire_profil">
    <div class="row h-100 ">
        <div class="col-6 h-50 mx-auto my-auto ">



                                <form class="form-signin-inscription  " action='profil.php' method='post'>

                                    <div class="text-center mb-4">

                                        <h1 class="h3 mb-3 font-weight-normal">Modifier votre login</h1>

                                    </div>

                                    <div class="form-label-group-inscription">
                                        <p>Login actuel : <?php echo $_SESSION['login'];?></p>
                                    
                                        <input  type="login" name="login" class="form-control" id="login" placeholder="test" >
                                    </div>


                                    <p class="text-center text-danger">
                                       <?php   if (   !@$login_deja_pris == NULL ) { echo $login_deja_pris; }//si login déjà pris ?>
                                    </p>

                                    <p class="text-center text-primary">
                                        <?php   if (   !@$login_modifie == NULL ) { echo $login_modifie; } //si la modification du login est ok?>
                                    </p>

                                    <p class="text-center text-danger">
                                        <?php   if (   !@$input_login_vide == NULL ) { echo $input_login_vide; } //si la modification du login est ok?>
                                    </p>
                                   
                                    <button class="btn btn-lg btn-primary btn-block" name="submit_login" type="submit">Confirmer la modification du login</button>

                                </form>




                        <form class="form-signin-inscription h-100" action='profil.php' method='post'>

                            <div class="text-center mb-4">

                                <h1 class="h3 mb-3 font-weight-normal">Modifier votre password</h1>
                        
                            </div>

              
                            <div class="form-label-group-inscription">
                                <input name='password' type="password" id="inputPassword" class="form-control" placeholder="Password" >
                                <label for="inputPassword">Password</label>
                            </div>

                            <div class="form-label-group-inscription">
                                <input name='confirm_password' type="password" id="confirmPassword" class="form-control" placeholder="Password" >
                                <label for="confirmPassword">Confirm password</label>
                            </div>

                            <p class="text-center text-danger">
                                                                <?php  
                                                                        if (   !@$password_non_identiques == NULL ) { echo $password_non_identiques; }  
                                                                        if (   !@$champs_manquants == NULL ) { echo $champs_manquants ; }
                                                                        if (   !@$caractere_mdp == NULL ) { echo $caractere_mdp ; }
                                                                ?>
                            </p>
                            <p class="text-center text-primary">
                                        <?php   if (   !@$password_modifie == NULL ) { echo $password_modifie; } //si la modification du password est ok?>
                                    </p>

                            <button class="btn btn-lg btn-primary btn-block" name="submit_password" type="submit">Confirmer la modification du password</button>
                            
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