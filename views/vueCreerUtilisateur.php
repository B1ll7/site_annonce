<?php

    class VueCreerUtilisateur
    {
        public function show()
        {
            $url = $_SERVER['PHP_SELF'];
            echo "<h2>Enregistrez-Vous</h2>
            <form action='".$url."' method='POST'>
                <p><label for='mail'>Mail : </label><input type='text' name='mail' id='name' class='name'></p>
                <p><label for='mdp'>Mot de passe : </label><input type='text' name='mdp' id='mdp' class ='mdp'></p>
                <input type='hidden' name='action' id='action' class='action' value='creerUtilisateur'>
                <button type='submit'>Valider</button>
            </form>
            ";
        }
    }