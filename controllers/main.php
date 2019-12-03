<?php
    require realpath(__DIR__.'./../dao/requirefile.php'); 
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
            case 'creerUtilisateur':
                creerUtilisateur();
            break;
            case 'logout':
                session_destroy();
            break;
            default:
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
        $_SESSION['name'] = null;
        $name = $_SESSION['name'];
        $err_message = null;
        echo $twig->render("showAcceuil.html.twig", ['name' => $name, 'url' => $url, 'error' => $err_message]);
    }

    /**
     * Affche le template risquer rubrique
     *
     * @return void
     */
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

            ]);
            $url = $_SERVER['PHP_SELF'];
            echo $twig -> render('vueAjouterRubrique.html.twig', ['url' => $url]);
        }
    }

    /**
     * Affiche le template d'identifier si la requete par formulaire n'a pas encore été faite sinon lance la requete sql et en fonction enregistre le nom dans le session_names
     *
     * @return void
     */
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
                $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__)."/views");
                $twig = new \Twig\Environment($loader, [
                    //'cache' => 'false',
                ]);
                $_SESSION['name'] = $value[0]->getNOM();
                $name = $_SESSION['name'];
                $err_message = null; 
                echo $twig->render('showAcceuil.html.twig', ['name' => $name, 'url' => $url, 'error' => $err_message]);
            }
            else 
            {
                $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__)."/views");
                $twig = new \Twig\Environment($loader, [
                    //'cache' => 'false',
                ]);

                $err_message = 'connexion impossible, vérifiez vos identifiants'; 
                echo $twig->render('vueIdentifierUtilisateur.html.twig', ['url' => $url, 'error' => $err_message]);
            }
        }
        else 
        {
            $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__)."/views");
            $twig = new \Twig\Environment($loader, [
                //'cache' => 'false',
            ]);
            $err_message = null; 
            echo $twig->render('vueIdentifierUtilisateur.html.twig', ['url' => $url, 'error' => $err_message]);
        }
    }

    /**
     * Affiche la page de créer utilisateur si la requete par formulaire n'a pas encore été faite créer un utilisateur en fonction des données et l'enregistre dans la bdd
     *
     * @return void
     */
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