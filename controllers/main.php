<?php
    require realpath(__DIR__.'./../dao/requirefile.php'); 
    require realpath(__DIR__.'./function/requirefile.php'); 
    require_once '../vendor/autoload.php';

    /**
     * @session_start debute la session de l'utilisateur
     */
    session_start();

    /**
     * condition qui verifie si l'utilisateur et a déjà lancé une action ou pas 
     */
    if(isset($_GET['action']))
    {    /**
          *  Si une action a été lancer verifie la valeur de l'action et debut les fonctions par rapport à celle-ci 
          */
        $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__)."/views");
        $twig = new \Twig\Environment($loader, [
            // 'cache' => 'false',
        ]);
        switch($_GET['action'])
        {
            case "afficherRubriques":
                afficherRubriques();
                break;
            case 'ajouterRubrique':
                ajouterRubrique();
            break;
            case 'identifierUtilisateur':
                identifierUtilisateur();
            break;
            case 'creerUtilisateur':
                creerUtilisateur();
            break;
            case 'afficherAnnonces':
                afficherAnnonce();
            break;
            case 'supprimerAnnonce':
                supprimerAnnonce();
            break;
            case 'creerAnnonce':
                creerAnnonce();
            break;
            case 'logout':
                session_destroy();
                echo $twig->render("showAcceuil.html.twig");
            break;
            default:
                echo "Error ici";
                break;
        }
    }
    else if (isset($_POST['action']))
    {
        /**
         * La valeur de l'action vient du formulaire, lance donc la fonction par rapport à cette action  
         */
        switch($_POST['action'])
        {
            case "ajouterRubrique":
                ajouterRubrique();
            break;
            case 'identifierUtilisateur':
                identifierUtilisateur();
            break;
            default:
            case 'creerUtilisateur':
                creerUtilisateur();
            break;
            case 'afficherAnnonce':
                afficherAnnonce();
            break;
            case 'creerAnnonce':
                creerAnnonce();
            break;
            case 'supprimerAnnonce':
                supprimerAnnonce();
            break;
                echo 'ERROR 404 PAS TROUVER LA PAGE DU POST';
            break;
        }
    }
    else
    {
        /**
         * Renvoie à la page d'accueil quand aucun lien n'a encore été cliqué
         */
        $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__)."/views");
        $twig = new \Twig\Environment($loader, [
            // 'cache' => 'false',
        ]);
        $url = $_SERVER['PHP_SELF'];
        $name = null;
        $droits= null;
        if (isset($_SESSION['name'])) {
            $name = $_SESSION['name'];
        }
        if (isset($_SESSION['droits'])) {
            $droits = $_SESSION['droits'];
        }
        $err_message = null;
        echo $twig->render("showAcceuil.html.twig", ['name' => $name, 'url' => $url, 'error' => $err_message, 'droits' => $droits]);
    }

    function creerAnnonce()
    {
         /**
         * Renvoie à la page d'accueil quand aucun lien n'a encore été cliqué
         */
        $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__)."/views");
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
            $a -> setDATE_DEPOT(date("Ymd"));
            $a -> setDATE_VALIDITE($_POST['date']);

            $a1 -> insert($a);
            echo $twig->render("showAcceuil.html.twig", ['name' => $name, 'url' => $url]);
        }
        else 
        {
            echo $twig -> render('creerAnnonce.html.twig', ['url' => $url, 'name' => $name, 'rubs' => $rubs]);
        }
    }