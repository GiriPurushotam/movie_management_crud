<?php
require_once __DIR__ . '/../../includes/functions.php';
logoutUser();
header('Location: /movie_project/public/index.php');
