<?php

function find_all_records($table) {
    global $db;
    $query = "SELECT * FROM $table";
    $query .= " ORDER BY position ASC";
    $result = mysqli_query($db, $query);
    return $result;
}

function find_single_record($table, $id) {
    global $db;
    $query = "SELECT * FROM $table ";
    $query .= "WHERE id = $id";
    $result_set = mysqli_query($db, $query);
    $result = mysqli_fetch_assoc($result_set);
    mysqli_free_result($result_set); // free from memory

    if(!$result) {
        redirect_to(url_for("/staff/$table/index.php"));
    }
    
    return $result;
}

function create_record($table, $menu_name, $position, $visible) {
    global $db;
    $query = "INSERT INTO $table ";
    $query .= "(menu_name, position, visible) ";
    $query .= "VALUES ('$menu_name', '$position', '$visible')";
    $result = mysqli_query($db, $query);
    
    if(!$result) {
        echo mysqli_errno($db);
        db_disconnect($db);
        exit;
    }
    
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for("/staff/$table/show.php?id=$new_id"));
}

?>