<?php
include "../header.php";

var_dump($_POST);
if($_POST['id_article']){
    if ($_POST['status']==1) {
        $sql = $bdd->query("UPDATE mb_article SET `status`= -1 WHERE `id_article` = '" . $_POST['id_article'] . "'");
    }elseif ($_POST['status']== '-1'){
        $sql = $bdd->query("UPDATE mb_article SET `status`= 1 WHERE `id_article` = '" . $_POST['id_article'] . "'");
    }
    $refererUrl = $_SERVER['HTTP_REFERER'];
    // $Exploded_URL = explode("/",$refererUrl);
    // $urlToCheck = $Exploded_URL[5];

    if(($sql)){
        if(strpos($refererUrl, "archive.php")){
            header('Location: index.php');
        }else{
        header('Location: archive.php');
        }
    }
    else {
        header('Location: ../404.php');
    }
}elseif($_POST['id_comment']){
    if ($_POST['status']==1) {
        $sql = $bdd->query("UPDATE mb_comments SET `status`= -1 WHERE `id_comment` = '" . $_POST['id_comment'] . "'");
    }elseif ($_POST['status']== '-1'){
        $sql = $bdd->query("UPDATE mb_comments SET `status`= 1 WHERE `id_comment` = '" . $_POST['id_comment'] . "'");
    }
    $refererUrl = $_SERVER['HTTP_REFERER'];
    // $Exploded_URL = explode("/",$refererUrl);
    // $urlToCheck = $Exploded_URL[6];

    if(($sql)){
        if(strpos($refererUrl, "archive.php")){
            header('Location: index.php');
        }else{
            header('Location: archive.php');
        }
    }
    else {
        header('Location: ../404.php');
    }
}
?>
