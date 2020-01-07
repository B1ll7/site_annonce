<?php
    /**
     * Affche le template risquer rubrique
     *
     * @return void
     */
    function afficherRubriques()
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/../../views');
        $twig = new \Twig\Environment($loader, [
            //'cache' => 'false',
        ]);
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
        $name = null;
        $droits = null;
        if(isset($_SESSION['name']))
        {
            $name = $_SESSION['name'];
        }
        if(isset($_SESSION['droits']))
        {
            $droits = $_SESSION['droits'];
        }
        $ru = new MySQLRubriqueDAO();
        $tableau = $ru -> getAll();
        $url = $_SERVER['PHP_SELF'];
        echo $twig->render('vueListerRubrique.html.twig', ['rubs' => $tableau, 'url' => $url, 'name' => $name, 'droits' => $droits]);
    }