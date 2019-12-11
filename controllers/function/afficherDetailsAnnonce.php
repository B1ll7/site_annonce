<?php
     function afficherDetailsAnnonces()
     {
        $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__)."/../views");
        $twig = new \Twig\Environment($loader, [
            // 'cache' => 'false',
        ]);
        $a = new MySqlAnnonceDAO();
        $ru = new Rubrique();
        $ru -> setID($_SESSION['idRub']);
        $a1 = $a->getByRubrique($ru);
        $url = $_SERVER['PHP_SELF'];
            $name = null;
            $droits= null;
            if (isset($_SESSION['name'])) {
                $name = $_SESSION['name'];
            }
            if (isset($_SESSION['droits'])) {
                $droits = $_SESSION['droits'];
            }
        $ida = $_GET['idAnnonce'];
        foreach($a1 as $a)
        {
            if($a -> getID() == $ida)
            {
                $annonce = $a;
            }
        }
        echo $twig->render("vueDetailsAnnonce.html.twig", ['name' => $name, 'url' => $url,'droits' => $droits, 'annonce' => $annonce]);
     }