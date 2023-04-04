<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
    redirect_to(url_for('/staff/pages/index.php'));
}

$id = h(u($_GET['id']));

if(is_post_request()) {
    $page = [];
    $page['menu_name'] = h($_POST['menu_name']) ?? '';
    $page['position'] = h($_POST['position']) ?? '';
    $page['visible'] = h($_POST['visible']) ?? '';
    $page['content'] = h($_POST['content']) ?? '';
    $page['id'] = $id;
    
    $result = update_record('pages', $page);
    if($result === true) {
        redirect_to(url_for("/staff/pages/show.php?id=" . $id));
    }
} else {
    $page = find_single_record('pages', $id);
    $page_count = count_records('pages');
}

?>

<?php $page_title = 'Edit Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

    <a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>

    <div class="page new">
        <h1>Edit Page</h1>

        <form action="<?php echo url_for("/staff/pages/edit.php?id=" . h(u($id))); ?>" method="post">
            <div class="mb-3">
                <label for="menu-name" class="form-label">Menu Name</label>
                <input type="text" name="menu_name" class="form-control" id="menu-name"
                    value="<?php echo h($page['menu_name']); ?>">
            </div>
            <div class="mb-3">
                <label for="position" class="form-label">Position</label>
                <select id="position" name="position" class="form-select">
                    <?php
                    for($i=1; $i <= $page_count; $i++) {
                        echo "<option value='$i' ";
                        if($page['position'] == $i){
                            echo 'selected';
                        }
                        echo ">$i</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" id="content" class="form-control"><?php echo h($page['content']); ?></textarea>
            </div>
            <div class="mb-3 form-check">
                <input type="hidden" name="visible" value="0" class="form-check-input" />
                <input type="checkbox" name="visible" value="1" class="form-check-input" id="visible"
                    <?php echo $page['visible'] === '1' ? 'checked' : ''; ?> />
                <label class="form-check-label" for="visible">Visible</label>
            </div>
            <button type="submit" class="btn btn-primary">Create page</button>
        </form>

    </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>