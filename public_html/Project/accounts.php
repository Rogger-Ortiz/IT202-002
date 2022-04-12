<?php
require(__DIR__ . "/../../partials/nav.php");
?>
<h1>Accounts</h1>

<?php
if (is_logged_in(true)) {
    //comment this out if you don't want to see the session variables
    error_log("Session data: " . var_export($_SESSION, true));
}
?>

<?php
 $db = getDB();
 $results = [];
 $uid = get_user_id();
 $stmt = $db->prepare("SELECT account_number, account_type, modified, balance FROM Accounts WHERE user_id = $uid ORDER BY modified desc LIMIT 5");
 $stmt->execute();
 $l = $stmt->fetchAll(PDO::FETCH_ASSOC);
 if ($l) {
     $results = $l;
 }else{
     flash("No accounts found", "warning");
 }
?>

<table>
    <thead>
        <th>Account Number</th>
        <th>Account Type</th>
        <th>Modified</th>
        <th>Balance</th>
    </thead>
    <tbody>
        <?php if (empty($results)) : ?>
            <tr>
                <td colspan="100%">No roles</td>
            </tr>
        <?php else : ?>
            <?php foreach ($results as $item) : ?>
                <tr>
                    <td><?php se($item, "account_number"); ?></td>
                    <td><?php se($item, "account_type"); ?></td>
                    <td><?php se($item, "modified"); ?></td>
                    <td><?php se($item, "balance"); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<?php
require(__DIR__ . "/../../partials/flash.php");
?>