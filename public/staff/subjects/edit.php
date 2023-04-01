<?php

require_once('../../../private/initialize.php');

$test = $_GET['test'] ?? '';
if ($test == '404') {
    error_404();
} elseif ($test == '500') {
    error_500();
} elseif($test == 'redirect') {
    redirect_to(url_for('/staff/subjects/index.php'));
}

?>

<?php $page_title = 'Edit Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

    <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

    <div class="subject new">
        <h1>Edit Subject</h1>

        <form action="" method="post">
            <div class="mb-3">
                <label for="menu-name" class="form-label">Menu Name</label>
                <input type="text" name="name" class="form-control" id="menu-name" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="menu-position" class="form-label">Position</label>
                <select id="menu-position" name="position" class="form-select">
                    <option value="1">1</option>
                </select>
            </div>
            <div class="mb-3 form-check">
                <input type="hidden" name="visible" value="0" class="form-check-input" id="menu-visible">
                <input type="checkbox" name="visible" value="1" class="form-check-input" id="menu-visible">
                <label class="form-check-label" for="menu-visible">Visible</label>
            </div>
            <button type="submit" class="btn btn-primary">Edit Subject</button>
        </form>

    </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>