<?php
    /**
     * affiche le template d'ajout d'annocne si aucun post n'a été fait, sinon ça execute la requete et renvoie la liste des annocnes
     *
     * @return void
     */
    function ajouterAnnonce()
    {
        if(isset($_POST) && $_POST != null)
        {
            afficherAnnonce();
        }
        else
        {
            $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__)."/views");
            $twig = new \Twig\Environment($loader, [
                // 'cache' => false
            ]);
            $url = $_SERVER['PHP_SELF'];
            $name = $_SESSION['name'];
            echo $twig -> render('vueAjouterAnnonce.html.twig', ['url' => $url, 'name', $name]);
        }
    }