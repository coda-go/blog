<?php
/**
 * Created by PhpStorm.
 * User: coda
 * Date: 20.07.17
 * Time: 9:14
 */

require_once 'config.php';

echo $twig->render("addComment.html", array('get' => $_GET['post_id']));

print_r($_GET);

print_r($_POST);


if(isset($_POST['name']) && ($_POST['text']) && ($_POST['post_id']))
{

    $add_comment = add_comment();
    // echo "Данные обновлены!";
    foreach ($_GET as $key => $id)
    {
        print_r($id);
        header('Location: index.php?post_id='.$id);
    }
}