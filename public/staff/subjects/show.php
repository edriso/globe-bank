<?php require_once('../../../private/initialize.php'); ?>

<?php
$page_title = 'Show Subject';
include_once(SHARED_PATH . '/staff_header.php');
?>

<?php

if(!isset($_GET['id'])) {
    redirect_to(url_for('/staff/subjects/index.php'));
}

$id = $_GET['id'];
$subject = find_subject($id);

?>

<div id="content">
    <a href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

    <div class="subject show mt-2">
        <h3>Subject: <?php echo h($subject['menu_name']); ?></h3>
    </div>

    <table class="table">
        <tbody>
            <tr>
                <th scope="row">Menu Name</th>
                <td><?php echo h($subject['menu_name']); ?></td>
            </tr>
            <tr>
                <th scope="row">Position</th>
                <td><?php echo h($subject['position']); ?></td>
            </tr>
            <tr>
                <th scope="row">Visible</th>
                <td><?php echo h($subject['visible']) ? 'true' : 'false'; ?></td>
            </tr>
        </tbody>
    </table>
</div>

<?php include_once(SHARED_PATH . '/staff_footer.php'); ?>