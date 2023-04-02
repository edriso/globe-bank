<?php

require_once('../../../private/initialize.php');

if(is_post_request()) {
    $menu_name = $_POST['menu_name'];
    $position = $_POST['position'];
    $visible = $_POST['visible'];
    create_record('subjects',  $menu_name, $position, $visible);
}

?>

<?php $page_title = 'Create Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>
    <div class="subject new">
        <h1>Create Subject</h1>

        <form action="<?php echo url_for('/staff/subjects/new.php'); ?>" method="post">
            <div class="mb-3">
                <label for="menu-name" class="form-label">Menu Name</label>
                <input type="text" name="menu_name" class="form-control" id="menu-name">
            </div>
            <div class="mb-3">
                <label for="position" class="form-label">Position</label>
                <select id="position" name="position" class="form-select">
                    <option value="1">1</option>
                </select>
            </div>
            <div class="mb-3 form-check">
                <input type="hidden" name="visible" value="0" class="form-check-input">
                <input type="checkbox" name="visible" value="1" class="form-check-input" id="visible">
                <label class="form-check-label" for="visible">Visible</label>
            </div>
            <button type="submit" class="btn btn-primary">Create Subject</button>
        </form>
    </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>