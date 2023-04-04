<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
    redirect_to(url_for('/staff/subjects/index.php'));
}

$id = h(u($_GET['id']));

if(is_post_request()) {
    $subject = [];
    $subject['menu_name'] = h($_POST['menu_name']) ?? '';
    $subject['position'] = h($_POST['position']) ?? '';
    $subject['visible'] = h($_POST['visible']) ?? '';
    $subject['id'] = $id;
    
    $result = update_record('subjects', $subject);

    if($result === true) {
        redirect_to(url_for("/staff/subjects/show.php?id=" . $id));
    } else {
        $errors = $result;
        // var_dump($errors);
    }
} else {
    $subject = find_single_record('subjects', $id);
    $subject_count = count_records('subjects');
}

?>

<?php $page_title = 'Edit Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

    <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

    <div class="subject new">
        <h1>Edit Subject</h1>

        <?php echo display_errors($errors); ?>

        <form action="<?php echo url_for("/staff/subjects/edit.php?id=" . h(u($id))); ?>" method="post">
            <div class="mb-3">
                <label for="menu-name" class="form-label">Menu Name</label>
                <input type="text" name="menu_name" class="form-control" id="menu-name"
                    value="<?php echo h($subject['menu_name']); ?>">
            </div>
            <div class="mb-3">
                <label for="position" class="form-label">Position</label>
                <select id="position" name="position" class="form-select">
                    <?php
                    for($i=1; $i <= $subject_count; $i++) {
                        echo "<option value='$i' ";
                        if($subject['position'] == $i){
                            echo 'selected';
                        }
                        echo ">$i</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3 form-check">
                <input type="hidden" name="visible" value="0" class="form-check-input" />
                <input type="checkbox" name="visible" value="1" class="form-check-input" id="visible"
                    <?php echo $subject['visible'] === '1' ? 'checked' : ''; ?> />
                <label class="form-check-label" for="visible">Visible</label>
            </div>
            <button type="submit" class="btn btn-primary">Create Subject</button>
        </form>

    </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>