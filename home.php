<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['username'] ) && isset($_SESSION['id']))  {     ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HOME</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 15px sans-serif; text-align: center; }
    </style>
</head>
<body>
        <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION['role']); ?></b>. Welcome to TUT eLearning&Teaching.</h1>
        <?php if($_SESSION['role'] == 'admin') {?>
           <div class="card" style="width: 18rem;">
              <img src="img/admin-default.png"
               class="card-img-top" 
               alt="admin image">
              <div class="card-body text-align">
                <h5 class="card-title">
                  <?=$_SESSION['name'] ?>
                </h5>
                <a href="logout.php  " class="btn btn-danger ml-3">LOGOUT</a><b>
                  <a href="iindex.php  " class="btn btn-danger ml-3"> CREATE LESSON</a>
                </b>
                
              </div>
            </div>
          <div
            class="p-3">
            <?php include 'php/members.php';
              if (mysqli_num_rows($res) > 0) {?>

            <h1 class ="display-4 fs-1">Students</h1>
            <table class="table"
                       style="width: 75rem;">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">User name</th>
                  <th scope="col">Role</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                   $i =1;
                   while ($row = mysqli_fetch_assoc($res)) { ?>
                  <tr>
                    <th scope="row"><?=$i?></th>
                  <td><?=$row['name']?></td>
                  <td><?=$row['username']?></td>
                  <td><?=$row['role']?></td>
                  </tr>
                   <?php $i++; }?>
                </tbody>
              </table>
              <?php }?>
          </div>
        <?php }else { ?>
              <div class="card" style="width: 18rem;">
                <img src="img/user-default.png"
                 class="card-img-top" 
                 alt="user image">
                <div class="card-body text-align">
                  <h5 class="card-title">
                    <?=$_SESSION['name'] ?>
                  </h5>
                  <a href="logout.php  " class="btn btn-danger ml-3">LOGOUT</a><b>
                  <a href="view.php " class="btn btn-danger ml-3"> To Do</a>
                  
              </div>
            </div>
         <?php } ?>
        </div>              
</body>
</html>
<?php }else{
        header("location: index.php");
}?>


