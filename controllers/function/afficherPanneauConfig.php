<?php
    function afficherPanneauDeConfig()
    {
        $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__)."/views");
        $twig = new \Twig\Environment($loader, [
            //'cache' => 'false',
            'debug' => true
        ]);
    
        $twig->addExtension(new \Twig\Extension\DebugExtension());
        $twig->addGlobal('session', $_SESSION);
        $function = new Twig\TwigFunction('returnRoot', function ($filepath){
            $path = getcwd();
            $neo = explode('annonce',$path);
            $returnRoot = count(explode('\\',$neo[1]));
            $returnDot = '';
            for ($x=0;$x<$returnRoot-1;$x++){
                $returnDot .= '../';
            }
            return $returnDot.$filepath;
        });
        $twig->addFunction($function);
        $url = $_SERVER['PHP_SELF'];
    
        $name = null;
        $droits = null;
        if(isset($_SESSION['name']))
        {
            $name = $_SESSION['name'];
        };
        if(isset($_SESSION['droits']))
        {
            $droits = $_SESSION['droits'];
        }
        echo $twig->render('showacceuil.html.twig', ['url' => $url, 'name' => $name, 'droits' => $droits]);
    }