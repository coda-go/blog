<?php
/**
 * Created by PhpStorm.
 * User: coda
 * Date: 20.07.17
 * Time: 0:50
 */

function print_post_all()
{
    global $db;
    $sql = $db->query('SELECT post_id, post_title, post_discription, post_user, post_date, post_upd_date FROM post');
    while($row = $sql->fetchObject()){
        $post[] = $row;
    }
    return $post;
}

/**
 * @param $id
 * @return array
 */
function print_post_one($id)
{
    global $db;
    $sql = $db->query("SELECT * FROM post WHERE post_id = '$id'");
    while($row = $sql->fetchObject()){
        $post[] = $row;
    }
    return $post;
}

function print_comment($id)
{
    global $db;
    $sql = $db->query("SELECT * FROM comment WHERE post_id = '$id'");
    $_comments = array();
    while($row =  $sql->fetch(PDO::FETCH_ASSOC))
    {
        $_comments[$row['id_comment']] = $row;
    }
    return $_comments;
}

function build_tree_comment($data)
{
    $tree = array();
    foreach($data as $id => &$row)
    {
        if(empty($row['comment_parent_id']))
        {
            $tree[$id] = &$row;
        }
        else
        {
            $data[$row['comment_parent_id']]['childs'][$id] = &$row;
        }
    }
    return $tree;
}

function add_comment() // функция для добавления сообщений
{
    global $db;
    try {
        if (isset($_POST['name'], $_POST['text'], $_POST['post_id'])) { // если входший POST не NULL, то выполни и подготовь запрос из БД
            $stmt = $db->prepare('INSERT INTO `comment` SET post_id = :c_post_id, name = :c_user_name, text = :c_text, date = NOW()');
            $stmt->bindParam(':c_user_name', $_POST['name']); // привязывает параметр запроса к переменной POST
            $stmt->bindParam(':c_text', $_POST['text']);
            $stmt->bindParam(':c_post_id', $_POST['post_id']);
            $stmt->execute();
            return $stmt;
        }
    } catch (PDOException $e) {
        print "Ошибка добавления в БД!: </br>" . $e->getMessage() . "<br/>";
        die();
    }
}


/*INSERT INTO `comment` (`id_comment`, `post_id`, `comment_parent_id`, `text`, `name`, `date`) VALUES
 (NULL, '4', NULL, 'этот коммент к id поста 4', 'user1', CURRENT_TIMESTAMP)

INSERT INTO `comment` (`id_comment`, `post_id`, `comment_parent_id`, `text`, `name`, `date`) VALUES (NULL, '1', '2', 'коммент к комменту коммета поста 1', 'Василий', CURRENT_TIMESTAMP)*/

