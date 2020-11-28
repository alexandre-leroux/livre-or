
<header class="xl">
    <nav class="xl">

       <div class="menu-icon">
          <i class="fa fa-bars fa-2x"></i>
       </div>

       <div class="logo ml-5 my-2 d-flex">
          <img id="img_logo" src="images/logo.png" alt="logo">
       </div>

       <div class="menu   ">
      

        
  
          <ul class='d-flex flex-nowrap justify-content-end xl'>




            
            <li class='px-4'><a href="index.php">Home</a></li>

            <li class='px-4'><a class='text-nowrap ' href="livre-or.php">Livre d'or</a></li>    

            <li class='px-4'><a  href="profil.php"><p id="lien_modif_profil" class="font-weight-bold text-info text-nowrap "><?php echo 'Bienvenue '.$_SESSION['login'].''?></p></a></li>

            <li class='px-4'>
                <form action="index.php" method='post'>
                     <button type="submit" name='deco' class="btn btn-info">Déconnexion</button>            
               </form>
            </li>

         </ul>

       </div>
       

    </nav>
 </header>

<?php

if ( isset($_POST['deco']))
    {
      session_unset();
      session_destroy();
      header('location:index.php');
      exit();

    }

    ?>