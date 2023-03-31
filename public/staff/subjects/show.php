<?php require_once('../../../private/initialize.php'); ?>

<?php
$page_title = 'Show Subject';
include_once(SHARED_PATH . '/staff_header.php');
?>

<?php

$id = $_GET['id'] ?? '1';

?>

<div id="content">
    <a href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

    <div class="subject show mt-2">
        <h3>Subject ID: <?php echo h($id); ?></h3>
    </div>
</div>

<?php include_once(SHARED_PATH . '/staff_footer.php'); ?>