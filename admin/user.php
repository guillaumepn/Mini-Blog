<?php include "../header.php"; ?>
<nav>
    <h1>Gestion Commentaires</h1>
</nav>

<form action="archive.php" method="POST">
    <button type="submit" class="btn">Archives</button>
</form>
<table width="100%" align="center" cellpadding="0" cellspacing="1" border="1">
    <thead>
    <tr align="center">
        <td width="25%"><strong>Utilisateur</strong></td>
        <td width="25%"><strong>Mise en ligne</strong></td>
    </tr>
    </thead>

    <tbody>
    <?php
    $req = $bdd->query('select * from mb_users order by id_user');
    while($row=$req->fetch(PDO::FETCH_OBJ)) {
        if($row->status==1){?>
            <tr align="center">
                <td><?= $row->username ?></td>
                <td>


                            <form action="updateStatus.php" method="post" style="display: inline-block">
                                <input type="hidden" name="id_user" value="<?= $row->id_user ?>">
                                <input type="hidden" name="status" value="<?= $row->status ?>">
                                <button type="submit" name="toto" id="toto" onClick="if (!confirm('Voulez vous supprimer cet utilisateur?')) return false;">
                                    <h5>Supprimer</h5></button>
                            </form>

                        </td>
            </tr>
                    <?php
                }
            }

    ?>
    </tbody>
</table>

<a class="lien fade" href="../admin"><button type="button" class='btn'>Retour à l'admin</button></a>