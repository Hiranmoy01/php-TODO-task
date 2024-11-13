
<?php
$conn = mysqli_connect('localhost', 'root', '', 'todos') or die('not connected');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['todo'])) {
        # insert todo
        $todo = $_POST['todo'];
        $todo = trim($todo);
        $todo = htmlspecialchars($todo);
        echo strlen($todo);
        if (strlen($todo) === 0) {
            $msg = "Enter Some Value";
            $status = "warning";
            header("location: index.php?msg=$msg&status=$status");
        } else {

            $insert_sql = "INSERT INTO todos(todo) VALUES ('$todo')";
            $res = mysqli_query($conn, $insert_sql);
            if ($res) {
                $msg = "Todo Added";
                $status = "success";
                header("location: index.php?msg=$msg&status=$status");
            }
        }
    } elseif (isset($_POST['delId'])) {
        $dId = $_POST['delId'];
        $delete_res = mysqli_query($conn, "DELETE FROM todos WHERE id = $dId");
        if ($delete_res) {
            $msg = "Todo Deleted";
            $status = "success";
            header("location: index.php?msg=$msg&status=$status");
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['ckId'])){
    $ckId = $_GET['ckId'];
    $chek_upd_res = mysqli_query($conn, "UPDATE todos SET status= 'Completed' WHERE id= $ckId");
    if ($chek_upd_res) {
        $msg = "Task Completed";
        $status = "success";
        header("location: index.php?msg=$msg&status=$status");
    }
}

