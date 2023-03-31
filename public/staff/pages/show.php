<?php require_once('../../../private/initialize.php'); ?>

<?php
$page_title = 'Show Page';
include_once(SHARED_PATH . '/staff_header.php');
?>

<?php

$id = $_GET['id'] ?? '1';

?>

<div id="content">
    <a href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>

    <div class="page show mt-2">
        <h3>Page ID: <?php echo h($id); ?></h3>
    </div>
</div>

<?php include_once(SHARED_PATH . '/staff_footer.php'); ?>