<?php
    /**
     * permet l'affichage de la liste des annonces
     *
     * @return void
     */
    function afficherAnnonce()
    {
        $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__)."/views");
        $twig = new \Twig\Environment($loader, [
            //'cache' => 'false',
        ]);
        $ru = new Rubrique('chapeau');
        $a = new MySqlAnnonceDAO();
        $tableau = $a -> getByRubrique($ru);
        $url = $_SERVER['PHP_SELF'];
        echo $twig->render('vueListerAnnonces.html.twig', ['annonce' => $tableau, 'url' => $url]);
    }