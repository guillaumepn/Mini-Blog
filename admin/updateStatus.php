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

    if(($sql)){
        if(strpos($refererUrl,"archive.php")){
            header('Location: index.php');
        }elseif(strpos($refererUrl,"article.php")){
        header('Location: article.php');
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

    if(($sql)){
        if(strpos($refererUrl,"archive.php")){
            header('Location: index.php');
        }elseif(strpos($refererUrl,"comments.php")){
            header('Location: comments.php');
        }
    }
    else {
        header('Location: ../404.php');
    }
}elseif($_POST['id_user']){
    if ($_POST['status']==1) {
        $sql = $bdd->query("UPDATE mb_users SET `status`= -1 WHERE `id_user` = '" . $_POST['id_user'] . "'");
    }elseif ($_POST['status']== '-1'){
        $sql = $bdd->query("UPDATE mb_users SET `status`= 1 WHERE `id_user` = '" . $_POST['id_user'] . "'");
    }
    $refererUrl = $_SERVER['HTTP_REFERER'];

    if(($sql)){
        if(strpos($refererUrl,"archive.php")){
            header('Location: index.php');
        }elseif(strpos($refererUrl,"user.php")){
            header('Location: user.php');
        }
    }
    else {
        header('Location: ../404.php');
    }
}
?>

