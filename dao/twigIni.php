<?php
    class twigIni 
    {
        private $rendu;
        private static $instance = null;

        public function __construct()
        {
            $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__)."/../views");
            $twig = new \Twig\Environment($loader, [
                //'cache' => 'false',
                'debug' => true
            ]);
            // $twig->addExtension(new DebugExtension());
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
        }

        public static function getIni()
        {
            if (!self::$instance) {
                self::$instance = new twigIni();
            }
            return self::$rendu;
        }
    }