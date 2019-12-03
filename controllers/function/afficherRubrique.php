<?php
    /**
     * Affche le template risquer rubrique
     *
     * @return void
     */
    function afficherRubriques()
    {
        $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__)."/views");
        $twig = new \Twig\Environment($loader, [
            //'cache' => 'false',
        ]);
        $ru = new MySQLRubriqueDAO();
        $tableau = $ru -> getAll();
        $url = $_SERVER['PHP_SELF'];
        echo $twig->render('vueListerRubrique.html.twig', ['rubs' => $tableau, 'url' => $url]);
    }