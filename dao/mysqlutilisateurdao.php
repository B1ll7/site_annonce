<?php  
    class MySqlUtilisateurDAO
    {
        private $cnx;

        public function __construct()
        {
            $this -> cnx = ConnexionBdd::getConnexion();
        }

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
            $value = array($var, $u -> getMAIL());
            $requete = 'CALL identifiedUser(?,?);';
            try
            {
                $this -> cnx -> beginTransaction();
                $res = $this -> cnx -> prepare($requete);
                $res->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Utilisateur', [null,null]);
                $res -> execute($value);
                $data = $res -> fetchAll();
                $this -> cnx -> commit();
                if ($data != false) {
                    return $data;
                }else 
                {
                    return null;
                }
            }
            catch(\PDOException $e)
            {
                echo ($e -> getMessage() . "\n");
                echo((int)$e -> getMessage()."\n");
                $this -> cnx -> rollBack();
            }
        }
    }