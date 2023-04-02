<?php require_once('../../../private/initialize.php'); ?>

<?php
$page_title = 'Show page';
include_once(SHARED_PATH . '/staff_header.php');
?>

<?php

if(!isset($_GET['id'])) {
    redirect_to(url_for('/staff/pages/index.php'));
}

$id = $_GET['id'];
$page = find_single_record('pages', $id);

?>

<div id="content">
    <a href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>

    <div class="page show mt-2">
        <h3>Page: <?php echo h($page['menu_name']); ?></h3>
    </div>

    <table class="table">
        <tbody>
            <tr>
                <th scope="row">Menu Name</th>
                <td><?php echo h($page['menu_name']); ?></td>
            </tr>
            <tr>
                <th scope="row">Position</th>
                <td><?php echo h($page['position']); ?></td>
            </tr>
            <tr>
                <th scope="row">Visible</th>
                <td><?php echo h($page['visible']) ? 'true' : 'false'; ?></td>
            </tr>
        </tbody>
    </table>
</div>

<?php include_once(SHARED_PATH . '/staff_footer.php'); ?>