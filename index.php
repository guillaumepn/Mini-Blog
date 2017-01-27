
<?php include "header.php";
require_once("classAuthentification.php")
?>
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

        $req = $bdd->query('select * from mb_article order by id_article desc limit 10')->fetchAll();
        if (count($req) == 0) {
            echo "Aucun article.";
        } else {
            foreach ($req as $article) {
                echo "<p><a href=\"article.php?id=".$article['id_article']."\">".$article['title']."</a></p>";
            }
        }
     ?>
</section>


<?php include "footer.php"; ?>
