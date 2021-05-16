<!DOCTYPE html>
<html>
<head>
	<title>Multi user login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
</head>
<body>
	<div class="container d-flex justify-content-center 
      align-items-center"
      style="min-height: 100vh">
      	<form class="border shadow p-3 rounded"
      	      action="php/check_signup.php"
      	      method="post" 
      	      style="width: 450px;">
              <h1 class="Text-center  p-3">SIGNUP</h1>
              <?php if (isset($_GET['error'])) {?>
              <div class="alert alert-danger" role="alert">
				  <?=$_GET['error']?>
				</div>
			<?php }?>

      <?php if (isset($_GET['success'])) { ?>
        <p class="success"><?php echo $_GET['success']; ?></p>
      <?php } ?>
           <div class="mb-3">
           <label for="name"
                  class="form-label">Name</label>
           <input type="Text"
                  class="form-control"
                  name="name"
                   id="name">

            </div>
                  <div class="mb-3">
           <label for="username"
                  class="form-label">Username</label>
           <input type="Text"
                  class="form-control"
                  name="username"
                   id="username">
           </div>
            <div class="mb-3">
           <label for="password"
                  class="form-label">Password</label>
           <input type="password"
                  name="password"
                  class="form-control"
                   id="password">
           </div>

            <div class="mb-3">
           <label for="password"
                  class="form-label">Re Password</label>
           <input type="password"
                  name="re_password"
                  class="form-control"
                   id="Re_password">
           </div>
      
		   <button type="submit" class="btn btn-primary">SIGNUP</button>
       <a href="index.php" class="ca"> Already have an account?</a>
		  </form>
      </div>

</body>
</html>