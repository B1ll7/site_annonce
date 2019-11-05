<?php
    require './dao/requirefile.php';
    $ban = new MySqlDao();
    $ban -> insert('rocky', 'j\'ai changé', 'Rocky', 'viensjetenmetune@danslagueule.fr', 'JAckson, RugisLand');
    echo "[la suite après insertion]";
    $ban -> getAll();
