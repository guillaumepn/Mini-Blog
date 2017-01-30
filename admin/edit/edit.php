<?php include "../../header.php";?><?php

$title= $_POST['title'];
$description= $_POST['description'];
$id_user= 1;
$status = 1;
$date= (new DateTime())->format('Y-m-d');
if(isset($title) && isset($description)) {
    $req = $bdd->query("UPDATE mb_article SET `status`= -1 WHERE `id_article` = '" . $_POST['id_article'] . "'");
}
?>