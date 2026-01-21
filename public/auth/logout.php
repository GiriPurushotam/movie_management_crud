<?php
require_once __DIR__ . '/../../includes/functions.php';
startSession();
header('Location: login.php?success_auth=Logged Out');
