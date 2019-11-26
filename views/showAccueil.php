<?php
    class VueAccueil
    {
        public function show()
        {
            echo "<ul>";
            echo "<li><a href='../controllers/main.php?action=afficherRubriques'>afficherRubriques</a></li>
                <li><a href='../controllers/main.php?action=ajouterRubrique'>ajouterRubrique</a></li>";
            echo "</ul>";
        }
    }