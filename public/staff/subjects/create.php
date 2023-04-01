<?php
require_once('../../../private/functions.php');

// Handle form values sent by new.php

$menu_name = $_POST['menu_name'] ?? '';
$position = $_POST['position'] ?? '';
$visible = $_POST['visible'] ?? '';

if(request_is_post()) {
    echo "Form parameters<br/>";
    echo "Menu name: $menu_name<br/>";
    echo "Position: $position<br/>";
    echo "Visible: $visible<br/>";
}

?>