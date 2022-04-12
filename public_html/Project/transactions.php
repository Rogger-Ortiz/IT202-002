<?php
require(__DIR__ . "/../../partials/nav.php");
$_SESSION['account'] = $_GET['account'];
?>
<h1>Transaction History</h1>

<?php
if (is_logged_in(true)) {
    //comment this out if you don't want to see the session variables
    error_log("Session data: " . var_export($_SESSION, true));
}
 $accnum = $_SESSION['account'];
 $db = getDB();
?>

<?php
$stmt = $db->prepare("SELECT id, account_number, account_type, balance, created FROM Accounts WHERE id=$accnum LIMIT 1");
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
        <th>Balance</th>
        <th>Created</th>
    </thead>
    <tbody>
        <tr>
            <td><?php se($results[0], "account_number") ?></td>
            <td><?php se($results[0], "account_type") ?></td>
            <td><?php se($results[0], "balance") ?></td>
            <td><?php se($results[0], "created") ?></td>
        </tr>
    </tbody>
</table>
<br>

<?php
 $results = [];
 $uid = get_user_id();
 $stmt = $db->prepare("SELECT account_src, account_dest, transaction_type, balance_change, created, expected_total, memo FROM Transactions WHERE account_src=$accnum ORDER BY created desc LIMIT 10");
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
        <th>Account Source</th>
        <th>Account Destination</th>
        <th>Transaction Type</th>
        <th>Balance Change</th>
        <th>Date Created</th>
        <th>Expected Total</th>
        <th>Memo</th>
    </thead>
    <tbody>
        <?php if (empty($results)) : ?>
            <tr>
                <td colspan="100%">No Transactions</td>
            </tr>
        <?php else : ?>
            <?php foreach ($results as $item) : ?>
                <tr>
                    <td><?php echo toaccnum($item["account_src"]); ?></td>
                    <td><?php echo toaccnum($item["account_dest"]); ?></td>
                    <td><?php se($item, "transaction_type"); ?></td>
                    <td><?php se($item, "balance_change"); ?></td>
                    <td><?php se($item, "created"); ?></td>
                    <td><?php se($item, "expected_total"); ?></td>
                    <td><?php se($item, "memo"); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>