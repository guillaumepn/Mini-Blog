<?php
include "../header.php";

var_dump($_POST);
if($_POST['id_user']){
    if ($_POST['admin']==1) {
        $sql = $bdd->query("UPDATE mb_users SET `admin`= 0 WHERE `id_user` = '" . $_POST['id_user'] . "'");
    }elseif ($_POST['admin']== '0'){
        $sql = $bdd->query("UPDATE mb_users SET `admin`= 1 WHERE `id_user` = '" . $_POST['id_user'] . "'");
    }

    if(($sql)){
        header('Location: user.php');
    }
    else {
        header('Location: ../404.php');
    }
}
