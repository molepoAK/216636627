<?php include 'php/update.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container">
		<form action="php/update.php" 
		      method="post">

			<h4 class=" display-4 text-center">Update Lesson</h4><hr><br>
			<?php if (isset($_GET['error'])) { ?>
		   <div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
			</div>
			 <?php } ?>
		  <div class="form-label">
		    <label for="chapter" >Chapter</label>
		    <input type="chapter"
		           class="form-control"
		           id="chapter"
		           name="chapter"
		           value="<?=$row['chapter'] ?>">
		           
		  </div>
         
           <div class="form-label">
		    <label for="subject" >Subject</label>
		    <input type="subject"
		           class="form-control"
		           id="subject"
		           name="subject"
		           value="<?=$row['subject'] ?>">
		           
		   </div>

		  <div class="form-label">
		    <label for="topic" >Topic</label>
		    <input type="topic"
		           class="form-control"
		           id="topic"
		           name="topic"
		           value="<?=$row['topic'] ?>">
		   </div>

		   <div class="form-label">
		    <label for="lesson_brief" >Lesson Brief</label>
		    <input type="lesson_brief"
		           class="form-control"
		           id="lesson_brief"
		           name="lesson_brief"
		           value="<?=$row['lesson_brief'] ?>">

		          
		  </div>
          <input type="text" 
                   name="id"
                   value="<?=$row['id'] ?>"
                    hidden >
		  <button type="submit" 
		          class="btn btn-primary"
		          name="update">Update</button>
		    <a href="read.php" class="btn btn-success pull-left"><i class="fa fa-plus"></i>VIEW</a>

		</form>
	</div>
     
</body>
</html>


