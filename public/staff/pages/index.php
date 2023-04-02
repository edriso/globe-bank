<?php require_once('../../../private/initialize.php'); ?>

<?php $page_title = "Pages"; ?>
<?php include_once(SHARED_PATH . '/staff_header.php'); ?>

<!-- Content -->
<?php

$pages_set = find_all_pages();

?>

<div id="content">
    <div class="subjects listing">
        <h1>Pages</h1>

        <div class="actions">
            <a href="<?php echo url_for('/staff/pages/new.php'); ?>">Create New Page</a>
        </div>

        <table class="table">
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
                <?php while($page = mysqli_fetch_assoc($pages_set)) { ?>
                <tr>
                    <th scope="row"><?php echo h($page['id']); ?></th>
                    <td><?php echo h($page['position']); ?></td>
                    <td><?php echo $page['visible'] == 1 ? 'true' : 'false'; ?></td>
                    <td><?php echo h($page['menu_name']); ?></td>
                    <td><a class="action"
                            href="<?php echo url_for('/staff/pages/show.php?id=' . h(u($page['id']))); ?>">View</a>
                    </td>
                    <td><a class="action"
                            href="<?php echo url_for('/staff/pages/edit.php?id=' . h(u($page['id']))); ?>">Edit</a></td>
                    <td><a class="action" href="#">Delete</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Content Ends -->

<?php mysqli_free_result($pages_set); ?>

<?php include_once(SHARED_PATH . '/staff_footer.php'); ?>