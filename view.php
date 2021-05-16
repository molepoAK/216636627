<?php include "php/read.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Create</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container">
			<div class="box">

				<h4 class="display-4 text-center">For you to do</h4><br>
				<?php if (isset($_GET['success'])) { ?>
		          <div class="alert alert-success" role="alert">
			       <?php echo $_GET['success']; ?>
			   </div>
			<?php } ?>

				<?php if (mysqli_num_rows($result)) { ?>
					<table class="table table-striped">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Chapter</th>
					      <th scope="col">Subject</th>
					      <th scope="col">Topic</th>
					      <th scope="col">Lesson Brief</th>
					      
					    </tr>
					  </thead>
					  <tbody>
					  	<?php
					  	$i=0;
					  	while($rows = mysqli_fetch_assoc($result)){
					  		$i++;
					  		?>
					  	<tr>
					  		<th scope="row"><?=$i?></th>
			                <td><?=$rows['chapter']?></td>
			                <td><?=$rows['subject']?></td>
			                <td><?=$rows['topic']?></td>
			                <td><?php echo $rows['lesson_brief']; ?></td>
			                
					  	</tr>
					  	<?php } ?>
					  </tbody>
					</table>
					<?php } ?>
				
				</div>
	</div>
     
</body>
</html>
