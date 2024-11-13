<?php 
$conn = mysqli_connect('localhost', 'root', '', 'todos') or die('not connected');

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    
    <section class="vh-100" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-9 col-xl-7">
                    <div class="card rounded-3">
                        <div class="card-body p-4">

                            <h4 class="text-center my-3 pb-3">To Do App</h4>

                            <form class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2"
                                method="post" action="index.back.php">
                                <div class="col-12">
                                    <div data-mdb-input-init class="form-outline">
                                        <input type="text" id="form1" name="todo" class="form-control"
                                            placeholder="Enter a task here" />
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-warning">Add Tasks</button>
                                </div>
                            </form>

                            <table class="table mb-4">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Todo item</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        $fetch_res = mysqli_query($conn, "SELECT * FROM todos");
                                        $no = 1;
                                        while ($frtch_row = mysqli_fetch_assoc($fetch_res)) {
                                        $stat = $frtch_row['status'];
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $no++ ?></th>
                                        <td><?php echo ($stat === 'Completed')? "<s>". $frtch_row['todo'] ."<s/>" : $frtch_row['todo'] ?></td>
                                        <td><?php echo $stat ?></td>
                                        <td>
                                        <a href="jsxcs.php?editId=<?php echo $frtch_row['id'] ?>" type="button" class="btn btn-primary">edit</a>
                                            <button type="button" data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="document.getElementById('delId').value = <?php echo $frtch_row['id'] ?>">Delete</button>
                                            <a type="button" data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn-success ms-1" href="index.back.php?ckId=<?php echo $frtch_row['id'] ?>">Finished</a>
                                            
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    ?>



                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>







    <?php
    if (isset($_GET['msg'])) {
        
    $message = $_GET['msg'];
    $status = $_GET['status'];
    ?>
    <div class="alert alert-<?php echo $status ?> alert-dismissible fade show position-fixed"
        style="top: 10px; right:10px;" role="alert">
        <strong><?php echo ucwords($status); ?>!</strong> <?php echo $message; ?>
        <button type="button" class="btn-close" onclick="location.replace('index.php')"></button>
    </div>
    <?php
    }
    ?>

    <!-- //edit modal -->
   <!-- Button trigger modal -->

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      do you want to edit this todo
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form action="index.back.php" method="post">
                        <input type="hidden" id="editid" name="editid"/>
                        <button type="submit" class="btn btn-info">edit</button>
                    </form>
       
      </div>
    </div>
  </div> -->
</div>


    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Do You Want To Delete This Todo?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="index.back.php" method="post">
                        <input type="hidden" id="delId" name="delId"/>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>