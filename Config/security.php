<?php
session_start();
if (isset($_SESSION['name']) == false) {
?>
	<h1>Usuario ni contraseña encontrados. Regresando al login.</h1>
	<META http-equiv="Refresh" charset="UTF-8" content="2 ; URL =../">
<?php
	exit();
}

?>