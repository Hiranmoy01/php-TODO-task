
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Curd WEB</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      width: 100%;
      height: 100vh;
      justify-content: center;
      align-items: center;
    }

    .container {
      padding: 25px;
      color: white;
      background: linear-gradient(rgb(5, 42, 255), rgb(25, 25, 185), rgb(26, 79, 194), rgb(40, 116, 204), rgb(0, 225, 255));
      display: flex;
      justify-content: space-between;
      align-items: center;
      text-align: center;
    }

    .left-side {
      width: 20%;
    }

    .right-side {
      color: black;
      width: 80%;
      height: 60vh;
      border: 1px solid black;
      display: flex;
      flex-direction: column;
      /* justify-content: space-between; */
      background-color: rgb(229, 242, 252);
     border-radius: 14% 0% 0% 14% / 50% 10% 10% 53%  ;
    }

    .bottom {
      display: flex;
      justify-content: center;
      align-items: center;
      /* justify-content: space-between; */
    }
    input{
      /* width: 100%; */
      margin: 10px 10px;
      border-radius: 5px;
      padding: 5px 20px;
      outline: none;
      border: 1px solid rgb(0, 0, 0);
    }
  </style>
</head>

<body>
  <h1 class="text-center mb-4 mt-2 display-3 fw-bold">WEB JOB APPLY HERE</h1>
  <div class="container">
    <div class="left-side">
      <div>
        <h2>WELCOME</h2>
      </div>
      <div>
        <p>please fill all the detaiil carefully; this form can chnage your life</p>
      </div>
      <a href="display.php"><button class="btn bg-light">Check Form</button></a>
      
    </div>
    <div class="right-side">
      <div class="top">
        
        <h2 style="margin-top: 70px; font-family: sans-serif; font-weight: bold;">Apply For Web Developer Post</h2>
      </div>
      <div class="bottom" style="margin: 20px;">
        <div class="left">
          <div>
            <form action="" method="post">

            <?php

include 'connection.php';

$ids = $_GET['id'];
$showquery = "SELECT * FROM registration where id=$ids";

$showdata = mysqli_query($con, $showquery);

$arrdata = mysqli_fetch_assoc($showdata);

if (isset($_POST['submit'])) {

    $idUpdate = $_GET['id'];

  $name = $_POST['name'];
  $mobile = $_POST['mobile'];
  $refer = $_POST['refer'];
  $degree = $_POST['degree'];
  $email = $_POST['email'];
  $jobpost = $_POST['jobpost'];


$query = "UPDATE `registration` SET id=$idUpdate, Name='$name', Degree='$degree', Mobile='$mobile', Email='$email', Refer='$refer', JobPost='$jobpost' where id=$idUpdate";

$result = mysqli_query($con, $query);

if ($result) {
  ?>
  <script>
    alert('data updated succefully');
    
  </script>
  <?php
}else{
?>
<script>
    alert('data updated not successfull');

</script>
<?php
}

}

?>
            <input type="text" name="name" value="<?php echo $arrdata['Name'] ?>" placeholder="enter your name">

          </div>
          <div>
            <input type="text" name="mobile" value="<?php echo $arrdata['Mobile'] ?>" placeholder="enter your mobile">

          </div>
          <div>
            <input type="text" name="refer" value="<?php echo $arrdata['Refer'] ?>" placeholder="any reference">

          </div>

        </div>
        <div class="right">
          <div>

            <input type="text" name="degree" value="<?php echo $arrdata['Degree'] ?>" placeholder="enter your degree">
          </div>
          <div>
            <input type="text" name="email" value="<?php echo $arrdata['Email'] ?>" placeholder="enter your email">

          </div>
          <div>
            <input type="text" name="jobpost" value="<?php echo $arrdata['JobPost'] ?>" placeholder="enter your web post">

          </div>

        </div>

        </div>
        <div>
          <input type="submit" name="submit" value="Update"
          style="width: 130px; height: 35px; border-radius: 30px; border: 1px solid black; background-color: rgb(7, 135, 255); color: white; font-weight: 500; font-size: 1.2rem; padding: 0px 10px; margin-left: 380px;">
          <!-- <button style="width: 130px; height: 35px; border-radius: 30px; border: 1px solid black; background-color: rgb(7, 135, 255); color: white; font-weight: 500; font-size: 1.2rem; padding: 0px 10px; margin-left: 380px;">Register</button>   -->
        </div>
      </form>
      
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>

