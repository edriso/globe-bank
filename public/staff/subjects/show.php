<?php require_once('../../../private/initialize.php'); ?>

<?php include_once(SHARED_PATH . '/staff_header.php'); ?>

<?php

$id = $_GET['id'] ?? '1';

echo h($id);

?>

<?php include_once(SHARED_PATH . '/staff_footer.php'); ?>