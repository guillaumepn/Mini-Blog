
<?php include "header.php"; ?>
<nav>
	<h1>Mini-blog</h1>
</nav>
<section>

	<?php
		$auth = new Authentification();
		$auth->inscription();
		$auth->connection();
	 ?>

	<h2>Liste des articles</h2>
    <?php
		// Articles
        $req = $bdd->query("SELECT * FROM mb_article WHERE status = 1 ORDER BY id_article DESC");
		$articles = $req->fetchAll(PDO::FETCH_OBJ);
        if (!$articles) {
            echo "Aucun article.";
        } else {

            foreach ($articles as $article) {

				$res = $bdd->prepare("SELECT * FROM mb_users WHERE id_user = :id_user");
				$res->execute(array(':id_user' => $article->fk_id_user));
				$user = $res->fetch(PDO::FETCH_OBJ);

				// Lien : titre de l'article
                echo '<form action="article.php" method="POST">';
                echo "<input type='hidden' name='id' value=".$article->id_article.">";
                echo "<button type='submit'>".$article->title."</button> posté par ".$user->username." le ".$article->date;
                echo "</form>";

				$res = $bdd->prepare("SELECT count(*) AS nb FROM mb_comments WHERE fk_id_article = :idArticle");
				$res->execute(array(':idArticle' => $article->id_article));
				$coms = $res->fetch(PDO::FETCH_OBJ);

				// Lien : nombre de commentaires
				echo '<form action="article.php#article-coms" method="POST">';
                echo "<input type='hidden' name='id' value=".$article->id_article.">";
                echo "<button type='submit'>".$coms->nb." commentaires</button>";
                echo "</form>";


                //echo "<p><a href=\"article.php?id=".$article['id_article']."\">".$article['title']."</a></p>";

            }
        }
     ?>
</section>


<?php include "footer.php"; ?>
