<?php include "../../header.php";?>

<div class="section admin">
    <h2>Gestion des articles</h2>

    <form method="POST" action="add.php">

        <label for="title">Titre :</label>
        <input type="text" id="title" name="title" placeholder="Entrez le titre de votre document"  required>
<br>
        <label for="content">Description :</label>
        <textarea placeholder="Entrez ici votre description" name="content" id="content" rows=4 cols=50  maxlength="100"  required></textarea>
        <input type="submit" value="Sauvegarder">
    </form>
    <a class="lien fade" href="../article.php"><button type="button" class='btn'>Retour à la gestion des articles</button></a>
</div>

