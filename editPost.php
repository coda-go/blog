<?php
/**
 * Created by PhpStorm.
 * User: coda
 * Date: 21.07.17
 * Time: 1:48
 */

require_once "config.php";

if(isset($_POST['post_id']) && ($_POST['title']) && ($_POST['text']))
{

    $edit_select_post = edit_select_post($_POST['post_id']);
    echo "Данные обновлены!";
    header('Location: index.php');
}

if(isset($_GET['post_id']))
{
    $p_one_post = print_post_one($_GET['post_id']);
    echo $twig->render('editPost.html', array('p_one_post'=>$p_one_post));
}