<?php
global $red;
unset($red->data->session);
$_SESSION['user'] = null;
session_destroy();
$return = array('success' => 1);
echo json_encode($return);
?>
