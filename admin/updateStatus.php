<?php
include "../header.php";

var_dump($_POST);
if ($_POST['status']==1) {
    $sql = $bdd->query("UPDATE mb_article SET `status`= -1 WHERE `id_article` = '" . $_POST['id_article'] . "'");
}elseif ($_POST['status']== '-1'){
    $sql = $bdd->query("UPDATE mb_article SET `status`= 1 WHERE `id_article` = '" . $_POST['id_article'] . "'");
}
if(($sql)){
    header('Location: index.php');
}
else {
    header('Location: ../404.php');
}

?>

