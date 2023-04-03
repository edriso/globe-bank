<?php

require_once('../../../private/initialize.php');

$page_title = 'Delete Subject';
include_once(SHARED_PATH . '/staff_header.php');

if(!isset($_GET['id'])) {
    redirect_to(url_for('/staff/subjects/index.php'));
}

$id = $_GET['id'];

if(is_post_request()) {
    delete_record('subjects', $id);
} else {
    $subject = find_single_record('subjects', $id);
}

?>


<div id="content">
    <a href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

    <div class="subject show mt-2">
        <h3>Subject: <?php echo h($subject['menu_name']); ?></h3>
    </div>

    <form action="<?php echo url_for("/staff/subjects/delete.php?id=$id"); ?>" method="post">
        <div class="mb-3">
            <p>Are you sure you want to delete?</p>
        </div>
        <button type="submit" class="btn btn-primary">Delete Subject</button>
    </form>
</div>

<?php include_once(SHARED_PATH . '/staff_footer.php'); ?>