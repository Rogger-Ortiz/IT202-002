<?php

/**
 * Passing $redirect as true will auto redirect a logged out user to the $destination.
 * The destination defaults to login.php
 */
function is_logged_in($redirect = false, $destination = "login.php")
{
    $isLoggedIn = isset($_SESSION["user"]);
    if ($redirect && !$isLoggedIn) {
        //if this triggers, the calling script won't receive a reply since die()/exit() terminates it
        flash("You must be logged in to view this page", "warning");
        die(header("Location: $destination"));
    }
    return $isLoggedIn;
}
function has_role($role)
{
    if (is_logged_in() && isset($_SESSION["user"]["roles"])) {
        foreach ($_SESSION["user"]["roles"] as $r) {
            if ($r["name"] === $role) {
                return true;
            }
        }
    }
    return false;
}
function get_username()
{
    if (is_logged_in()) { //we need to check for login first because "user" key may not exist
        return se($_SESSION["user"], "username", "", false);
    }
    return "";
}
function get_user_email()
{
    if (is_logged_in()) { //we need to check for login first because "user" key may not exist
        return se($_SESSION["user"], "email", "", false);
    }
    return "";
}
function get_user_id()
{
    if (is_logged_in()) { //we need to check for login first because "user" key may not exist
        return se($_SESSION["user"], "id", false, false);
    }
    return false;
}
function get_user_fname()
{
    if (is_logged_in()) { //we need to check for login first because "user" key may not exist
        $db = getDB();
        $uid = get_user_id();
        $results = [];
        $stmt = $db->prepare("SELECT id, first_name, last_name FROM Users WHERE id=$uid LIMIT 1");
        try {
            $stmt->execute();
            $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($r) {
                $results = $r;
            }
        } catch (PDOException $e) {
            error_log(var_export($e, true));
            flash("Error fetching items", "danger");
        }
        $fname = $results[0]['first_name'];

        return strval($fname);
    }
    return false;
}

function get_user_lname()
{
    if (is_logged_in()) { //we need to check for login first because "user" key may not exist
        $db = getDB();
        $uid = get_user_id();
        $results = [];
        $stmt = $db->prepare("SELECT id, first_name, last_name FROM Users WHERE id=$uid LIMIT 1");
        try {
            $stmt->execute();
            $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($r) {
                $results = $r;
            }
        } catch (PDOException $e) {
            error_log(var_export($e, true));
            flash("Error fetching items", "danger");
        }
        $lname = $results[0]['last_name'];

        return strval($lname);
    }
    return false;
}