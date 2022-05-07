<?php
require(__DIR__ . "/../../partials/nav.php");
$_SESSION['account'] = $_GET['account'];
?>
<h1>Account Details</h1>

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

<?php
if(isset($_POST['start']) && isset($_POST['end'])){
    $startval = $_POST['start'];
    $endval = $_POST['end'];
    $typeval = $_POST['type'];
}else{
    $startval = "2022-01-01";
    $endval = date("Y-m-d");
    $typeval = "";
}
?>
<form method="POST">
    <label for="start">Between:</label>
    <input type="date" id="start" name="start"
       value=<?php echo $startval; ?>
       min="2022-01-01" max=<?php date("Y-m-d");?>>

    <label for="end">and</label>
    <input type="date" id="end" name="end"
       value=<?php echo $endval; ?>
       min="2022-01-01" max=<?php date("Y-m-d"); ?>><br>

    <label for="type">Transaction Type:</label>
    <select id="type" name="type" value=<?php echo $typeval; ?>>
        <option value="">All</option>
        <option value="Deposit">Deposit</option>
        <option value="Withdraw">Withdraw</option>
        <option value="Transfer">Transfer</option>
        <option value="Ext-Transfer">External Transfer</option>
</select>

    <input type="submit" value="Filter" />
</form>

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

<?php if($results[0]["balance"] == 0): ?>
    <form method="POST" onsubmit="return validate(this);">
    <div class="mb-3">
        <label for="public">Open</label>
        <input type="radio" id="public" name="vis" value=True>
        <label for="save">Closed</label>
        <input type="radio" id="public" name="vis" value=False>
    </div>
    <input type="submit" value="Open/Close Account" name="save" />
    </form>
<?php endif; ?>

<?php
    if(isset($_POST['vis'])){
    $vis = $_POST['vis'];
    $visnum = $results[0]["account_number"];
    if($vis){
        $stmt = $db->prepare("UPDATE Accounts set is_active=$vis WHERE account_number=$visnum");
        try{
            $stmt->execute();
            if($vis){
                flash("Account opened!", "success");
            }else{
                flash("Account closed!", "success");
            }
        }catch (Exception $e) {
            echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
        }
    }
}
?>

<br><h3>Transaction History</h3>
<?php
 $results = [];
 $uid = get_user_id();
 $query = "SELECT account_src, account_dest, transaction_type, balance_change, created, expected_total, memo FROM Transactions WHERE account_src=$accnum";
 $countquery = "SELECT COUNT(*) FROM Transactions WHERE account_src=$accnum";
 

 if(isset($_POST['start'])){
     $sdate = $_POST['start'];
     $sdate = $sdate . " 00:00:00";
     $query = $query . " AND created>'$sdate'";
     $countquery = $countquery . " AND created>'$sdate'";
 }
 if(isset($_POST['end'])){
     $edate = $_POST['end'];
     $edate = $edate . " 23:59:59";
     $query = $query . " AND created<'$edate'";
     $countquery = $countquery . " AND created<'$edate'";
 }
 if(isset($_POST['type']) && $_POST['type'] != ""){
     $type = $_POST['type'];
     $query = $query . "AND transaction_type='$type'";
     $countquery = $countquery . " AND transaction_type='$type'";
 }

$pagelimit = 10;
 
$countresults = [];
$countstmt = $db->prepare($countquery);
try {
    $countstmt->execute();
    $res = $countstmt->fetchAll(PDO::FETCH_ASSOC);
    if ($res) {
        $countresults = $res;
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error fetching items", "danger");
}
$total = $countresults[0]['COUNT(*)'];
$total = (int)$total;

$totalpages = $total/$pagelimit;
$curpage = $_GET['page'];

 $offset = $pagelimit*($curpage-1);
 $query = $query . " ORDER BY created desc LIMIT 10 OFFSET $offset";

 $stmt = $db->prepare($query);
 $stmt->execute();
 $l = $stmt->fetchAll(PDO::FETCH_ASSOC);
 if ($l) {
     $results = $l;
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

<?php
    $leftbound;
    if($curpage==1){
        $leftbound = "";
    }else{
        $leftbound = get_url('transactions.php') . "?account=" . $accnum . "&page=" . ($curpage-1);
    }

    $rightbound;
    if($curpage==$totalpages){
        $rightbound = "";
    }else {
        $rightbound = get_url('transactions.php') . "?account=" . $accnum . "&page=" . ($curpage+1);
    }
?>

<nav>
    <ul>
        <li><a href=<?php echo $leftbound; ?>>Previous</a></li>
        <?php
            for($x = 0; $x<$totalpages; $x++):
        ?>
        <li><a href="<?php echo get_url('transactions.php'); ?>?account=<?php echo $accnum;?>&page=<?php echo ($x+1); ?>">Page <?php echo ($x+1); ?></a></li>
        <?php
            endfor;
        ?>
        <li><a href=<?php echo $rightbound; ?>>Next</a></li>
    </ul>
</nav>

<?php
require(__DIR__ . "/../../partials/flash.php");
?>