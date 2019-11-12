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
            $value = array($a -> getID_EST_DEPOSEE(), $a -> getID_APPARTIENT(), $a -> getENTETE(), $a -> getCORPS(), $a -> getDATE_DEPOT(), $a -> getDATE_VALIDITE());
            $requete = 'CALL insert_into_annonce(?,?,?,?,?,?);';
            try {
                $this -> cnx -> beginTransaction();
                $res = $this -> cnx -> prepare($requete);
                $res -> execute($value);
                $id = $this-> cnx -> lastInsertId();
                $this -> cnx -> commit();
                return new Utilisateur($id, $a->getENTETE());
            } catch (PDPExecption $e) {
                echo($e->getMessage()."\n");
                echo((int)$e->getCode()."\n");
                $this->cnx->rollback();
            }
        }

        public function delete(\Annonce $a)
        {
            $sql = "CALL deleteAnnonce(:value);";
            $value = Annonce::getID();
            try 
            {
                $this -> cnx -> beginTransaction();
                $res = $this -> cnx -> prepare($sql);
                $res -> bindParam(':value', $value, PDO::PARAM_STR);
                $rowcount = $res -> execute();
                echo "{$rowcount} lignes supprimés. \n";
                $this -> cnx -> commit();
            }catch(\PDOException $e)
            {
                throw new \PDOException("erreur, la rubrique n'a pas pu être supprimer", (int)$e->getCode()."\n", null);
            }
        }

        public function update(\Annonce $ru)
        {
            $value = array($ru -> getID, $ru -> getID_EST_DEPOSEE(), $ru -> getID_APPARTIENT(), $ru -> getENTETE(), $ru -> getCORPS(), $ru -> getDATE_DEPOT(), $ru -> getDATE_VALIDITE());
            $requete = 'CALL udpadaAnnonce(?,?,?,?,?,?,?);';
            try {
                $this -> cnx -> beginTransaction();
                $res = $this -> cnx -> prepare($requete);
                $res -> execute($value);
                $id = $this-> cnx -> lastInsertId();
                $this -> cnx -> commit();
                return new Utilisateur($id, $a->getENTETE());
            } catch (PDPExecption $e) {
                echo($e->getMessage()."\n");
                echo((int)$e->getCode()."\n");
                $this->cnx->rollback();
            }
        }

        public function getByRubrique(\Rubrique $ru)
        {
            $requete = 'CALL get_by_rubrique(:value)';
            $value = $ru -> getId();
            try {
                $this -> cnx -> beginTransaction();
                $res = $this -> cnx -> prepare($requete);
                $res -> bindParam(':value', $value, PDO::PARAM_STR);
                $res -> execute();
                $this -> cnx -> commit();
            } catch (\PDPException $e) {
                echo($e->getMessage()."\n");
                echo((int)$e->getCode()."\n");
                $this->cnx->rollback();
            }
        }
        
        public function getByUtilisateur(\Utilisateur $u)
        {
            $requete = 'CALL get_by_utilisateur(:value)';
            $value = $u -> getID();
            try {
                $this -> cnx -> beginTransaction();
                $res = $this -> cnx -> prepare($requete);
                $res -> bindParam(':value', $value, PDO::PARAM_STR);
                $res -> execute();
                $this -> cnx -> commit();
            } catch (\PDPException $e) {
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
            } catch (\PDPException $e) {
                echo($e->getMessage()."\n");
                echo((int)$e->getCode()."\n");
                $this->cnx->rollback();
            }
        }
    }