<?php
    class Annonce
    {
        private $ID_EST_DEPOSEE;
        private $ID_APPARTIENT; 
        private $ENTETE;
        private $CORPS;
        private $DATE_DEPOT;
        private $DATE_VALIDITE;

        public function __construct($ID_APPARTIENT, $ENTETE, $CORPS)
        {
            $this -> ID_EST_DEPOSEE;
            $this -> ID_APPARTIENt; 
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
        
        /**
         * Get the value of ID_EST_DEPOSEE
         */ 
        public function getID_EST_DEPOSEE()
        {
                return $this->ID_EST_DEPOSEE;
        }

        /**
         * Set the value of ID_EST_DEPOSEE
         *
         * @return  self
         */ 
        public function setID_EST_DEPOSEE($ID_EST_DEPOSEE)
        {
                $this->ID_EST_DEPOSEE = $ID_EST_DEPOSEE;

                return $this;
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
        public function setID_APPARTIENt($ID_APPARTIENT)
        {
                $this->ID_APPARTIENt = $ID_APPARTIENT;

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