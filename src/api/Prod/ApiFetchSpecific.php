<?php
/**
 * Created by PhpStorm.
 * User: aaagabichou
 * Date: 17-02-22
 * Time: 13:49
 */
//header("Access-Control-Allow-Origin: http://localhost:3000 ");
header('Content-type: application/json');
header("Access-Control-Allow-Origin: http://sickadelicposters.netlify.com");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization, If-Modified-Since, Cache-Control, Pragma");

require_once ('config.php');

$id = $_GET['data'];
$url = "http://gabrielbaril.ca/sickadelic/Prod/ApiFetchSpecific.php?data=".$id;
//$url = "http://gabrielbaril.ca/sickadelic/Dev/ApiFetchSpecific.php?data=".$id;
$strSQL = "SELECT * FROM t_affiche WHERE id_affiche=".$id;

if ($objResultAffiche = $objConnMySQLi->query($strSQL)) {
    while ($objLigneAffiche = $objResultAffiche->fetch_object()) {
            $id = $objLigneAffiche->id_affiche;
            $aut = $objLigneAffiche->auteur;
            $titre = $objLigneAffiche->titre;
            $description = $objLigneAffiche->description;
            $prix = $objLigneAffiche->prix;
            $img = $objLigneAffiche->chm_image;
            $larg = $objLigneAffiche->largeur;
            $haut = $objLigneAffiche->hauteur;
            $cat = $objLigneAffiche->id_categorie;
    }
    $objResultAffiche->free_result();
}
$arr = array("id" => $id, "auteur" => $aut, "name" => $titre, "description" => $description, "price" => $prix, "image" => $img, "url" => $url, "largeur" => $larg, "hauteur" => $haut, "categorie" => $cat);
echo json_encode($arr);
