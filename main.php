<?php
    require './dao/requirefile.php';
    $ban = new MySQLRubriqueDAO();
    $r = new Rubrique("textile");
    $r -> setID(3);
    //$ban -> insert ($r)
    // echo "[la suite après insertion] \n";
    $ban -> delete($r);
    $ban -> getAll();
