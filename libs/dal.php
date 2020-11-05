<?php
function connect()
{
    require(dirname(__FILE__) . '/../config.php');
    global $conn;
    $conn = new mysqli($HOST, $USERNAME, $PASSWORD, $DBNAME);
    if ($conn->connect_errno) {
        die('err' . $conn->connect_error);
    }
}

function select($col = '', $para = '')
{
    global $conn;
    if (!empty($para) && !empty($col)) {
        $result = $conn->query("SELECT * FROM `user` WHERE `{$col}`= '{$para}'");
        if ($result->num_rows !== 0) {
            return false;
        } else {
            return true;
        }
    }
}

function query($query = '', $type = '')
{
    connect();
    global $conn;
    $output = [];
    if (!empty($query)) {
        $result = $conn->query($query);
        if ($type !== 'select') {
            return true;
        } else {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $output[] = $row;
                }
            }
        }
    }
    return $output;
}

function insert($tt, $lt, $st, $ci)
{
    connect();
    global $conn;
    $stmt = $conn->prepare("INSERT INTO `articles`(`title`, `long_text`, `short_text`, `category_id`) VALUES (?,?,?,?)");
    $stmt->bind_param('sssi', $tt, $lt, $st, $ci);
    $stmt->execute();
}

function selectA($id)
{
    include_once(dirname(__FILE__) . '/dal.php');
    global $conn;
    connect();
    $stmt = $conn->prepare("SELECT `id` , `title`, `long_text`, `author_id`, `category_id`, `created_at` FROM `articles` WHERE `id`={$id}");
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}
