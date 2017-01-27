<?php
include "../header.php";

var_dump($_POST);
if ($_POST['status']==1) {
    $sql = $bdd->query("UPDATE mb_article SET `status`= -1 WHERE `id_article` = '" . $_POST['id_article'] . "'");
}elseif ($_POST['status']== '-1'){
    $sql = $bdd->query("UPDATE mb_article SET `status`= 1 WHERE `id_article` = '" . $_POST['id_article'] . "'");
}
$refererUrl = $_SERVER['HTTP_REFERER'];
$Exploded_URL = explode("/",$refererUrl);
$urlToCheck = $Exploded_URL[6];

if(($sql)){
    if($urlToCheck=="archive.php"){
        header('Location: index.php');
    }else{
    header('Location: '.$urlToCheck);
    }
}
else {
    header('Location: ../404.php');
}

?>

