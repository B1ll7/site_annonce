<?php

    class VueCreerUtilisateur
    {
        public function show()
        {
            $url = $_SERVER['PHP_SELF'];
            echo "<h2>Enregistrez-Vous</h2>
            <form action='".$url."' method='POST'>
                <p><label for='nom'>NOM : </label><input type='text' name='nom' id='nom' class='nom'></p>
                <p><label for='mail'>MAIL : </label><input type='text' name='mail' id='name' class='name'></p>
                <p><label for='mdp'>MOT DE PASSE : </label><input type='text' name='mdp' id='mdp' class ='mdp'></p>
                <input type='hidden' name='action' id='action' class='action' value='creerUtilisateur'>
                <button type='submit'>Valider</button>
            </form>
            ";
        }
    }