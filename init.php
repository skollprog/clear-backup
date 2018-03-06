<?php

	require_once("clear-backup.php");
	$backup = new clearBackup();
	$backup->purge();

?>