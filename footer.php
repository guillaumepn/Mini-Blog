
<footer>
	<?php
	$refererUrl = $_SERVER['HTTP_REFERER'];

	if (!isset($auth)) $auth = new Authentification();
	// Si on est déjà dans l'admin, on ne veut pas afficher ce lien dans le footer
	if (!strpos($refererUrl, "admin") && $auth->isConnected()) {
		$req = $bdd->prepare("SELECT * FROM mb_users WHERE username = :username");
		$req->execute(array(':username' => $_SESSION['pseudo']));
		$user = $req->fetch(PDO::FETCH_OBJ);

		if ($user->admin == 1) {
			?>
			<a href="./admin/index.php">Administration</a>
			<?php
		}
	}
	 ?>
</footer>
</body>
</html>
