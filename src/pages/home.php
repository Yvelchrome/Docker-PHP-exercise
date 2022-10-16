<?php
include '../php/data.php';
require '../php/post_publication/get_post.php';
include '../html_partials/head.php';
?>

<style>
    <?php
    include '../styles/style.css';
    ?>
</style>

<body class="home">

    <div class="container">
        <form method="POST" action="../php/post_publication/post_home.php" class="flex">
            <label>
                <textarea id="textarea" minlength="1" maxlength="280" name="publication-content" class="container__text" placeholder="Write a publication ..." required></textarea>
            </label>
            <input type="submit" class="container__button" value="Send">
        </form>
    </div>
    <div class="account">
        <span class="account--name">Logged in as <a href="javascript:void(0)"><?= $username ?></a></span>
        <?php if ($admin) {
            echo '<span class="account--admin">You\'re a admin</span>';
        } else {
            echo '<span class="account--admin">You\'re not a admin</span>';
        } ?>
        <a class="account--button" href="../php/connection/disconnect.php">Disconnect</a>
    </div>

    <?php foreach ($publications as $publication) {
        $req = $pdo->prepare(query: "SELECT username FROM `user` WHERE `user_id` = :id");
        $req->execute(array(
            ":id" => $publication['userId'],
        ));
        $name = $req->fetch();
    ?>
        <div class="publication">
            <?php
            $req = $pdo->prepare(query: "SELECT publi_id FROM `publication` WHERE `userId` = :user_id");
            $req->execute(array(
                ":user_id" => $user_id,
            ));
            $rights = $req->fetchAll();
            if ($admin) {
                echo '
                <div class="publication--icon">
                    <form method="POST" action="../php/post_publication/edit_post.php">
                        <input name="edit" type="hidden" value="' . $publication['publi_id'] . '">
                        <input class="publication--icon--edit" type="submit" value="">
                        <label class="publication--content">
                            <textarea id="textarea" class="publication--content--edit" name="content" minlength="1" maxlength="280">' . $publication["content"] . '</textarea>
                        </label>
                    </form>
                    <form method="POST" action="../php/post_publication/delete_post.php">
                        <input name="delete" type="hidden" value="' . $publication['publi_id'] . '">
                        <input class="publication--icon--delete" type="submit" value="">
                    </form>
                </div>
                ';
            } else {
                foreach ($rights as $right) {
                    if ($right["publi_id"] == $publication['publi_id']) {
                        echo ' 
                        <div class="publication--icon">
                            <form method="POST" action="../php/post_publication/edit_post.php">
                                <input name="edit" type="hidden" value="' . $publication['publi_id'] . '">
                                <input class="publication--icon--edit" type="submit" value="">
                                <label class="publication--content">
                                    <textarea id="textarea" class="publication--content--edit" name="content" minlength="1" maxlength="280">' . $publication["content"] . '</textarea>
                                </label>
                                <input class="publication--submit" type="submit" value="">
                            </form>
                            <form method="POST" action="../php/post_publication/delete_post.php">
                                <input name="delete" type="hidden" value="' . $publication['publi_id'] . '">
                                <input class="publication--icon--delete" type="submit" value="">
                            </form>
                        </div> 
                        ';
                    }
                }
            }
            ?>

            <div class="publication--user">
                <a href="javascript:void(0)" class="publication--user--name"><?= ucfirst($name['username']) ?></a>
                <span class="publication--user--date"><?= $publication['creation_date'] ?></span>
            </div>

            <div>
                <p class="publication--text"><?= $publication["content"] ?></p>
            </div>
        </div>
    <?php } ?>
    <script src="../scripts/textareaAutoSize.js"></script>
</body>