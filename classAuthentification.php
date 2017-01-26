<?php

class Authentification
{

  function __construct()
  {
  }

  public function inscription(){
    if(isset($_POST['ins_pseudo']) && $_POST['ins_pseudo']!=""){
      $bdd = new PDO('mysql:host=localhost;dbname=mini_blog;charset=utf8', 'root', '');
      $statement = $bdd->prepare("SELECT username FROM mb_users WHERE username = :username");
      $statement->execute(array(':username' => $_POST['ins_pseudo'] ));
      $alreadyUsed = $statement->fetchAll();
      if(isset($alreadyUsed[0])){
        echo "Ce pseudo est déjà utilisé par un de nos utilisateurs";
      }else{
        if($_POST['ins_password'] == $_POST['ins_passwordVerification']){
          $passwordencrypted = password_hash($_POST['ins_password'], PASSWORD_DEFAULT);
          $statement = $bdd->prepare("INSERT INTO `mb_users`(`username`, `password`, `admin`) VALUES (:pseudo,:password,:admin)");
          $statement->execute(array(':pseudo' => $_POST['ins_pseudo'] , ':password' => $passwordencrypted, ':admin' => '0'));
          $statement->fetchAll();

          echo"<h1>Compte créé</h1>";
          return 0;
        }
      }
    }
    ?>

    <form class="" action="index.php" method="post">
      <input type="text" name="ins_pseudo" pattern="[A-Za-z0-9]{2-15}" required="true" value="" placeholder="Pseudo">
      <input type="password" pattern="[A-Za-z0-9]{8-*}" name="ins_password" required="true" value="" placeholder="Password">
      <input type="password" pattern="[A-Za-z0-9]{8-*}" name="ins_passwordVerification" required="true" value="" placeholder="Verify password">
      <input type="submit" name="submit" >
    </form>
    <?php

  }

  public function connection(){

    if($_SESSION['connected'] == true){return 0;}
    if(isset($_POST['co_pseudo']) && $_POST['co_pseudo']!=""){
      $bdd = new PDO('mysql:host=localhost;dbname=mini_blog;charset=utf8', 'root', '');
      $statement = $bdd->prepare("SELECT username, password FROM mb_users WHERE username = :username");
      $statement->execute(array(':username' => $_POST['co_pseudo'] ));
      $userSpec = $statement->fetchAll();
      if(password_verify($_POST['co_password'], $userSpec[0]['password'])){
        echo "<h1>C'est la fête</h1>";
        $_SESSION['connected'] = true;
        return 0;
      }
    }

    ?>
    <form class="" action="index.php" method="post">
      <input type="text" name="co_pseudo" pattern="[A-Za-z0-9]{2-15}" required="true" value="" placeholder="Pseudo">
      <input type="password" pattern="[A-Za-z0-9]{8-*}" name="co_password" required="true" value="" placeholder="Password">
      <input type="submit" name="submit" >
    </form>
    <?php
  }
}
