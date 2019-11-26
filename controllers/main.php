<?php
    require "../dao/requirefile.php";
        
    if(isset($_GET['action']))
    {    
        switch($_GET['action'])
        {
            case "afficherRubriques":
                afficherRubriques();
                break;
            case 'ajouterRubrique':
                ajouterRubrique();
            break;
            default:
                echo "Error";
                break;
        }
    }
    else if (isset($_POST['action']))
    {
        ajouterRubrique();
    }

    else
    {
        $ban = new VueAccueil;
        $ban -> show();
    }

    function afficherRubriques()
    {
        $ru = new MySQLRubriqueDAO();
        $nRu = new VueListerRubriques();
        $tableau = $ru -> getAll();
        $nRu -> setContenu($tableau);
        $nRu -> show();
    }

    function ajouterRubrique()
    {
        if(isset($_POST) && $_POST != null)
        {
            $rubrique = $_POST['rubrique'];
            $ru = new Rubrique($rubrique);
            $r = new MySQLRubriqueDAO;
            $r -> insert($ru);
            afficherRubriques();
        }
        else
        {
            $ru = new VueAjouterRubrique();
            $ru -> show();
        }
    }