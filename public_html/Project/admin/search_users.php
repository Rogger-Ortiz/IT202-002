<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: " . get_url("home.php")));
}
?>

<?php
 $db = getDB();
 $stmt = $db->prepare("SELECT first_name, last_name FROM Users");
 $stmt->execute();
 $l = $stmt->fetchAll(PDO::FETCH_ASSOC);
 if ($l) {
     $results = $l;
 }else{
     flash("No accounts found", "warning");
 }
?>

<form method="POST">
    <label for="fname">First Name:</label>
    <input type="text" id="fname" name="fname">

    <label for="lname">Last Name:</label>
    <input type="text" id="lname" name="lname"><br>

    <input type="submit" value="Filter" />
</form>

<table>
    <thead>
        <th>First Name</th>
        <th>Last Name</th>
        <th>View Accounts</th>
        <th>Create/Open Account</th>
        <th>Deactivate User</th>
    </thead>
    <tbody>
        <?php if (empty($results)) : ?>
            <tr>
                <td colspan="100%">No Transactions</td>
            </tr>
        <?php else : ?>
            <?php foreach ($results as $item) : ?>
                <tr>
                    <td><?php se($item, "first_name") ?></td>
                    <td><?php se($item, "last_name") ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../../partials/flash.php");
?>