<?php

include '../config/db.php';

if($conn) {
	echo "Database Connection Successfull";
} else {
	echo "Database Connection Failed";
}

?>