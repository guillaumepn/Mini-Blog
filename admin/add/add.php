<p>
    <?php include "../../header.php";?><?php

    $title= $_POST['title'];
    $description= $_POST['description'];
    $id_user= 1;
    $status = 1;
    $date= (new DateTime())->format('Y-m-d');
    if(isset($title) && isset($description)) {
        $req = $bdd->query("INSERT INTO `mb_article`(`id_article`, `title`, `content`, `status`, `date`, `fk_id_user`) VALUES ('','" . $title . "','" . $description . "','" . $status . "','" . $date . "','" . $id_user . "')");
        if($req){
            header('Location: ../article.php');
        }
    }
    ?></p>

