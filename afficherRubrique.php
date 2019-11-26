<?php
     require './dao/requirefile.php';
   

    $ban = new MySQLRubriqueDAO();
    $ban -> getAll();