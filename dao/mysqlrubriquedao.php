<?php
    class MySQLRubriqueDAO
    {
        private $cnx;

        public function __construct()
        {
            $this -> cnx = ConnexionBdd::getConnexion();
        }
        /**
         * function permettant l'insertion de la rubrique r dans la table des rubriques
         *
         * @param Rubrique $r objet rentré par l'utilisateur
         * @return void
         */
        public function insert(Rubrique $r)
        {
            $value = $r -> getLibelle();
            $sql = 'CALL insert_into_Rubrique(:value);';
            try {
                $this -> cnx -> beginTransaction();
                $res = $this -> cnx -> prepare($sql);
                $res -> bindParam(':value', $value, PDO::PARAM_STR);
                $res -> execute();
                $this -> cnx -> commit();
            } catch (\PDOException $e) {
                throw new \PDOException("la rubrique n'a pas pu être rentrée", (int)$e->getCode()."\n", null);
                $this->cnx->rollback();
            }
        }
        public function delete(Rubrique $r)
        {
            $value = $r -> getId();
            $sql = "CALL deleteRubrique(:value);";
            try 
            {
                $this -> cnx -> beginTransaction();
                $res = $this -> cnx -> prepare($sql);
                $res -> bindParam(':value', $value, PDO::PARAM_STR);
                $rowcount = $res -> execute();
                $this -> cnx -> commit();
                return $rowcount;
            }catch(\PDOException $e)
            {
                throw new \PDOException("erreur, la rubrique n'a pas pu être supprimer", (int)$e->getCode()."\n", null);
                $this->cnx->rollback();
                
            }
        }
        public function update(Rubrique $r)
        {
            $value = [$r -> getId(), $r-> getLibelle()];
            $sql = "CALL updateRubrique(:ID,:LIBELLE);";
            //toUpdateToDeleteRubrique($value, $sql);
            try 
            {
                $this -> cnx -> beginTransaction();
                $res = $this -> cnx -> prepare($sql);
                $res -> bindParam(':ID', $value[0], PDO::PARAM_STR);
                $res -> bindParam(':LIBELLE', $value[1], PDO::PARAM_STR);
                $rowcount = $res -> execute();
                echo "{$rowcount} lignes modifiés. \n";
                $this -> cnx -> commit();
            }catch(\PDOException $e)
            {
                throw new \PDOException("erreur, la rubrique n'a pas pu être supprimer", (int)$e->getCode()."\n", null);
                $this->cnx->rollback();
            }
        }
        public function getAll()
        {
            $requete = 'CALL print_Rubrique();';
            try {
                $stmt = $this -> cnx -> query($requete);
                $stmt -> setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Rubrique');
                $data = $stmt->fetchAll();
                return $data;
            } catch (\PDOException $e) {
                throw new \PDOException("Nous n'avons pas pu recuperer la liste des rubriques", (int)$e->getCode()."\n", null);
                $this->cnx->rollback();
            }

        }
    }