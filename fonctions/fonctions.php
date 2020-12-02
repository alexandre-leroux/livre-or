
<!-------------------------------------- connection à la bdd -->
<?php 

        function connection_bdd()

        {

                try 
                {
                    $bdd = new PDO('mysql:host=localhost;dbname=livreor;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                }
                catch (Exception $e)
                {
                    die('Erreur : ' . $e->getMessage());
                }


            return $bdd;

        }

?>






<!-- ------------------------------- requete bdd voir si le login existe -->
<?php

        function recherche_login_existant($bdd)

        {

        $requete = $bdd->prepare('SELECT * FROM utilisateurs WHERE login = :login');
        $requete->execute(array('login' => $_POST['login']));
        $données_utilisateur = $requete->fetch();

        return $données_utilisateur;

        }


?>