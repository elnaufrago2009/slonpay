<?php
	
	// datos de conexion
  $conn = new mysqli('localhost', 'root', 'moiseslinar3s', 'slonpay');

	// error de conexion
	if ($conn->connect_errno) {
		echo "Problemas con la Base de Datos.";
		exit;
	}
	
	
?>