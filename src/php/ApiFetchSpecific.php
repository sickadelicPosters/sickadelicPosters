<?php
/**
 * Created by PhpStorm.
 * User: aaagabichou
 * Date: 17-02-22
 * Time: 13:49
 */
//header("Access-Control-Allow-Origin: http://localhost:3000 ");
header("Access-Control-Allow-Origin: http://decorator-arches-17418.netlify.com");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization, If-Modified-Since, Cache-Control, Pragma");

require_once ('config.php');

$id = $_GET['data'];
$url = "http://gabrielbaril.ca/sickadelic/ApiFetchSpecific.php?data=".$id.".json";
$strSQL = "SELECT * FROM t_affiche WHERE id_affiche=".$id;

if ($objResultAffiche = $objConnMySQLi->query($strSQL)) {
    while ($objLigneAffiche = $objResultAffiche->fetch_object()) {
            $id = $objLigneAffiche->id_affiche;
            $titre = $objLigneAffiche->titre;
            $description = $objLigneAffiche->description;
            $prix = $objLigneAffiche->prix;
            $img = $objLigneAffiche->chm_image;
    }
    $objResultAffiche->free_result();
}
$arr = array("id" => $id, "name" => $titre, "description" => $description, "price" => $prix, "image" => $img, "url" => $url);
echo json_encode($arr);
