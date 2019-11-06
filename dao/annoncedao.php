<?php
    class AnnonceDAO implements AnnonceDAO
    {
        private $cnx;

        public function __construct()
        {
            $this -> cnx = ConnexionBdd::getConnexion();
        }

        public function insert(\Annonce $a)
        {
            
        }

        public function delete(\Annonce $a)
        {
            
        }

        public function update(\Annonce $ru)
        {

        }

        public function getByRubrique(\Rubrique $ru)
        {
            $requete = 'CALL get_rubrique';
        }
        
        public function getByUtilisateur(\Utilisateur $u)
        {
            
        }

        public function deletePerimees()
        {
            
        }
    }