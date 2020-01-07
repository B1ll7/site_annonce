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
            $function = new Twig\TwigFunction('returnRoot', function ($filepath){
                $path = getcwd();
                $neo = explode('annonce',$path);
                $returnRoot = count(explode('\\',$neo[1]));
                $returnDot = '';
                for ($x=0;$x<$returnRoot-1;$x++){
                    $returnDot .= '../';
                }
                return $returnDot.$filepath;
            });
            $twig->addFunction($function);
            $rubrique = $_POST['rubrique'];
            $ru = new Rubrique($rubrique);
            $r = new MySQLRubriqueDAO;
            if($ru -> getLibelle() != null)
            {
                $r -> insert($ru);
                $success = 'La rurbique a bien été rajoutée';
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
                echo $twig->render('vueListerRubrique.html.twig', ['rubs' => $tableau, 'url' => $url, 'name' => $name, 'droits' => $droits,'success' => $success]);
            }
            else 
            {
                $err = 'Veuillez remplir le champs de libelle rubrique s\'il vous plait';
                echo $twig -> render('vueAjouterRubrique.html.twig', ['url' => $url, 'name' => $name, 'erreur' => $err]);
            }
        }
        else
        {
            $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__)."/../views");
            $twig = new \Twig\Environment($loader, [
                // 'cache' => false
            ]);
            $function = new Twig\TwigFunction('returnRoot', function ($filepath){
                $path = getcwd();
                $neo = explode('annonce',$path);
                $returnRoot = count(explode('\\',$neo[1]));
                $returnDot = '';
                for ($x=0;$x<$returnRoot-1;$x++){
                    $returnDot .= '../';
                }
                return $returnDot.$filepath;
            });
            $twig->addFunction($function);
            echo $twig -> render('vueAjouterRubrique.html.twig', ['url' => $url, 'name' => $name]);
        }
    }