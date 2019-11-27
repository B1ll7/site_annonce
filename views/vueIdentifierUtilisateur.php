<?php
    class VueIdentifierUtilisateur
    {
        public function show()
        {
            $url = $_SERVER['PHP_SELF'];
            echo "<form action='".$url."' method='POST'>
                    <p><label for='mail'>mail</label><input type='text' name='mail' id='name' class='name' required></p>
                    <p><label for='pass'>mot de passe</label><input type='text' name='pass' id='pass' class='pass' required></p>
                    <input type='hidden' name='action' id='action' class='action' value='identifierUtilisateur'>
                    <button type='submit'>Connecter</button>
                </form>";
        }
    }