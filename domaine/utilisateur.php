<?php 
    class Utilisateur
    {
        private $ID;
        private $MDP;
        private $NOM;
        private $PRENOM;
        private $MAIL;
        private $ADRESSE;
        private $DROITS;

        public function __construct()
        {
            $this -> ID = -1;
            $this -> MDP;
            $this -> NOM;
            $this -> PRENOM;
            $this -> MAIL;
            $this -> ADRESSE;
            $this -> DROITS;
        }

        public function __toString()
        {
            return '['.$this -> getID().','.$this -> getMDP().','.$this -> getNOM().','.$this -> getPRENOM().','.$this -> getMAIL().','.$this -> getADRESSE().']';
        }

         /**
         * Getter for ID
         *
         * @return [type]
         */
        public function getID()
        {
            return $this->ID;
        }

        /**
         * Setter for ID
         * @var [type] ID
         *
         * @return 
         */
        public function setID($ID)
        {
            $this->ID = $ID;
        }

        
        /**
         * Getter for MDP
         *
         * @return [type]
         */
        public function getMDP()
        {
            return $this->MDP;
        }

        /**
         * Setter for MDP
         * @var [type] MDP
         *
         * @return self
         */
        public function setMDP($MDP)
        {
            $this->MDP = $MDP;
        }


        /**
         * Getter for NOM
         *
         * @return [type]
         */
        public function getNOM()
        {
            return $this -> NOM;
        }

        /**
         * Setter for NOM
         * @var [type] NOM
         * @return self
         */
        public function setNOM($NOM)
        {
            $this->NOM = $NOM;
        }


        /**
         * Getter for PRENOM
         *
         * @return [type]
         */
        public function getPRENOM()
        {
            return $this->PRENOM;
        }

        /**
         * Setter for PRENOM
         * @var [type] PRENOM
         *
         * @return self
         */
        public function setPRENOM($PRENOM)
        {
            $this->PRENOM = $PRENOM;
            return $this;
        }


        /**
         * Getter for MAIL
         *
         * @return [type]
         */
        public function getMAIL()
        {
            return $this->MAIL;
        }

        /**
         * Setter for MAIL
         * @var [type] MAIL
         *
         * @return self
         */
        public function setMAIL($MAIL)
        {
            $this->MAIL = $MAIL;
            return $this;
        }


        /**
         * Getter for$ADRESSE
         *
         * @return [type]
         */
        public function getADRESSE()
        {
            return $this -> ADRESSE;
        }

        /**
         * Setter for$ADRESSE
         * @var [type]$ADRESSE
         */
        public function setADRESSE($ADRESSE)
        {
            $this -> ADRESSE = $ADRESSE;
        }
        /**
         * Getter for$DROITS
         *
         * @return [type]
         */
        public function getDROITS()
        {
            return $this -> DROITS;
        }

        /**
         * Setter for$DROITS
         * @var [type]$DROITS
         */
        public function setDROITS($DROITS)
        {
            $this -> DROITS = $DROITS;
        }

    }