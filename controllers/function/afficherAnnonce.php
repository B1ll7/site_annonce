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
        if(isset($_POST) && $_POST != null)
        {
            $a = new MySqlAnnonceDAO();
            $name = null;
            $droits = null;
            if(isset($_SESSION['name']))
            {
                $name = $_SESSION['name'];
            };
            if(isset($_SESSION['droits']))
            {
                $droits = $_SESSION['droits'];
            }
            $ru = new Rubrique('Rubrique');
            $ru -> setId($_POST['rub']);
            $annonce = $a -> getByRubrique($ru);
            echo $twig->render('vueListerAnnonce.html.twig', ['annonce' => $annonce, 'url' => $url, 'name' => $name, 'droits' => $droits]);
        }
        else{
            $name = null;
            $droits = null;
            if(isset($_SESSION['name']))
            {
                $name = $_SESSION['name'];
            };
            if(isset($_SESSION['droits']))
            {
                $droits = $_SESSION['droits'];
            }
            $ru = new MySQLRubriqueDAO();
            $rubs = $ru -> getAll();
            echo $twig->render('vueSelectionRubrique.html.twig', ['url' => $url, 'name' => $name, 'droits' => $droits, 'rubs' => $rubs]);
        }
    }