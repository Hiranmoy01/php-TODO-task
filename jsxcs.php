<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <h1>EDIT PAGE</h1>
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
  $msg = "Task Edit Completed";
  $status = "success";
}
else{
  echo "data update not successfull";
}
  

}


?>
      </div>
      <section class="vh-100" style="background-color: #eee;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-9 col-xl-7">
              <div class="card rounded-3">
                <div class="card-body p-4">
      
                  <h4 class="text-center my-3 pb-3">To Do App</h4>
      
                  <form action="" method="post" class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2">
                    <div class="col-12">
                      <div data-mdb-input-init class="form-outline">
                        <input type="text" id="form1" class="form-control" name="todo" value="<?php echo $arrdata['todo']?>">
                      </div>
                    </div>
      
                    <div class="col-12">
                      <!-- <button type="submit" data-mdb-buttonS-init data-mdb-ripple-init class="btn btn-primary">Edit</button> -->
                      <input type="submit" name="submit" value="Edit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary">

                    </div>
                  </form>
      
      
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>


