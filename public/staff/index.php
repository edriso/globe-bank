<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = "Staff Menu"; ?>
<?php include_once(SHARED_PATH . '/staff_header.php'); ?>

<!-- Content -->
<div>
    <h3>Main Menu</h3>

    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="<?php echo url_for('staff/subjects/index.php'); ?>">Subjects</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo url_for('staff/pages/index.php'); ?>">Pages</a>
        </li>
    </ul>
</div>
<!-- Content Ends -->

<?php include_once(SHARED_PATH . '/staff_footer.php'); ?>