<?php 
    class VueListerRubriques
    {
        private $contenu;

        public function setContenu($cont)
        {
            $this -> contenu = $cont;
        }

        public function show()
        {
            $url = $_SERVER['PHP_SELF'];
            foreach($this -> contenu as $element)
            {
                echo $element . "<br>";
            }
            echo "<a href='".$url."'>retour au main</a>";
        }
    }