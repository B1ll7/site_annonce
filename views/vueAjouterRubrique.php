<?php
    class VueAjouterRubrique
    {
        public function show()
        {
            echo "<form action='main.php' method='POST'>
                    <p><label for='rubrique'>Rubrique</label><input type='text' name='rubrique' id='rubrique' class='rubrique'/>
                    <input type='hidden' name='action' id='action' class='action' value='ajouterRubrique'/>
                    <button type='submit'>Ajouter</button><button type='button'>Reset</button>
                </form>
                ";
        }
    }
    