<?php
    /**
     * permet l'affichage de la liste des annonces
     *
     * @return void
     */
    function afficherAnnonce()
    {
        $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__)."/../views");
        $twig = new \Twig\Environment($loader, [
            //'cache' => 'false',
        ]);
        $url = $_SERVER['PHP_SELF'];  
        if(isset($_POST))
        {
            $a = new MySqlAnnonceDAO();
            $name = null;
            $droits = null;
            if(isset($_SERVER['name']))
            {
                $name = $_SERVER['name'];
            };
            if(isset($_SERVER['droits']))
            {
                $droits = $_SERVER['droits'];
            }
            $ru = new Rubrique('Rubrique');
            $ru -> setId($_POST['rub']);
            $annonce = $a -> getByRubrique($ru);
            echo $twig->render('vueListerAnnonces.html.twig', ['annonce' => $annonce, 'url' => $url, 'name' => $name, 'droits' => $droits]);
        }
        else{
            $name = null;
            $droits = null;
            if(isset($_SERVER['name']))
            {
                $name = $_SERVER['name'];
            };
            if(isset($_SERVER['droits']))
            {
                $droits = $_SERVER['droits'];
            }
            $ru = new MySQLRubriqueDAO();
            $rubs = $ru -> getAll();
            echo $twig->render('vueSelectionRubrique.html.twig', ['url' => $url, 'name' => $name, 'droits' => $droits, 'rubs' => $rubs]);
        }
    }