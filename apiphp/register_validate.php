<?php 

	// conexion
	include '../apiphp/conn.php';

	// Post
  $post = json_decode(file_get_contents('php://input'), true);

  $email			=	$post['email'];
  $password		=	$post['password'];
  $repassword	= $post['repassword'];

  session_start();
  $_SESSION['moises'] = 'moises';

  if ($password == $repassword && strlen($email) > 3 && strlen($password) > 3) {

    //consulta user
    $sql_exist = "SELECT count(*) cantidad FROM usuarios WHERE email='$email'";
    $sql_exist = $conn->query($sql_exist)->fetch_array(MYSQLI_ASSOC);

    if ($sql_exist['cantidad'] == 0) {

      // register user
      $sql_registra = "INSERT INTO usuarios (email,password) VALUES ('$email','$password')";    
      $conn->query($sql_registra);

      // variables session
      $_SESSION['email']  =   $email;
      $_SESSION['estado'] =   0; 
      echo 'ok';  

    }else{

      // check registered
      $sql_registered = "SELECT count(*) cantidad FROM usuarios WHERE email='$email' and password='$password'";
      $sql_registered = $conn->query($sql_registered)->fetch_array(MYSQLI_ASSOC);

      if ($sql_registered['cantidad'] > 0) {

        // variables session
        $_SESSION['email'] = $email;
        $_SESSION['estado'] =   0; 
        echo 'ok';
      }else{
        echo 'no';
      }

    }

    
  }else{

    // not pass validation
  	echo 'no';

  }

	//echo $repassword;
?>