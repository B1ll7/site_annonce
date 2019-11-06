<?php
    function toUpdateToDeleteRubrique($requete, $value)
    {
        // try 
        // {
        //     $this -> cnx -> beginTransaction();
        //     $res = $this -> cnx -> prepare($requete);
        //     $res -> bindParam(':value', $value, PDO::PARAM_STR);
        //     $rowcount = $res -> execute();
        //     echo "{$rowcount} lignes supprimés. \n";
        //     $this -> cnx -> commit();
        // }catch(\PDOException $e)
        // {
        //     throw new \PDOException("erreur, la rubrique n'a pas pu être supprimer", (int)$e->getCode()."\n", null);
        // }
    }