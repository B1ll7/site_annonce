<?php
    class VueAccueil
    {
        public function show()
        {
            $url = $_SERVER['PHP_SELF'];
            echo "<ul>";
            echo "<li><a href='".$url."?action=afficherRubriques'>afficherRubriques</a></li>
                <li><a href='".$url."?action=ajouterRubrique'>ajouterRubrique</a></li>
                <li><a href='".$url."?action=identifierUtilisateur'>identifierUtilisateur</a></li>
                <li><a href='".$url."?action=creerUtilisateur'>creerUtilisateur</a></li>
                ";
            echo "</ul>";
        }
    }