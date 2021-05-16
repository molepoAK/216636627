<?php

if (isset($_GET['id'])) {
	include "db_conn.php";

	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$id = validate($_GET['id']);

	$sql = "SELECT * FROM lessons WHERE id=$id";  
	$result = mysqli_query($conn, $sql);
 if (mysqli_num_rows($result) > 0) {
    	$row = mysqli_fetch_assoc($result);
    }else {
    	header("Location: read.php");
    }

}else if (isset($_POST['update'])) {
	include "../db_conn.php";
	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}
	$chapter = validate($_POST['chapter']);
	$subject = validate($_POST['subject']);
	$topic = validate($_POST['topic']);
	$lesson_brief = validate($_POST['lesson_brief']);
	$id = validate($_POST['id']);
	
	if (empty($chapter)) {
		header("Location: ../update.php?id=$id&error=Chapter is required");
	}else if (empty($subject)) {
		header("Location: ../update.php?id=$id&error=subject is required");
	}else if (empty($topic)) {
		header("Location: ../update.php?id=$id&error=Topic is required");
	}else if (empty($lesson_brief)) {
		header("Location: ../update.php?id=$id&error=Lesson Brief is required");

	}else{
       
       $sql = " UPDATE lessons
                SET chapter='$chapter', subject='$subject', topic='$topic', lesson_brief='$lesson_brief' 
                WHERE id=$id"; 

       $result = mysqli_query($conn, $sql);
       if ($result) {
                 header("Location: ../read.php?success=Lesson successfully updated");
         }else{
         	header("Location: ../update.php?error=Unknown error occurred&$user_data");
         }       
	}

}
else{
	header("location: read.php");
}
