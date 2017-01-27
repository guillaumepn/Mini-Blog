
<footer>
	<?php
	$url = $_SERVER['REQUEST_URI'];
	$urlTab = explode("/", $url);
	// Si on est déjà dans l'admin, on ne veut pas afficher ce lien dans le footer
	if (isset($urlTab[2]) && $urlTab[2] != "admin") {
		if (!isset($auth)) $auth = new Authentification();
		if ($auth->isConnected()) {
			?>
			<a href="admin/index.php">Administration</a>
			<?php
		}
	}
	 ?>
</footer>
</body>
</html>
