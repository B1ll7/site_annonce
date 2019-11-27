<?php
    require "../dao/requirefile.php";
        
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
        if(isset($_POST) && $_POST != null)
        {
            $mail = $_POST['mail'];
            $pass = $_POST['pass'];
            $u = new Utilisateur($mail, $pass);
            $u1 = new MySqlUtilisateurDAO;
            $value = $u1 -> identifier($u);
            var_dump($value);
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