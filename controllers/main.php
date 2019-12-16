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
            case 'afficherDetailsAnnonces':
                afficherDetailsAnnonces();
            break;
            case 'afficherDetailsAnnonces':
                afficherDetailsAnnonces();
            break;
            case 'afficherSesAnnonces':
                afficherSesAnnonces();
            break;
            case 'panneauDeConfig':
                afficherSesAnnonces();
            break;
            // case 'modifierMotdePasseUilisateur':
            //     modifierMotdePasseUilisateur();
            // break;
            case 'logout':
                session_destroy();
                afficherAnnonce();
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
            case 'creerAnnonce':
                creerAnnonce();
            break;
            case 'supprimerAnnonce':
                supprimerAnnonce();
            break;
            case 'afficherDetailsAnnonces':
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
        afficherAnnonce();
        // echo $twig->render("vueSelectionRubrique.html.twig", ['name' => $name, 'url' => $url, 'error' => $err_message, 'droits' => $droits]);
    }

function modifierMotdePasseUilisateur()
{
    // $u = new MySqlUtilisateurDAO()
    // $u ->
}

function afficherSesAnnonces()
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
    $u = new Utilisateur();
    $u -> setID($_SESSION['iduser']);
    $a = new MySqlAnnonceDAO();
    $annonce = $a -> getByUtilisateur($u);
    $ru = new MySQLRubriqueDAO();
    $rubs = $ru -> getAll();
    echo $twig->render("vueListerAnnonce.html.twig", ['name' => $name, 'url' => $url, 'annonce' => $annonce, 'rubs' => $rubs]);

}