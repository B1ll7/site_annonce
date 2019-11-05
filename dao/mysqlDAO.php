<?php
    class MySqlDao
    {
        private $cnx;

        public function __construct()
        {
            $this -> cnx = ConnexionBdd::getConnexion();
        }

        public function insert($mdp, $nom, $prenom, $mail, $adresse)
        {
            $value = array($mdp, $nom, $prenom, $mail, $adresse);
            $sql = 'CALL insert_into_user(?,?,?,?,?);';
            try {
                $this -> cnx -> beginTransaction();
                $res = $this -> cnx -> prepare($sql);
                $res -> execute($value);
                $this -> cnx -> commit();
            } catch (PDPExecption $e) {
                echo($e->getMessage()."\n");
                echo((int)$e->getCode()."\n");
                $this->cnx->rollback();
            }
        }
        public function getAll()
        {
            $sql = 'CALL print_users();';
            try {
                $stmt = $this -> cnx -> query($sql);
                $stmt -> setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Utilisateur');
                $data = $stmt->fetchAll();
                foreach ($data as $j) {
                    echo($j."\n");
                }
            } catch (\PDPExecption $e) {
                echo($e->getMessage()."\n");
                echo((int)$e->getCode()."\n");
            }
        }
    }
