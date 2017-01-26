<?php include "../header.php"; ?>
<nav>
	<h1>Gestion Articles</h1>
</nav>
<section>
	<div class="section admin">


   <form action="add/article.php" method="POST" style="display: inline-block;">
      <button type="submit" class="btn">Ajouter un article</button>
   </form>
    <form action="archive.php" method="POST">
        <button type="submit" class="btn">Archives</button>
    </form>


      <table width="100%" align="center" cellpadding="0" cellspacing="1" border="1">
         <thead>
            <tr align="center">
                <td width="25%"><strong>Article</strong></td>
                <td width="25%"><strong>Contenu</strong></td>
                <td width="25%"><strong>Mise en ligne</strong></td>
                <td width="25%"><strong>Actions</strong></td>
            </tr>
         </thead>
 
         <tbody>
         <?php
         $req = $bdd->query('select * from mb_article order by id_article');
         while($row=$req->fetch(PDO::FETCH_OBJ)) {?>
         <tr align="center">
             <td><?= $row->title ?></td>
             <td><?= $row->content ?></td>
             <td>

                 <?php
                 if($row->status==-1):
                     ?>
                     <form action="updateStatus.php" method="post" style="display: inline-block">
                         <input type="hidden" name="id_article" value="<?= $row->id_article ?>">
                         <input type="hidden" name="status" value="<?= $row->status ?>">
                         <button type="submit" name ="toto" id="toto" onClick="if (!confirm('Voulez vous mettre en ligne cette article : <?= $row->title ?> ?')) return false;"><h5>Mettre en ligne</h5></button>
                     </form>
                     <?php
                 elseif($row->status==1):
                     ?>
                     <form action="updateStatus.php" method="post" style="display: inline-block">
                         <input type="hidden" name="id_article" value="<?= $row->id_article ?>">
                         <input type="hidden" name="status" value="<?= $row->status ?>">
                         <button type="submit" name ="toto" id="toto" onClick="if (!confirm('Voulez vous supprimer cette article : <?= $row->title ?> ?')) return false;"><h5>Supprimer</h5></button>                     </form>
                     <?php
                 endif;
                 ?>
             </td>
             <td>
                 <form action="edit/article.php" method="POST" style="display: inline-block;">
                     <input type="hidden" name="id_article" value="<?= $c->id_article ?>">
                     <button type="submit" class="btn">Editer</button>
                 </form>

             </td>
         </tr>
             <?php
         }  ?>
         </tbody>
      </table>

   <a class="lien fade" href="../admin"><button type="button" class='btn'>Retour à l'admin</button></a>
</div>



</section>


<?php include "../footer.php"; ?>