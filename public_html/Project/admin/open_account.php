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
$acc = $_SESSION['account'];
$db = getDB();

$results = [];
$stmt = $db->prepare("SELECT is_active FROM Accounts WHERE $id = $acc LIMIT 1");
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$disval = $results[0]['is_active'];

$stmt = $db->prepare("UPDATE Accounts SET is_active = !$disval WHERE $id = $acc");
$stmt->execute();
flash("Account Opened!", "Success");

die(header("Location: search_users.php"));

?>