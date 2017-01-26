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
         while($row=$res->fetch(PDO::FETCH_OBJ)) {?>
         <tr align="center">
             <td><?= $row->title ?></td>
             <td><?= $row->content ?></td>
             <td>
                 <?php
                 if($row->status==0):
                     ?>
                     <form action="/<?= SITE_URL ?>admin/article/status" method="post" style="display: inline-block">
                         <input type="hidden" name="id_article" value="<?= $row->id_article ?>">
                         <button type="submit" class="btn" onclick="if (!confirm('Voulez vous mettre en ligne le document <?= $row->name ?>')) return false;">Mettre en ligne</button>
                     </form>
                     <?php
                 elseif($row->status==1):
                     ?>
                     <form action="/<?= SITE_URL ?>admin/article/offline" method="post" style="display: inline-block">
                         <input type="hidden" name="id_article" value="<?= $row->id_article ?>">
                         <button type="submit" class="btn" onclick="if (!confirm('Voulez vous désactiver le document <?= $row->name ?>')) return false;">désactiver</button>
                     </form>
                     <?php
                 endif;
                 ?>
             </td>
             <td>
                 <form action="edit/article.php" method="POST" style="display: inline-block;">
                     <input type="hidden" name="id_article" value="<?= $c->id_article ?>">
                     <button type="submit" class="btn">Editer</button>
                 </form>
                 <form action="delete/article.php" method="POST" style="display: inline-block;">
                     <input type="hidden" name="id_article" value="<?= $c->id_article ?>">
                     <button type="submit" class="btn"  onclick="if (!confirm('Voulez vous supprimer le document <?= $c->name ?>')) return false;">Supprimer</button>
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