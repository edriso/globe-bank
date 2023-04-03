<?php

require_once('../../../private/initialize.php');

$page_title = 'Delete Page';
include_once(SHARED_PATH . '/staff_header.php');

if(!isset($_GET['id'])) {
    redirect_to(url_for('/staff/pages/index.php'));
}

$id = $_GET['id'];

if(is_post_request()) {
    delete_record('pages', $id);
} 
else {
    $page = find_single_record('pages', $id);
}

?>


<div id="content">
    <a href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>

    <div class="page show mt-2">
        <h3>page: <?php echo h($page['menu_name']); ?></h3>
    </div>

    <form action="<?php echo url_for("/staff/pages/delete.php?id=$id"); ?>" method="post">
        <div class="mb-3">
            <p>Are you sure you want to delete?</p>
        </div>
        <button type="submit" class="btn btn-primary">Delete Page</button>
    </form>
</div>

<?php include_once(SHARED_PATH . '/staff_footer.php'); ?>