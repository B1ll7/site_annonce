<?php
    function afficherSesAnnonces()
    {
        /**
         * Renvoie à la page d'accueil quand aucun lien n'a encore été cliqué
         */
        $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__)."../../views");
        $twig = new \Twig\Environment($loader, [
            // 'cache' => 'false',
        ]);
        $url =$_SERVER['PHP_SELF'];
        $name = $_SESSION['name'];
        $u = new Utilisateur();
        $u -> setID($_SESSION['iduser']);
        $a = new MySqlAnnonceDAO();
        $annonce = $a -> getByUtilisateur($u);
        $ru = new MySQLRubriqueDAO();
        $rubs = $ru -> getAll();
        echo $twig->render("vueListerAnnonce.html.twig", ['name' => $name, 'url' => $url, 'annonce' => $annonce, 'rubs' => $rubs]);
    
    }