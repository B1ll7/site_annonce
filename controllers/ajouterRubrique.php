<?php
    /**
     * Affiche le template d'ajouter rubrique la requete par formulaire n'a pas encore été faite sinon insert le formulaire dans la bdd et affiche la liste des formulaires
     *
     * @return void
     */
    function ajouterRubrique()
    {
        if(isset($_POST) && $_POST != null)
        {
            $rubrique = $_POST['rubrique'];
            $ru = new Rubrique($rubrique);
            $r = new MySQLRubriqueDAO;
            $r -> insert($ru);
            afficherRubriques();
        }
        else
        {
            $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__)."/views");
            $twig = new \Twig\Environment($loader, [
                // 'cache' => false
            ]);
            $url = $_SERVER['PHP_SELF'];
            echo $twig -> render('vueAjouterRubrique.html.twig', ['url' => $url]);
        }
    }