<?php
    require realpath(__DIR__.'./../dao/requirefile.php');

    require_once '../vendor/autoload.php';
    $loader = new \Twig\Loader\FilesystemLoader(__DIR__.'./../views');
    $twig = new \Twig\Environment($loader, [
        //'cache' => '/path/to/compilation_cache',
    ]);

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
                echo 'ERRO 404 PAS TROUVER LA PAGE DU POST';
            break;
        }
    }
    else
    {
        $ban = new VueAccueil;
        $ban -> show();
    }

    function afficherRubriques()
    {
        $ru = new MySQLRubriqueDAO();
        $nRu = new VueListerRubriques();
        $tableau = $ru -> getAll();
        $nRu -> setContenu($tableau);
        $nRu -> show();
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
            $ru = new VueAjouterRubrique();
            $ru -> show();
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
            $u = new VueCreerUtilisateur();
            $u -> show();
        }
    }