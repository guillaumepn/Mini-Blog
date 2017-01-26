<?php include "header.php"; ?>
<nav>
	<h1>Mini-blog</h1>
</nav>
<section>
	<a class="lien fade" href="admin/index.php"><button type="button" class='btn'>Admin</button></a><br>
	<?php
while($row=$res->fetch(PDO::FETCH_OBJ)) {
		echo '<form action="article.php" method="POST">';
		echo "<input type='hidden' name='id' value='$row->id_article'";
        echo '<label>'.$row->title."</label>";
        echo "<input type='submit' value='Afficher'";
        echo "<br></form>";
    }
    ?>
</section>


<?php include "footer.php"; ?>