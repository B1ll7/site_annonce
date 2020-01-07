<?php
    
function supprimerRubrique()
{
    $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__)."./views");
    $twig = new \Twig\Environment($loader, [
        // 'cache' => 'false',
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
    $url = $_SERVER['PHP_SELF'];
    $annonceId = $_GET['id'];
    $name = $_SESSION['name'];
    $droits = $_SESSION['droits'];
    $success = null;
    if(isset($_GET['action']))
    {
        $ar = new MySQLRubriqueDAO();
        $ru = new Rubrique();
        $ru -> setID($annonceId);
        $ar -> delete($ru);
        $tableau = $ar -> getAll();
        $success = 'Suppression de la rubrique a bien été effectuée ! ';
        echo $twig->render('vueListerRubrique.html.twig', ['rubs' => $tableau, 'url' => $url, 'name' => $name, 'droits' => $droits,'success' => $success]);
    }
}