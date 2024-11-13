<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>hello</h1>

  <?php
  

$conn = mysqli_connect('localhost', 'root', '', 'todos') or die('not connected');
$ids = $_GET['editId'];
print_r ($ids);

$showquery = "SELECT * FROM todos where id=$ids";

$showdata = mysqli_query($conn, $showquery);

$arrdata = mysqli_fetch_assoc($showdata);
// print_r ($arrdata);


if (isset($_POST['submit'])) {

  $idUpdate = $_GET['editId'];
  $todo = $_POST['todo'];

$query = "UPDATE `todos` SET  todo='$todo' where id=$idUpdate";
 
$result = mysqli_query($conn, $query);

if ($result) {
  header("location: index.php");
}
else{
  echo "data update not successfull";
}
  

}


?>

<form action="" method="post">
<table border="2">
  <tr>
    <td>
      <input type="text" name="todo" value="<?php echo $arrdata['todo']?>">
    </td>
    <td>
       <input type="submit" name="submit" value="edit">
    </td>
  </tr>
</table>



</form>
</body>
</html>