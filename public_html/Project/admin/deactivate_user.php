<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: " . get_url("home.php")));
    
}
$_SESSION['account'] = $_GET['account'];
?>

<?php
$uid = $_SESSION['account'];
$db = getDB();

$results = [];
$stmt = $db->prepare("SELECT is_disabled FROM Users WHERE id = $uid LIMIT 1");
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$disval = $results[0]['is_disabled'];

$stmt = $db->prepare("UPDATE Users SET is_disabled = !$disval WHERE id = $uid");
$stmt->execute();
flash("Account Disable Toggled!", "Success");

die(header("Location: admin/search_users.php"));
?>