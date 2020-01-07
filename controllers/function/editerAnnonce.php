<?php
    function editerAnnonce()
    {
        $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__)."/../views");
            $twig = new \Twig\Environment($loader, [
                //'cache' => 'false',
                'debug' => true
            ]);
            // $twig->addExtension(new DebugExtension());
            $twig->addExtension(new \Twig\Extension\DebugExtension());
            $twig->addGlobal('session', $_SESSION);
            $url = $_SERVER['PHP_SELF'];
            
            if($_POST['action'] != null)
            {
               
            }
            else{
               
    
            }
    }