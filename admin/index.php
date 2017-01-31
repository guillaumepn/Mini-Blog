
<?php include "../header.php"; ?>
<nav>
  <h1>Mini-Blog</h1>
</nav>
<div id="page_title">
   <center>
      <h6>Administration</h6>
   </center>
</div>
<a href="../index.php">
                   <button type="submit">Deconnexion</button>
                </a>
<section id="admin_content">
   <div class="align_admin">
          <ul>
             <li class="category">
                <a href="comments.php">
                   <img src='../public/chat.png' alt="">
                   <p>Commentaires</p>
                </a>
             </li>
             <li class="category">
                <a href="article.php">
                   <img src='../public/pages.png' alt="">
                   <p>Articles</p>
                </a>
             </li>
              <li class="category">
                  <a href="user.php">
                      <img src='../public/account.png' alt="">
                      <p>Utilisateurs</p>
                  </a>
              </li>
          </ul>
       </div>
     </section>
    </div>
</div>
<?php include "../footer.php"; ?>
