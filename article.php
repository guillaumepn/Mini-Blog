<?php include "header.php";
?>
<nav>
	<h1>Mini-blog</h1>
</nav>
<section>
	<a class="lien fade" href="index.php"><button type="button" class='btn'>Accueil</button></a><br>
	<?php
    $refererUrl = $_SERVER['REQUEST_URI'];
    $Exploded_URL = explode("/",$refererUrl);
    $urlToCheck = explode("=",$Exploded_URL[3]);

	$id=$urlToCheck[1];
	$res = $bdd->prepare("SELECT * FROM mb_article WHERE id_article='".$id."'");
    $res->execute();
    $result = $res->fetch(PDO::FETCH_OBJ);

 ?>
	 <H1><?php echo $result->title;?></H1>
	 <H6><?php echo $result->date;?></H6>
	 <p><?php echo $result->content;?></p>
</section>


<?php include "footer.php"; ?>