<?php

function find_all_subjects() {
    global $db;
    $query = "SELECT * FROM subjects";
    $query .= " ORDER BY position ASC";
    $result = mysqli_query($db, $query);
    return $result;
}

function find_subject($id) {
    global $db;
    $query = "SELECT * FROM subjects ";
    $query .= "WHERE id = $id";
    $result = mysqli_query($db, $query);
    $subject = mysqli_fetch_assoc($result);
    mysqli_free_result($result); // free from memory

    if(!$subject) {
        redirect_to(url_for('/staff/subjects/index.php'));
    }

    return $subject;
}

function find_all_pages() {
    global $db;
    $query = 'SELECT * FROM pages';
    $query .= ' ORDER BY position ASC';
    $result = mysqli_query($db, $query);
    return $result;
}

function find_page($id) {
    global $db;
    $query = "SELECT * FROM pages ";
    $query .= "WHERE id = $id";
    $result = mysqli_query($db, $query);
    $page = mysqli_fetch_assoc($result);
    mysqli_free_result($result); // free from memory

    if(!$page) {
        redirect_to(url_for('/staff/pages/index.php'));
    }

    return $page;
}

?>