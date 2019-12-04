<?php
    /**
     * Affche le template risquer rubrique
     *
     * @return void
     */
    function afficherRubriques()
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/../../views');
        $twig = new \Twig\Environment($loader, [
            //'cache' => 'false',
        ]);
        $name = null;
        $droits = null;
        if(isset($_SESSION['name']))
        {
            $name = $_SESSION['name'];
        }
        if(isset($_SESSION['droits']))
        {
            $droits = $_SESSION['droits'];
        }
        $ru = new MySQLRubriqueDAO();
        $tableau = $ru -> getAll();
        $url = $_SERVER['PHP_SELF'];
        echo $twig->render('vueListerRubrique.html.twig', ['rubs' => $tableau, 'url' => $url, 'name' => $name, 'droits' => $droits]);
    }