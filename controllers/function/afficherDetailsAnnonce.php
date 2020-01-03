<?php
     function afficherDetailsAnnonces()
     {
        $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__)."/../views");
        $twig = new \Twig\Environment($loader, [
            // 'cache' => 'false',
        ]);
        $a = new MySqlAnnonceDAO();
        $a1 = new Annonce();
        $a1 -> setID($_GET['idAnnonce']);
        $annonce = $a->getById($a1);
        $url = $_SERVER['PHP_SELF'];
        $name = null;
        $droits= null;
        if (isset($_SESSION['name'])) {
            $name = $_SESSION['name'];
        }
        if (isset($_SESSION['droits'])) {
            $droits = $_SESSION['droits'];
        }
        // var_dump($annonce);
        echo $twig->render("vueDetailsAnnonce.html.twig", ['name' => $name, 'url' => $url,'droits' => $droits, 'annonce' => $annonce]);
     }