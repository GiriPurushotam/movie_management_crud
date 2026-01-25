<?php
require_once __DIR__ . '/../../includes/functions.php';
logoutUser();
header('Location: login.php?success_auth=Logged Out');
