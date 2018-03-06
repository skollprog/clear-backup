<?php

	require_once("clear-backup.php");
	$backup = new clearBackup();
	$backup->route("./") // Ruta padre de Updraft
	$backup->purge();

?>
