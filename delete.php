<?php 
session_start();
include('db.php');
	if(isset($_GET["course_id"]) && $_GET["id"] == $_SESSION["id"]){
		if(!isset($_GET["mode"])){
			$course_id = $_GET["course_id"];
			$sql_purchased = "DELETE FROM purchased_courses WHERE id = '". $course_id ."'";
			$result = mysqli_query($conn, $sql_purchased);
			if($result) {
		        header("Location: user.php?id=". $_SESSION["id"]);
			}
		}
		
		if(isset($_GET["mode"])) {
			$course_id = $_GET["course_id"];
			$sql_course = "DELETE FROM courses WHERE id = '". $course_id ."'";
			$result = mysqli_query($conn, $sql_course);
			if($result) {
		        header("Location: admin.php?id=". $_SESSION["id"]);
			}
		}
	}

?>