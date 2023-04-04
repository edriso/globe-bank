<?php

function count_records($table) {
    global $db;
    $query = "SELECT COUNT('id') FROM $table";
    $result_set = mysqli_query($db, $query);
    $result = mysqli_fetch_row($result_set)[0];
    mysqli_free_result($result_set);
    return $result;
}

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
    $query .= "WHERE id = '$id'";
    $result_set = mysqli_query($db, $query);
    $result = mysqli_fetch_assoc($result_set);
    mysqli_free_result($result_set); // free from memory

    if(!$result) {
        redirect_to(url_for("/staff/$table/index.php"));
    }
    
    return $result;
}

function create_record($table, $record) {
    global $db;

    $errors = validate_record($record);
    if(!empty($errors)) {
        return $errors;
    }

    $query = "INSERT INTO $table ";
    $query .= "(menu_name, position,";
    if($table === 'pages') {
        $query .= "content,";
    }
    $query .= "visible) VALUES (";
    $query .= "'" . $record['menu_name'] . "',";
    $query .= "'" . $record['position'] . "',";
    if($table === 'pages') {
        $query .= ($record['content'] ? "'".$record['content']."'" : 'NULL') . ",";
    }
    $query .= "'" . $record['visible'] . "'";
    $query .= ")";
    echo $query;
    $result = mysqli_query($db, $query);
    
    if(!$result) {
        echo mysqli_errno($db);
        db_disconnect($db);
        exit;
    }
    
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for("/staff/$table/show.php?id=$new_id"));
    return true;
}

function update_record($table, $record) {
    global $db;

    $errors = validate_record($record);
    if(!empty($errors)) {
        return $errors;
    }

    $query = "UPDATE $table ";
    $query .= "SET menu_name='" . $record['menu_name'] . "', ";
    $query .= "position='" . $record['position'] . "', ";
    if($table === 'pages') {
        $query .= "content=" . ($record['content'] ? "'".$record['content']."'" : 'NULL') . ", ";
    }
    $query .= "visible='" . $record['visible'] . "' ";
    $query .= "WHERE id='" . $record['id'] . "' LIMIT 1";
    $result = mysqli_query($db, $query);
    
    if(!$result) {
        echo mysqli_errno($db);
        db_disconnect($db);
        exit;
    }

    return true;
}

function delete_record($table, $id) {
    global $db;
    $query = "DELETE FROM $table ";
    $query .= "WHERE id='$id' LIMIT 1";
    $result = mysqli_query($db, $query);

    if(!$result) {
        echo mysqli_errno($db);
        db_disconnect($db);
        exit;
    }

    redirect_to(url_for("/staff/$table/index.php"));
}

function validate_record($record) {
    $errors = [];

    // menu_name
    if(is_blank($record['menu_name'])) {
      $errors[] = "Name cannot be blank.";
    } elseif(!has_length($record['menu_name'], ['min' => 2, 'max' => 255])) {
      $errors[] = "Name must be between 2 and 255 characters.";
    }

    // position
    // Make sure we are working with an integer
    $position_int = (int) $record['position'];
    if($position_int <= 0) {
      $errors[] = "Position must be greater than zero.";
    }
    if($position_int > 999) {
      $errors[] = "Position must be less than 999.";
    }

    // visible
    // Make sure we are working with a string
    $visible_str = (string) $record['visible'];
    if(!has_inclusion_of($visible_str, ["0","1"])) {
      $errors[] = "Visible must be true or false.";
    }

    return $errors;
  }

?>