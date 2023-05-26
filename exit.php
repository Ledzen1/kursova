<?php 
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id']) && isset($_GET['exit'])) {
	session_unset();
	session_destroy();
	header("Location: index.php");
}

?>