
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

            foreach ($req as $article) {

                    echo '<form action="article.php" method="POST">';
                    echo "<input type='hidden' name='id' value=".$article['id_article']."";
                    echo "<a><button type='submit'>".$article['title']."</button></a></a>";
                    echo "<br></form>";
                //echo "<p><a href=\"article.php?id=".$article['id_article']."\">".$article['title']."</a></p>";

            }
        }
     ?>
</section>


<?php include "footer.php"; ?>
