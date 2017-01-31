
<?php include "header.php";
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
				$apercu = strip_tags($article->content);
				if (strlen($apercu) > 140) {
					$apercu = substr($apercu, 0, 140);
				}
				// Auteur de l'article
				$req = $bdd->prepare("SELECT * FROM mb_users WHERE id_user = :idUser");
				$req->execute(array(':idUser' => $article->fk_id_user));
				$author = $req->fetch(PDO::FETCH_OBJ);
				// Nombre de commentaires
				$req = $bdd->prepare("SELECT count(*) AS nb FROM mb_comments WHERE fk_id_article = :idArticle");
				$req->execute(array(':idArticle' => $article->id_article));
				$coms = $req->fetch(PDO::FETCH_OBJ);
                echo "<p><a href=\"article.php?id=".$article->id_article."\">".$article->title."</a>, écrit par ".$author->username." le ".$article->date."
				 <a href=\"article.php?id=".$article->id_article."#article-coms\" ><i class=\"fa fa-comments-o\" aria-hidden=\"true\"></i> ".$coms->nb."</a><br>".$apercu."... <a href=\"article.php?id=".$article->id_article."\">Lire la suite</a></p>";
            }
        }
     ?>


<?php include "footer.php"; ?>
