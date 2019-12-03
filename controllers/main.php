<?php
    require realpath(__DIR__.'./../dao/requirefile.php'); 
    require_once '../vendor/autoload.php';

    session_start();

    if(isset($_GET['action']))
    {    
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
            default:
                echo "Error";
                break;
        }
    }
    else if (isset($_POST['action']))
    {
        switch($_POST['action'])
        {
            case "ajouterRubrique":
                ajouterRubrique();
            break;
            case 'identifierUtilisateur':
                identifierUtilisateur();
            break;
            case 'creerUtilisateur':
                creerUtilisateur();
            break;
            default:
                echo 'ERROR 404 PAS TROUVER LA PAGE DU POST';
            break;
        }
    }
    else
    {        
        $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__)."/views");
        $twig = new \Twig\Environment($loader, [
            // 'cache' => 'false',
        ]);
        $url = $_SERVER['PHP_SELF'];
        echo $twig->render("showAcceuil.html.twig", ['session' => $_SESSION, 'url' => $url, 'title' => 'marc']);
    }

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

            ]);
            $url = $_SERVER['PHP_SELF'];
            echo $twig -> render('vueAjouterRubrique.html.twig', ['url' => $url]);
        }
    }

    function identifierUtilisateur()
    {
        $url = $_SERVER['PHP_SELF'];
        if(isset($_POST) && $_POST != null)
        {
            $mail = $_POST['mail'];
            $pass = $_POST['pass'];
            $u = new Utilisateur($mail, $pass);
            $u1 = new MySqlUtilisateurDAO;
            $value = $u1 -> identifier($u);
            if(isset($value) && $value != null)
            {
                $url = $_SERVER['PHP_SELF'];
                $_SESSION['name'] = $value[0]->getNOM();
                echo 'Bienvenu ' .$_SESSION['name'].'<br>';
                echo "<a href='".$url."'> Revenir à l'accueil</a>";
            }
            else 
            {
                echo 'Connexion impossible, identifiant inconnu <br>';
                echo "<a href='".$url."'> Revenir à l'accueil</a>";
            }
        }
        else 
        {
            $u = new VueIdentifierUtilisateur();
            $u -> show();
        }
    }

    function creerUtilisateur()
    {
        $url = $_SERVER['PHP_SELF'];
        if(isset($_POST['action']) && $_POST['action'] != null)
        {
            $nom = $_POST['nom'];
            $mail = $_POST['mail'];
            $pass = $_POST['mdp'];
            $u = new Utilisateur($mail,$pass);
            $u -> setNOM($nom);
            $u1 = new MySqlUtilisateurDAO();
            $value = $u1 -> identifier($u);
            if($value != null)
            {
                echo "<p>utilisateur déjà enregistré</p><br><a href='".$url."'>Acceuil</a>";
            }
            else 
            {
                $u1 -> insert($u);
                echo "<p>Vous avez été correctement enregistré</p><br><a href='".$url."'>Acceuil</a>";
            }
        }else
        {
            // $u = new VueCreerUtilisateur();
            // $u -> show();
            $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__)."/views");
            $twig = new \Twig\Environment($loader, [

            ]);
            $url = $_SERVER['PHP_SELF'];
            echo $twig -> render('vueCreerUtilisateur.html.twig', ['url' => $url]);
        }
    }