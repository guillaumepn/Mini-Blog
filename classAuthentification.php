<?php

class Authentification
{

  function __construct()
  {
  }

  function inscription(){
    if(isset($_POST['pseudo']) && $_POST['pseudo']!=""){
      $bdd = new PDO('mysql:host=localhost;dbname=mini_blog;charset=utf8', 'root', 'root');
      $statement = $bdd->prepare("SELECT username FROM mb_users WHERE username = :username");
      $statement->execute(array(':username' => $_POST['pseudo'] ));
      $alreadyUsed = $statement->fetchAll();
      if(isset($alreadyUsed[0])){
        echo "Ce pseudo est déjà utilisé par un de nos utilisateurs";
      }else{
        if($_POST['password'] == $_POST['passwordVerification']){
          $passwordencrypted = password_hash($_POST['password'], PASSWORD_DEFAULT));
          $statement = $bdd->prepare("INSERT INTO `mb_users`(`username`, `password`, `admin`) VALUES (:pseudo,:password,:admin)");
          $statement->execute(array(':pseudo' => $_POST['pseudo'] , ':password' => $passwordencrypted, ':admin' => '0'));
          $statement->fetchAll();

          echo"<h1>Compte créé</h1>";
          return 0;
        }
      }
    }
    ?>

    <form class="" action="index.php" method="post">
      <input type="text" name="pseudo" pattern="[A-Za-z0-9]{2-15}" required="true" value="" placeholder="Pseudo">
      <input type="password" pattern="[A-Za-z0-9]{8-*}" name="password" required="true" value="" placeholder="Password">
      <input type="password" pattern="[A-Za-z0-9]{8-*}" name="passwordVerification" required="true" value="" placeholder="Verify password">
      <input type="submit" name="submit" >
    </form>
    <?php

  }
}
