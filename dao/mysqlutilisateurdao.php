<?php  
    class MySqlUtilisateur
    {
        private $cnx;

        public function __construct()
        {
            $this -> cnx = ConnexionBdd::getConnexion();
        }

        // public function insert(Utilisateur $u)
        // {
        //     $value = [$u -> getMDP(), $u -> getNOM(), $u -> getPRENOM(), $u -> getMAIL(), $u -> getADRESSE()];
        //     $requete = 'CALL insert_into_User(:value);';
        //     try {
        //         $this -> cnx -> beginTransaction();
        //         $res = $this -> cnx -> prepare($requete);
        //         $res -> bindParam(':value', $value, PDO::PARAM_STR);
        //         $res -> execute();
        //         $this -> cnx -> commit();
        //     } catch (\PDOException $e) {
        //         echo "la rubrique n'a pas pu être rentrée \n";
        //         //throw new \PDOException("la rubrique n'a pas pu être rentrée \n", (int)$e->getCode()."\n", null);
        //         echo($e->getMessage()."\n");
        //         echo((int)$e->getCode()."\n");
        //         $this->cnx->rollback();
        //     }
        // }
        public function insert(Utilisateur $u)
        {
            $var = sha1($u->getMDP());
            $value = array($var, $u -> getNOM(), $u -> getPRENOM(), $u -> getMAIL(), $u -> getADRESSE());
            $requete = 'CALL insert_into_user(?,?,?,?,?);';
            try {
                $this -> cnx -> beginTransaction();
                $res = $this -> cnx -> prepare($requete);
                $res -> execute($value);
                $id = $this-> cnx -> lastInsertId();
                $this -> cnx -> commit();
                return new Utilisateur($id, $u->getNOM());
            } catch (PDPExecption $e) {
                echo($e->getMessage()."\n");
                echo((int)$e->getCode()."\n");
                $this->cnx->rollback();
            }
        }
        
        public function identifier(Utilisateur $u)
        {
            $var = sha1($u -> getMDP());
            $value = array($var, $u -> getNOM());
            $requete = 'CALL identifiedUser(?,?);';
            try
            {
                $this -> cnx -> beginTransaction();
                $res = $this -> cnx -> prepare($requete);
                $res -> execute($value);
                $id = $this-> cnx -> lastInsertId();
                echo "vous avez été bien enregistré";
                $this -> cnx -> commit();
                return new Utilisateur($id, $u->getNOM());
            }
            catch(\PDOException $e)
            {
                echo "Erreur: connexion impossible vérifier l'identifiant ou le mot de passe enregistrer \n";
                echo ($e -> getMessage() . "\n");
                echo((int)$e -> getMessage()."\n");
                $this -> cnx -> rollBack();
            }
        }
    }