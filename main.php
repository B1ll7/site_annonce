<?php
    require './dao/requirefile.php';

    //$ban = new MySqlDao();
    $ban = new MySQLRubriqueDAO();
    //$ban = new MySqlUtilisateur();
    //$r = new Rubrique("Paix");
    //$r = new Utilisateur('damas','roger');

    //echo $ban;

    //$r -> setID(1);
    //$ban -> insert($r);
    //$ban -> identifier($r);
    //$ban -> delete($r);
    //$ban -> update($r);
    $ban -> getAll();
