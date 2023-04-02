<?php require_once('../../../private/initialize.php'); ?>

<?php $page_title = "Subjects"; ?>
<?php include_once(SHARED_PATH . '/staff_header.php'); ?>

<!-- Content -->
<?php 

$subject_set = find_all_records('subjects');

?>

<div id="content">
    <div class="subjects listing">
        <h1>Subjects</h1>

        <div class="actions">
            <a href="<?php echo url_for('/staff/subjects/new.php'); ?>">Create New Subject</a>
        </div>

        <table class="table">
            <caption><?php echo mysqli_num_rows($subject_set); ?> Subjects</caption>
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Position</th>
                    <th scope="col">Visible</th>
                    <th scope="col">Name</th>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php while($subject = mysqli_fetch_assoc($subject_set)) { ?>
                <tr>
                    <th scope="row"><?php echo h($subject['id']); ?></th>
                    <td><?php echo h($subject['position']); ?></td>
                    <td><?php echo $subject['visible'] == 1 ? 'true' : 'false'; ?></td>
                    <td><?php echo h($subject['menu_name']); ?></td>
                    <td><a class="action"
                            href="<?php echo url_for('/staff/subjects/show.php?id=' . h(u($subject['id']))); ?>">View</a>
                    </td>
                    <td><a class="action"
                            href="<?php echo url_for('/staff/subjects/edit.php?id=' . h(u($subject['id']))); ?>">Edit</a>
                    </td>
                    <td><a class="action" href="#">Delete</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Content Ends -->

<?php mysqli_free_result($subject_set); ?>

<?php include_once(SHARED_PATH . '/staff_footer.php'); ?>