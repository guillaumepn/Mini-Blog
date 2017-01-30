
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

        $req = $bdd->query('select * from mb_article where status = 1 order by id_article desc limit 10')->fetchAll();
        if (count($req) == 0) {
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
