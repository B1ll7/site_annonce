<?php
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
            $id = $_POST['nom'];
            $u = new Utilisateur();
            if (filter_var($id, FILTER_VALIDATE_EMAIL))
            {
                $u -> setMAIL($id);
            }
            else 
            {
                $u -> setNOM($id);
            }
            $pass = $_POST['pass'];
            $u -> setMDP($pass);
            $u1 = new MySqlUtilisateurDAO;
            $value = $u1 -> identifier($u);
            if(isset($value) && $value != null)
            {
                $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__)."/../views");
                $twig = new \Twig\Environment($loader, [
                    //'cache' => 'false',
                ]);
                $_SESSION['name'] = $value[0]->getNOM();
                $_SESSION['droits'] = $value[0] -> getDroits();
                $_SESSION['iduser'] = $value[0] -> getID();

                $name = $_SESSION['name'];
                $droits = $_SESSION['droits'];
                 $userid = $_SESSION['iduser'];
                //  var_dump($userid);
                $err_message = null; 
                echo $twig->render('showAcceuil.html.twig', ['name' => $name, 'url' => $url, 'error' => $err_message,'droits' => $droits, 'id' => $userid]);
            }
            else 
            {
                $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__)."/../views");
                $twig = new \Twig\Environment($loader, [
                    //'cache' => 'false',
                ]);

                $err_message = 'connexion impossible, vérifiez vos identifiants'; 
                echo $twig->render('vueIdentifierUtilisateur.html.twig', ['url' => $url, 'error' => $err_message]);
            }
        }
        else 
        {
            $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__)."/../views");
            $twig = new \Twig\Environment($loader, [
                //'cache' => 'false',
            ]);
            $err_message = null; 
            echo $twig->render('vueIdentifierUtilisateur.html.twig', ['url' => $url, 'error' => $err_message]);
        }
    }