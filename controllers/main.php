<?php
    require realpath(__DIR__.'./../dao/requirefile.php');

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
                $_SESSION['name'] = $mail;
                echo 'Bienvenu ' . $_SESSION['name'].'<br>';
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
        if(isset($_POST['action']) && $_POST['action'] != null)
        {
            $mail = $_POST['mail'];
            $pass = $_POST['mdp'];
            $u = new Utilisateur($mail,$pass);
            $u1 = new MySqlUtilisateurDAO();
            $value = $u1 -> identifier($u);
            if($value != null)
            {
                echo "utilisateur déjà enregistrer";
            }
            else 
            {
                $u1 -> insert($u);
                echo "<p>Vous avez été correctement enregistré</p><br>";
            }
        }else
        {
            $u = new VueCreerUtilisateur();
            $u -> show();
        }
    }