<?php
    /**
     * Affiche le template d'ajouter rubrique la requete par formulaire n'a pas encore été faite sinon insert le formulaire dans la bdd et affiche la liste des formulaires
     *
     * @return void
     */
    function ajouterRubrique($err=null)
    {
        $name = null;
        $url = $_SERVER['PHP_SELF'];
        if(isset($_SESSION['name']))
        {
            $name = $_SESSION['name'];
        }
        if(isset($_POST) && $_POST != null)
        {
            $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__)."/../views");
            $twig = new \Twig\Environment($loader, [
                // 'cache' => false
            ]);
            $rubrique = $_POST['rubrique'];
            $ru = new Rubrique($rubrique);
            $r = new MySQLRubriqueDAO;
            if($ru -> getLibelle() != null)
            {
                $r -> insert($ru);
            }
            else 
            {
                $err = 'Veuillez remplir le champs de libelle rubrique s\'il vous plait';
            }
            // ajouterRubrique($err);
            $err_message= $err;
            echo $twig -> render('vueAjouterRubrique.html.twig', ['url' => $url, 'name' => $name, 'erreur' => $err_message]);
        }
        else
        {
            $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__)."/../views");
            $twig = new \Twig\Environment($loader, [
                // 'cache' => false
            ]);
            
            echo $twig -> render('vueAjouterRubrique.html.twig', ['url' => $url, 'name' => $name]);
        }
    }