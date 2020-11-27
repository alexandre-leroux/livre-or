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
<div class="wrapper">


         <?php if ( isset($_SESSION['login']))
                        {
                           include('includes/header-connect.php');
                        }
               else
                        {
                           include('includes/header-non-connect.html');
                        }
         ?>
      
      
<!-- page accueil -->
         <div class="masthead">

            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end"> 
                        <h1 id="nom_societe" class="text-uppercase">ivosserv</h1>
                        <h2 class="text-uppercase display-3 text-white font-weight-bold">la tech au service de vos services</h1>
                        <hr class="divider my-4" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                         <p class="text-white-75 text-light font-weight-light mb-5">Une expérience innovante, parfois même déroutante, au coeur des systèmes mêlant les services aux services !</p>
                        <a class="btn btn-primary btn-xl js-scroll-trigger" href="#ancre">About us</a>
                    </div>
                </div>
            </div>


</div>



<!-- présentation team -->

<div id="ancre"></div>

<div class="container-fluid w-75 my-5 h-100" id="container_equipe">

      <div id="equipe" class="row d-flex  min-vh-100 m-4">

         <h1 class=" w-100 text-center m-5">NOTRE EQUIPE</h1>

            <div class="d-flex w-100 flex-wrap justify-content-around">

                  <div class="coll-4">

                     <img class="m-4" src="images/portrait.jpg" alt="">
                     <h2 class="text-center">Richard</h2>

                  </div>
                  <div class="coll-4">

                     <img class="m-4" src="images/portrait.jpg" alt="">
                     <h2 class="text-center">Sébastien</h2>

                  </div>
                  <div class="coll-4">

                     <img class="m-4" src="images/portrait.jpg" alt="">
                     <h2 class="text-center">Alex</h2>

                  </div>
            </div>

      </div>

</div>



<!--  carroussel réalisations -->
<div class="containeur p-5">

   <hr class="divider-2 w-50" />

      <div class="row">

         <div class="col">
            <h1 class="text-uppercase m-5 text-center">nos réalisations</h1>
         </div>

      </div>

</div>

<div id="carouselExampleIndicators" class="carousel slide w-50 mx-auto mt-2 mb-5" data-ride="carousel">



      <ol class="carousel-indicators">

         <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
         <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
         <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>

      </ol>


      <div class="carousel-inner">

            <div class="carousel-item active">
               <img class="d-block w-100" src="images/carroussel-1.jpg" alt="First slide">
            </div>

            <div class="carousel-item">
               <img class="d-block w-100" src="images/carroussel-2.jpg" alt="Second slide">
            </div>

            <div class="carousel-item">
               <img class="d-block w-100" src="images/carroussel-3.jpg" alt="Third slide">
            </div>

      </div>


      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
         <span class="carousel-control-next-icon " aria-hidden="true"></span>
         <span class="sr-only ">Next</span>
      </a>



</div>




<!-- footer -->
<?php 
  include('includes/footer.html');
  ?>


<script type="text/javascript" src="js/script.js"></script>





</body>


</html>