<?php

function find_all_data($table) {
    global $db;
    $query = "SELECT * FROM $table";
    $query .= " ORDER BY position ASC";
    $result = mysqli_query($db, $query);
    return $result;
}

function find_single_item($table, $id) {
    global $db;
    $query = "SELECT * FROM $table ";
    $query .= "WHERE id = $id";
    $result = mysqli_query($db, $query);
    $item = mysqli_fetch_assoc($result);
    mysqli_free_result($result); // free from memory

    if(!$item) {
        redirect_to(url_for("/staff/$table/index.php"));
    }

    return $item;
}

?>