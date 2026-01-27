<?php
require_once __DIR__ . '/../../includes/functions.php';
require_once __DIR__ . '/../../config/config.php';
logoutUser();
header("Location: "  . BASE_PATH . "/public/index.php");
