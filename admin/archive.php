<?php include "../header.php"; ?>
<div class="section admin">
    <h2>Archives</h2>

    <table width="100%" align="center" cellpadding="0" cellspacing="1" border="1">
            <thead>
                <tr align="center">
                    <td>Nom</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody> <?php $refererUrl = $_SERVER['HTTP_REFERER'];
            $Exploded_URL = explode("/",$refererUrl);
$urlToCheck = $Exploded_URL[6];//A modifier selon votre URL

if($urlToCheck == 'article.php'){
?> <p> Liste des articles </p>
<?php } elseif ($urlToCheck == 'comments.php'){
?> <p> Liste des commentaires </p><?php
}else{ echo "Error 404";}
?>
            </tbody>
        </table>

    <a class="lien fade" href="index.php"><button type="button" class='btn'>Retour à l'administration</button></a>
</div>
