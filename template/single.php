<?php
    require "../vendor/autoload.php";
   
    // use \App\config\Autoloader;

    // Autoloader::register();

    use \App\src\DAO\ArticleDAO;
    use \App\src\DAO\CommentDAO;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevBlog Fullstack 2020</title>
</head>
<body>
    <div>
        <h1>Devblog Fullstack 2020</h1>
        <h5>Engineered at Talis Business School</h5>
        <p>En construction</p>
    </div>
    <?php
        $a_m = new ArticleDAO();
        $articles = $a_m->getArticle($_GET['id']);
        $a_m=$articles->fetch() 
            ?>
        <div>
            <h2><a href= "single.php?id=<?php $a_m->id ;?>"><?php $a_m->title ;?></a></h2>
            <p><?= $a_m->content ;?></p>
            <p><?= $a_m->author ;?></p>
            <p><?= $a_m->createdAt ;?></p>
        </div>
        <?php
            $articles->closeCursor();
        ?>
        <a href="home.php">Retour à l'accueil</a>
        <div id="comments">
            <h3>Commentaires</h3>
            <?php
                $comment = new CommentDAO();
                $comments = $comment->getCommentsFromArticle($_GET['id']);
                while ($comment = $comments->fetch()) { 
                ?>
                <h4><?= $comment->id_user ?>
                </h4>
                <p><?= $comment->content ?>
                </p>
                <p><?= $comment->createdAt ?>
                </p>
                <?php
                    }
                $comments->closeCursor();
                ?>


        </div>
    </body>
</html>