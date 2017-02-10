<?php
include "header.php";

if (isset($_POST['submit'])) {
    if (isset($_SESSION['pseudo'])) {
        echo $_SESSION['pseudo'];
        $username = $_SESSION['pseudo'];
        $res = $bdd->prepare("SELECT * FROM mb_users WHERE username = :username");
        $res->execute(array(':username' => $username));
        $user = $res->fetch(PDO::FETCH_OBJ);
    }

    $content = trim($_POST['content']);
    $idArticle = $_POST['idArticle'];
    $idUser = (isset($_SESSION['pseudo'])) ? $user->id_user : -1;
    $res = $bdd->prepare("INSERT INTO mb_comments (content, status, date, fk_id_article, fk_id_user) VALUES (:content, :status, NOW(), :idArticle, :idUser)");
    $res->execute(array(
        ':content' => $content,
        ':status' => 1,
        ':idArticle' => $idArticle,
        ':idUser' => $idUser
    ));

    header('Location: article.php?id='.$idArticle);
} else {
    echo "Erreur";
}
