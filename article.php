<?php include "header.php";
?>


    <article>
        <a class="lien fade" href="index.php"><button type="button" class='btn'>Accueil</button></a><br>
        <?php
            $id = $_GET['id'];
            $res = $bdd->prepare("SELECT * FROM mb_article WHERE id_article = :id");
            $res->execute(array(':id' => $id));
            $result = $res->fetch(PDO::FETCH_OBJ);
            if (!$result) {
                header("Location: index.php");
            }
            $id_auteur=$result->fk_id_user;
            $res1 = $bdd->query("SELECT username FROM mb_users WHERE id_user='".$id_auteur."'");
            $res1->execute();
            $result1 = $res1->fetch(PDO::FETCH_OBJ);
        ?>
        <H1><?php echo $result->title;?></H1>
        <strong><?php echo "Posté par ".$result1->username." le ".$result->date;?></strong>
        <p><?php echo $result->content;?></p>
    </article>


<article>
	<h2 id="article-coms">Commentaires</h2>
	<!-- Listing des commentaires -->
	<?php
	// Récupérer les commentaires
	$res = $bdd->prepare("SELECT * FROM mb_comments WHERE status = 1 AND fk_id_article = :id");
	$res->execute(array(':id' => $id));
	$coms = $res->fetchAll(PDO::FETCH_OBJ);
	if (!$coms) {
		echo "Aucun commentaire.";
	} else {
		foreach ($coms as $com) {
			// Récupérer les infos de l'auteur du commentaire
			// -1 : user non connecté => on affiche "Anonyme"
			if ($com->fk_id_user != -1) {
				$res = $bdd->prepare("SELECT * FROM mb_users WHERE id_user = :id_user");
				$res->execute(array(':id_user' => $com->fk_id_user));
				$user = $res->fetch(PDO::FETCH_OBJ);
				// Afficher le commentaire
				echo "<p><strong>".$user->username." a dit</strong> <i>(le ".$com->date.")</i>:".$com->content."</p>";
			} else {
				echo "<p><strong>Anonyme a dit</strong> <i>(le ".$com->date.")</i>:".$com->content."</p>";
			}
		}
	}
	 ?>
	<!-- Formulaire du commentaire -->
	<h3>Poster un commentaire</h3>
	<form class="" action="comment.php" method="post">
		<textarea name="content" rows="8" cols="80"></textarea>
		<input type="hidden" name="idArticle" value="<?php echo $id; ?>">
		<input type="submit" name="submit" value="Envoyer">
	</form>
</article>

<?php include "footer.php"; ?>
