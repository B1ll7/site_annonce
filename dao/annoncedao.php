<?php
    require_once realpath(__DIR__.'/../annonceinterface.php');
    class MySqlAnnonceDAO implements AnnonceDAO
    {
        private $cnx;

        public function __construct()
        {
            $this -> cnx = ConnexionBdd::getConnexion();
        }

        public function insert(\Annonce $a)
        {
            $value = array($a -> getID_EST_DEPOSEE_CONSULTE(), $a -> getID_APPARTIENT(), $a -> getENTETE(), $a -> getCORPS(), $a -> getDATE_DEPOT(), $a -> getDATE_VALIDITE());
            $requete = 'CALL insert_into_annonce(?,?,?,?,?,?);';
            try {
                $this -> cnx -> beginTransaction();
                $res = $this -> cnx -> prepare($requete);
                $res -> execute($value);
                $id = $this-> cnx -> lastInsertId();
                $this -> cnx -> commit();
                return new Utilisateur($id, $a->getENTETE());
            } catch (\PDOException $e) {
                throw new \PDOException("impossible d'ajouter cet utilisateur", $e->getCode()."\n", null);
                $this->cnx->rollback();
            }
        }

        public function delete(\Annonce $a)
        {
            $requete = "CALL deleteAnnonce(:value);";
            $value = $a -> getID();
            try 
            {
                $this -> cnx -> beginTransaction();
                $stmt = $this -> cnx -> prepare($requete);
                $stmt -> bindParam(':value', $value, PDO::PARAM_STR);
                $rowcount = $stmt -> execute();
                echo "{$rowcount} lignes supprimés. \n";
                $this -> cnx -> commit();
            }catch(\PDOException $e)
            {
                throw new \PDOException("l'annonce n'a pas pu estre supprimée", $e->getCode()."\n", null);
                $this->cnx->rollback();
            }
        }

        public function update(\Annonce $ru)
        {
            $value = array($ru -> getID, $ru -> getID_EST_DEPOSEE_CONSULTE(), $ru -> getID_APPARTIENT(), $ru -> getENTETE(), $ru -> getCORPS(), $ru -> getDATE_DEPOT(), $ru -> getDATE_VALIDITE());
            $requete = 'CALL udpadaAnnonce(?,?,?,?,?,?,?);';
            try {
                $this -> cnx -> beginTransaction();
                $res = $this -> cnx -> prepare($requete);
                $res -> execute($value);
                $id = $this-> cnx -> lastInsertId();
                $this -> cnx -> commit();
                // return new Utilisateur($id, $a->getENTETE());
            } catch (\PDOException $e) {
                throw new \PDOException("la mise a jour n'a pas pu être executée", $e->getCode()."\n", null);
                $this->cnx->rollback();
            }
        }

        public function getByRubrique(\Rubrique $ru)
        {      
            $value = $ru -> getId();
            try {
                $requete = 'CALL get_by_rubrique(:value)';
                $this -> cnx -> beginTransaction();
                $stmt = $this -> cnx -> prepare($requete);
                $stmt -> bindParam(':value', $value, PDO::PARAM_STR);
                $stmt -> execute();
                $stmt -> setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Annonce', [null,null,null]);
                $data = $stmt->fetchAll();
                return $data;
            } catch (\PDOException $e) {
                throw new \PDOException("nous n'avons pas pu recuperer les annonces en fonction de l'utilisateur", $e->getCode()."\n", null);
                $this->cnx->rollback();
            }
        }
        
        public function getByUtilisateur(\Utilisateur $u)
        {
            $requete = 'CALL get_by_utilisateur(:value)';
            $value = $u -> getID();
            try {
                $this -> cnx -> beginTransaction();
                $stmt = $this -> cnx -> prepare($requete);
                $stmt -> bindParam(':value', $value, PDO::PARAM_STR);
                $stmt -> execute();
                $stmt -> setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Annonce', [null,null,null]);
                $data = $stmt->fetchAll();
                return $data;
            } catch (\PDOException $e) {
                echo($e->getMessage()."\n");
                echo((int)$e->getCode()."\n");
                $this->cnx->rollback();
            }

        }

        public function deletePerimees()
        {
            $requete = 'CALL deletePerimees()';
            try {
                $this -> cnx -> beginTransaction();
                $res = $this -> cnx -> prepare($requete);
                $rowcount = $res -> execute();
                echo "{$rowcount} lignes supprimées";
                $this -> cnx -> commit();
            } catch (\PDOException $e) {
                throw new \PDOException("impossible de supprimer les annonces périmées", $e->getCode()."\n", null);
                $this->cnx->rollback();
            }
        }
    }