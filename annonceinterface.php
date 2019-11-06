<?php
    // interface AnnonceDAO
    // {
    //     insert(Annonce $a) :  Annonce -> retourne l'Annonce insérée (avec son id)
    //     delete(Annonce $a) : int -> retourne le row count 
    //     update(Annonce $a) : int -> retourne le row count 
    //     getBy(Rubrique $ru) : tableau d'Annonce 
    //     getBy(Utilisateur $u) : tableau d'annonce
    //     deletePerimees() : int -> retourne le row count 
    // }

    interface AnnonceDAO 
    {
        public function insert(Annonce $a);

        public function delete(Annonce $a);

        public function update(Annonce $ru);

        public function getByRubrique(Rubrique $ru);

        public function getByUtilisateur(Utilisateur $u);

        public function deletePerimees();
    }

    // interface RubriqueDAO
    // {
    //     insert(Rubrique $r) : Rubrique -> retourne la rubrique insérée (avec son id)
    //     delete(Rubrique $r) : int ->  retourne le rowcount
    //     update(Rubrique $r) : int -> retourne le rowcount
    //     getAll() : tableau de Rubrique
    // }

    interface RubriqueDAO 
    {
        public function insert(Rubrique $r);

        public function delete(delete $r);

        public function update(Update $r);

        public function getAll();
    }

    // interface UtilisateurDao 
    // {
    //     insert(Utilisateur $u) : Utilisateur -> retourne l'utilisateur insérée 
    //     identifier(Utilisateur $u) : Utilisteur -> retourne l'utilisateur identifié (avec son id);
    // }

    interface UtilisateurDAO 
    {
        public function insert(Utilisateur $u);

        public function identifier(Utilisateur $u);
    }