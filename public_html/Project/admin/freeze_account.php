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
$stmt = $db->prepare("SELECT frozen FROM Accounts WHERE user_id = $uid LIMIT 1");
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($results);
$disval = $results[0]['frozen'];

$stmt = $db->prepare("UPDATE Accounts SET frozen = !$disval WHERE user_id = $uid");
$stmt->execute();
flash("Account Freeze Toggled!", "Success");

die(header("Location: search_accounts.php"));
?>