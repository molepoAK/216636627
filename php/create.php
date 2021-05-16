<?php 

if (isset($_POST['create'])) {

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
	
	$user_data = 'chapter='.$chapter. '&topic='.$topic;

	if (empty($chapter)) {
		header("Location: ../index.php?error=Chapter is required&$user_data");
	}else if (empty($subject)) {
		header("Location: ../index.php?error=subject is required&$user_data");
	}else if (empty($topic)) {
		header("Location: ../index.php?error=Topic is required&$user_data");
	}else if (empty($lesson_brief)) {
		header("Location: ../index.php?error=Lesson Brief is required&$user_data");

	}else{
       
       $sql = " INSERT INTO lessons(chapter, subject, topic, lesson_brief)
                VALUES('$chapter', '$subject', '$topic', '$lesson_brief')"; 

       $result = mysqli_query($conn, $sql);
       if ($result) {
                 header("Location: ../read.php?success=Lesson successfully created");
         }else{
         	header("Location: ../index.php?error=Unknown error occurred&$user_data");
         }       
	}

}