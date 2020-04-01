<?php
    namespace model\Entities;

    use app\Entity;

    final class Sujet extends Entity{

        private $id;
        private $titre;
        private $dateajout;
        private $verrouillage; 
        private $visiteur;

        public function __construct($data){         
            $this->hydrate($data);        
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
            return $this->id;
        }

        protected function setId($id){

            $this->id = $id;

            return $this;
        }

        /**
         * Get the value of titre
         */ 
        public function getTitre()
        {
            return $this->titre;
        }

        /**
         * Set the value of titre
         * 
         * @return  self
         */ 
        public function setTitre($titre)
        {
            $this->titre = $titre;

            return $this;
        }


        /**
         * Get the value of marque
         */ 
        public function getMarque()
        {
                return $this->marque;
        }

        /**
         * Set the value of marque
         *
         * @return  self
         */ 
        public function setMarque($marque)
        {
                $this->marque = $marque;

                return $this;
        }

        /**
         * Get the value of dateajout
         */ 
        public function getDateajout()
        {
                return $this->dateajout;
        }

        /**
         * Set the value of dateajout
         *
         * @return  self
         */ 
        public function setDateajout($dateajout)
        {
                $this->dateajout = $dateajout;

                return $this;
        }

        /**
        * 
         * Get the value of verrouillage
         */ 
        public function getVerrou()
        {
                return $this->verrou;
        }

        /**
         * Set the value of verouillage
         *
         * @return  self
         */ 
        public function setVerrou($verrou)
        {
                $this->verrou = $verrou;

                return $this;
        }


        /**
         * Get the value of visiteur
         */ 
        public function getVisiteur()
        {
                return $this->visiteur;
        }

        /**
         * Set the value of visiteur
         *
         * @return  self
         */ 
        public function setVisiteur($visiteur)
        {
                $this->visiteur = $visiteur;

                return $this;
        }
        
        public function __toString(){

            return $this->titre." - ".$this->visiteur->getVisiteur()." ".$this->dateajout;
        }

    }