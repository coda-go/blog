<?php
/**
 * Created by PhpStorm.
 * User: coda
 * Date: 20.07.17
 * Time: 9:14
 */
require_once 'config.php';

if (!empty($_GET['post_id']) && ($_GET['comment_id'])){
    echo $twig->render("addComment.html", array('post' => $_GET['post_id'], 'comment' => $_GET['comment_id']));
}

if(isset($_POST['name']) && ($_POST['text']) && ($_POST['post_id']) && ($_POST['comment_parent_id']))
{
    $add_comment = add_parent_comment();
    foreach ($_GET as $key => $id) {
        print_r($id);
        header('Location: index.php?post_id=' . $id);
    }
}