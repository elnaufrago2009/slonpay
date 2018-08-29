<?php 

	// conexion
	include '../apiphp/conn.php';

	// Post
  $post = json_decode(file_get_contents('php://input'), true);

  $email			=	$post['email'];
  $password		=	$post['password'];

	session_start();

  if (strlen($email) > 3 && strlen($password) > 3) {
	  $sql_search = "SELECT count(*) cantidad FROM usuarios WHERE email='$email' and password='$password' ";
	  $sql_search = $conn->query($sql_search)->fetch_array(MYSQLI_ASSOC);
	  if ($sql_search['cantidad'] > 0) {	  	
	  	$_SESSION['email'] = $email;
	  	$_SESSION['estado'] = 0;
	  	echo 'ok';
	  }else{
	  	echo 'no';
	  }
  }else{
  	echo 'no';
  }

  

	

?>