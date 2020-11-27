
<header class="lg">
    <nav>

       <div class="menu-icon">
          <i class="fa fa-bars fa-2x"></i>
       </div>

       <div class="logo ml-5 my-2 d-flex">
          <img id="img_logo" src="images/logo.png" alt="logo">
        
       </div>

       <div class="menu">


        
  
          <ul>
            <li><p class="font-weight-bold text-info "><?php echo 'Bienvenue '.$_SESSION['login'].''?></p></li>
            <li><a href="index.php">Home</a></li>
            <li><a href="profil.php">Modifier son profil</a></li>
            <li><a href="livre-or.php">Livre d'or</a></li>              
            <li>
                <form action="index.php" method='post'>
                     <button type="submit" name='deco' class="btn btn-info">Déconnexion</button>            
               </form></li>           
          </ul>
       </div>
       

    </nav>
 </header>

<?php

if ( isset($_POST['deco']))
    {
        session_destroy();
        header('location:index.php');
        exit();
    }

    ?>