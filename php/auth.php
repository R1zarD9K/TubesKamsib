<?php
session_start();

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function login($username, $password) {
    if ($username === 'kelompok10' && $password === 'sukasuka') {
        $_SESSION['user_id'] = 1;
        return true;
    }
    return false;
}

function logout() {
    session_unset();
    session_destroy();
}
?>