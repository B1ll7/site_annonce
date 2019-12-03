<?php
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
            $u = new Utilisateur();
            $u -> setNOM($nom);
            $u -> setMAIL($mail);
            $u -> setMDP($pass);
            $u1 = new MySqlUtilisateurDAO();
            $value = $u1 -> insert($u);
            if($value != null)
            {
                echo "<p>$nom est déjà enregistré</p><br><a href='$url'>Acceuil</a>";
            }
            else 
            {
                $u1 -> insert($u);
                $_SESSION['name'] = $nom;
                echo "<p> $nom avez été correctement enregistré</p><br><a href='$url'>Acceuil</a>";
            }
        }
        else
        {
            $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__)."/../views");
            $twig = new \Twig\Environment($loader, [
                // 'cache' => false;
            ]);
            $url = $_SERVER['PHP_SELF'];
            echo $twig -> render('vueCreerUtilisateur.html.twig', ['url' => $url]);
        }
    }