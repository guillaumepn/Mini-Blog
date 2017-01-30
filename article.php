<?php include "header.php";
?>

    <nav>
        <h1>Mini-blog</h1>
    </nav>
    <section>
        <a class="lien fade" href="index.php"><button type="button" class='btn'>Accueil</button></a><br>
        <?php

        $id=$_POST['id'];
        $res = $bdd->query("SELECT * FROM mb_article WHERE id_article='".$id."'");
        $res->execute();
        $result = $res->fetch();
        $id_auteur=$result['fk_id_user'];
        $res1 = $bdd->query("SELECT username FROM mb_users WHERE id_user='".$id_auteur."'");
        $res1->execute();
        $result1 = $res1->fetch();

        ?>
        <H1><?php echo $result['title'];?></H1>
        <strong><?php echo "Posté par ".$result1['username']." le ".$result['date'];?></strong>
        <p><?php echo $result['content'];?></p>

    </section>

<section>
	<h2>Commentaires</h2>
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
				echo "<strong>".$user->username." a dit</strong> <i>(le ".$com->date.")</i>:".$com->content."<br>";
			} else {
				echo "<strong>Anonyme a dit</strong> <i>(le ".$com->date.")</i>:".$com->content."<br>";
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
</section>


<?php include "footer.php"; ?>
