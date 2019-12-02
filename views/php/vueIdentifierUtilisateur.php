<?php
    class VueIdentifierUtilisateur
    {
        public function show()
        {
            $url = $_SERVER['PHP_SELF'];
            echo "<h2>Connectez-Vous</h2>
                <form action='".$url."' method='POST'>
                    <p><label for='identifiant'>IDENTIFIANT  : </label><input type='text' name='mail' id='name' class='name' placeholder='mail ou identifiant' required></p>
                    <p><label for='pass'>MOT DE PASSE : </label><input type='text' name='pass' id='pass' class='pass' required></p>
                    <input type='hidden' name='action' id='action' class='action' value='identifierUtilisateur'>
                    <button type='submit'>Connecter</button>
                </form>";
        }
    }