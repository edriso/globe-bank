<?php require_once('../../../private/initialize.php'); ?>

<?php $page_title = "Subjects"; ?>
<?php include_once(SHARED_PATH . '/staff_header.php'); ?>

<!-- Content -->
<?php 
$subjects = [
    ['id' => '1', 'position' => '1', 'visible' => '1', 'menu_name' => 'About Global Bank'],
    ['id' => '2', 'position' => '2', 'visible' => '1', 'menu_name' => 'Consumer'],
    ['id' => '3', 'position' => '3', 'visible' => '1', 'menu_name' => 'Small Business'],
    ['id' => '4', 'position' => '4', 'visible' => '1', 'menu_name' => 'Commercial']
];
?>

<div id="content">
    <div class="subjects listing">
        <h1>Subjects</h1>

        <div class="actions">
            <a href="#">Create New Subject</a>
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
                <?php foreach($subjects as $subject) { ?>
                <tr>
                    <th scope="row"><?php echo $subject['id']; ?></th>
                    <td><?php echo $subject['position']; ?></td>
                    <td><?php echo $subject['visible'] == 1 ? 'true' : 'false'; ?></td>
                    <td><?php echo $subject['menu_name']; ?></td>
                    <td><a class="action"
                            href="<?php echo url_for('/staff/subjects/show.php?id=' . $subject['id']); ?>">View</a>
                    </td>
                    <td><a class="action" href="#">Edit</a></td>
                    <td><a class="action" href="#">Delete</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Content Ends -->

<?php include_once(SHARED_PATH . '/staff_footer.php'); ?>