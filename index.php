<?php
/**
 * Created by PhpStorm.
 * User: coda
 * Date: 20.07.17
 * Time: 0:40
 */
require "config.php";

if(isset($_POST['name']) && ($_POST['text']) && ($_POST['post_id'])) {
    $add_comment = add_comment_post();
    foreach ($_GET as $key => $id) {
        header('Location: index.php?post_id='.$id);
    }
}

if (isset($_GET['post_id'])) {
    $postOne = print_post_one($_GET['post_id']);
    echo $twig->render('viewPost.html', array('postOne' => $postOne));
    $print_comment = print_comment($_GET['post_id']);
    $comments = build_tree_comment($print_comment);
    echo $twig->render('comment.html', array('comments'=>$comments, 'postOne' => $postOne));
    exit();
}else {
    $postAll = print_post_all();
    echo $twig->render('main.html', array('post' => $postAll));

}

