<?php
    function creerAnnonce()
    {
        /**
         * Renvoie à la page d'accueil quand aucun lien n'a encore été cliqué
         */
        $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__)."/../views");
        $twig = new \Twig\Environment($loader, [
            // 'cache' => 'false',
        ]);
        $url =$_SERVER['PHP_SELF'];
        $name = $_SESSION['name'];
        $id = $_SESSION['iduser'];
        $rubrique = new MySQLRubriqueDAO();
        $rubs = $rubrique -> getAll();
        if(isset($_POST) and $_POST != null)
        {
            
            $entete = $_POST['entete'];
            $rubrique = $_POST['rub'];
            $corps = $_POST['corps'];
            $a = new Annonce();

            $a1 = new MySqlAnnonceDAO();
            $a -> setID_EST_DEPOSEE_CONSULTE($id);
            $a -> setID_APPARTIENT($rubrique);
            $a -> setENTETE($entete);
            $a -> setCORPS($corps);
            $a -> setDATE_DEPOT(date("Y-m-d"));
            $a -> setDATE_VALIDITE($_POST['date']);

            $a1 -> insert($a);
            echo $twig->render("showAcceuil.html.twig", ['name' => $name, 'url' => $url]);
        }
        else 
        {
            echo $twig -> render('creerAnnonce.html.twig', ['url' => $url, 'name' => $name, 'rubs' => $rubs]);
        }
    }