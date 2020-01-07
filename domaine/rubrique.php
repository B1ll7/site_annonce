<?php 
    class Rubrique implements JsonSerializable
    {
        /**
         * @var int $id
         */
        private $ID;
        /**

         * @var string $libelle 
         */
        private $LIBELLE;
        /**
         * constructeur de la classe Rubrique
         *
         * @param [type] $libelle unique permettant de donné un nom à la rubrique
         */
        public function __construct($LIBELLE='')
        {
            $this -> ID = -1;
            $this -> LIBELLE = $LIBELLE;
        }
        /**
         * function toString de la classe permettant d'afficher l'objet sous forme de string
         *
         * @return string
         */
        public function __toString()
        {
            return '[' . $this -> getId() . ', ' . $this -> getLibelle() . ']';
        }
        public function setId($ID)
        {
            $this -> ID = $ID;
        }
        // setters
        public function setLibelle($LIBELLE)
        {
            $this -> LIBELLE = $LIBELLE;
        }
        // getters
        public function getId()
        {
            return $this -> ID;
        }
        public function getLibelle()
        {
            return $this -> LIBELLE;
        }

        public function jsonSerialize()
        {
            return[
                'rubrique' => [
                    'ID' => $this -> ID,
                    'libelle' => $this -> LIBELLE
                ]
                ];
        }
    }