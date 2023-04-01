<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
    redirect_to(url_for('/staff/subjects/index.php'));
}

$id = $_GET['id'];

if(is_post_request()) {
    // Handle form values sent by new.php

    $menu_name = h($_POST['menu_name']) ?? '';
    $position = h($_POST['position']) ?? '';
    $visible = h($_POST['visible']) ?? '';

    echo "Form parameters<br/>";
    echo "Menu name: $menu_name<br/>";
    echo "Position: $position<br/>";
    echo "Visible: $visible<br/>";
} else {
    $menu_name = '';
    $position = '';
    $visible = '';
}

?>

<?php $page_title = 'Edit Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

    <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

    <div class="subject new">
        <h1>Edit Subject</h1>

        <form action="<?php echo url_for("/staff/subjects/edit.php?id=" . h(u($id))); ?>" method="post">
            <div class="mb-3">
                <label for="menu-name" class="form-label">Menu Name</label>
                <input type="text" name="menu_name" class="form-control" id="menu-name"
                    value="<?php echo $menu_name; ?>">
            </div>
            <div class="mb-3">
                <label for="position" class="form-label">Position</label>
                <select id="position" name="position" class="form-select">
                    <option value="1" <?php if($position === '1'){ echo 'selected'; } ?>>1</option>
                </select>
            </div>
            <div class="mb-3 form-check">
                <input type="hidden" name="visible" value="0" class="form-check-input" />
                <input type="checkbox" name="visible" value="1" class="form-check-input" id="visible"
                    <?php echo $visible === '1' ? 'checked' : ''; ?> />
                <label class="form-check-label" for="visible">Visible</label>
            </div>
            <button type="submit" class="btn btn-primary">Create Subject</button>
        </form>

    </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>