<?php
    class Annonce
    {
        private $ID;
        private $ID_EST_DEPOSEE_CONSULTEE;
        private $ID_APPARTIENT; 
        private $ENTETE;
        private $CORPS;
        private $DATE_DEPOT;
        private $DATE_VALIDITE;

        public function __construct()
        { 
            $this -> ID = -1;
            $this -> ID_EST_DEPOSEE_CONSULTEE;
            $this -> ID_APPARTIENT; 
            $this -> ENTETE;
            $this -> CORPS;
            $this -> DATE_DEPOT = date('l j M Y');
            $this -> DATE_VALIDITE;
        }

        public function __toString()
        {
            return '[' . $this -> getID_APPARTIENT() . ', ' . $this -> getID_APPARTIENT() . ',' . $this -> getENTETE() . ',' 
            . $this -> getCORPS() . ',' . $this -> getDATE_DEPOT() . ',' . $this -> getDATE_VALIDITE() .  ']';
        }
        
        public function getID()
        {
                return $this -> ID; 
        }

        /**
         * Get the value of ID_EST_DEPOSEE_CONSULTEE
         */ 
        public function getID_EST_DEPOSEE_CONSULTE()
        {
                return $this->ID_EST_DEPOSEE_CONSULTEE;
        }

        /**
         * Set the value of ID_EST_DEPOSEE_CONSULTEE
         *
         * @return  self
         */ 
        public function setID_EST_DEPOSEE_CONSULTE($ID_EST_DEPOSEE_CONSULTEE)
        {
                $this->ID_EST_DEPOSEE_CONSULTEE = $ID_EST_DEPOSEE_CONSULTEE;

                return $this->ID_EST_DEPOSEE_CONSULTEE;
        }

        /**
         * Get the value of ID_APPARTIENT
         */ 
        public function getID_APPARTIENT()
        {
                return $this->ID_APPARTIENT;
        }

        /**
         * Set the value of ID_APPARTIENT
         *
         * @return  self
         */ 
        public function setID_APPARTIENT($ID_APPARTIENT)
        {
                $this->ID_APPARTIENT = $ID_APPARTIENT;

                return $this;
        }

        /**
         * Get the value of ENTETE
         */ 
        public function getENTETE()
        {
                return $this->ENTETE;
        }

        /**
         * Set the value of ENTETE
         *
         * @return  self
         */ 
        public function setENTETE($ENTETE)
        {
                $this->ENTETE = $ENTETE;

                return $this;
        }

        /**
         * Get the value of CORPS
         */ 
        public function getCORPS()
        {
                return $this->CORPS;
        }

        public function setID($id)
        {
                $this -> ID = $id;
        }
        /**
         * Set the value of CORPS
         *
         * @return  self
         */ 
        public function setCORPS($CORPS)
        {
                $this->CORPS = $CORPS;

                return $this;
        }

        /**
         * Get the value of DATE_DEPOT
         */ 
        public function getDATE_DEPOT()
        {
                return $this->DATE_DEPOT;
        }

        /**
         * Set the value of DATE_DEPOT
         *
         * @return  self
         */ 
        public function setDATE_DEPOT($DATE_DEPOT)
        {
                $this->DATE_DEPOT = $DATE_DEPOT;

                return $this;
        }

        /**
         * Get the value of DATE_VALIDITE
         */ 
        public function getDATE_VALIDITE()
        {
                return $this->DATE_VALIDITE;
        }

        /**
         * Set the value of DATE_VALIDITE
         *
         * @return  self
         */ 
        public function setDATE_VALIDITE($DATE_VALIDITE)
        {
                $this->DATE_VALIDITE = $DATE_VALIDITE;

                return $this;
        }
    }