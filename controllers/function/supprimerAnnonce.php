<?php
    function supprimerAnnonce()
    {
        $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__)."/views");
        $twig = new \Twig\Environment($loader, [
            // 'cache' => 'false',
        ]);
        $url = $_SERVER['PHP_SELF'];
        $annonceId = $_GET['id'];
        $name = $_SESSION['name'];
        $droits = $_SESSION['droits'];
        $success = null;
        if(isset($_POST['action']))
        {
            $ar = new MySqlAnnonceDAO();
            $a = new Annonce();
            $a -> setID($annonceId);
            $ar -> delete($a);
            echo $twig -> render("showAcceuil.html.twig", ['name' => $name, 'success' => $success, 'url' => $url, 'droits' => $droits ]);
        }
        else 
        {
            echo $twig -> render("vueSupprimerAnnonce.html.twig", ['name' => $name, 'id' => $annonceId, 'url' => $url]);
        }
        
    }