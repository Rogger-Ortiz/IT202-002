<?php

use LDAP\Result;

require(__DIR__ . "/../../partials/nav.php");
?>
<h1>Transfer</h1>

<?php
if (is_logged_in(true)) {
    //comment this out if you don't want to see the session variables
    error_log("Session data: " . var_export($_SESSION, true));
}
$db = getDB();
?>

<?php

$results = [];
 $uid = get_user_id();
 $stmt = $db->prepare("SELECT account_number FROM Accounts WHERE user_id = $uid");
 $stmt->execute();
 $l = $stmt->fetchAll(PDO::FETCH_ASSOC);
 if ($l) {
     $results = $l;
 }
?>

<form method="POST">
<h3>Transaction Details:</h3>
<label for="account">From:</label>
<select id="account" name="account">
    <option value="Account">Account</option>
    <?php
    foreach($results as $account) {
            $hold = $account['account_number'];
            echo("<option value=$hold>$hold</option>");
    }
    ?>
</select>

<label to="account2">To:</label>
<select id="account2" name="account2">
    <option value="Account">Account</option>
    <?php
    foreach($results as $account2) {
        $hold2 = $account2['account_number'];
        echo("<option value=$hold2>$hold2</option>");
}
    ?>
</select>
<br>
<label for="transfer">Transfer Amount:</label>
<input type="number" id="transfer" name="transfer"><br>

<label for="memo">Memo:</label>
<input type="text" id="memo" name="memo"><br>

<input type="submit" value="Submit" />
</form>

<?php
$hasError = false;

if(isset($_POST['account']) && isset($_POST['account2'])){
    if($_POST['account'] == "Account" || $_POST['account2'] == "Account"){
        flash("Please choose 2 valid accounts", "warning");
        $hasError = true;
    }
}

if(isset($_POST['account']) && isset($_POST['account2'])){
    if(($_POST['account'] == $_POST['account2']) && ($_POST['account'] != "Account" || $_POST['account2'] != "Account")){
        flash("Please choose 2 different accounts", "warning");
        $hasError = true;
    }
}


$limval = false;
$limit = 0;
if(isset($_POST['account']) && ($_POST['account'] != "Account")){
    $accnum = $_POST['account'];
    $results = [];
    $stmt = $db->prepare("SELECT balance FROM Accounts WHERE user_id=$uid AND account_number=$accnum LIMIT 1");
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
    if($results){
        $limit = $results[0]['balance'];
        $limit = (int)$limit;
        $limval = true;
    }
}

if(isset($_POST['submit'])){
    if($_POST['transfer'] <= 0){
        flash("Transfer must be greater tha $0.", "warning");
        $hasError = true;
    }
}

if(isset($_POST['transfer']) && $limval){
    if($_POST['transfer'] > $limit){
        flash("Cannot transfer more than account has.", "warning");
        $hasError = true;
    }
}

if((isset($_POST['account']) && isset($_POST['account2'])) && !($hasError)){
  $db = getDB();

  $accsrc = $_POST['account'];
  $accsrcID = toAccId($accsrc);
  $accdest = $_POST['account2'];
  $accdestID = toAccId($accdest);
  $transamt = $_POST['transfer'];
  $memo = $_POST['memo'];

  $balstmt = $db->prepare("UPDATE Accounts SET balance=(balance+$transamt) WHERE account_number=$accdest");
  $balstmt->execute();
  $balstmt = $db->prepare("UPDATE Accounts SET balance=(balance-$transamt) WHERE account_number=$accsrc");
  $balstmt->execute();

  $results = [];
  $stmt = $db->prepare("SELECT balance FROM Accounts WHERE account_number=$accsrc LIMIT 1");
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
  $sbal = $results[0]['balance'];
  $sbal = (int)$sbal;

  $results = [];
  $stmt = $db->prepare("SELECT balance FROM Accounts WHERE account_number=$accdest LIMIT 1");
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
  $dbal = $results[0]['balance'];
  $dbal = (int)$dbal;
  
  try{
    $trstmt = $db->prepare("INSERT INTO Transactions(account_src, account_dest, balance_change, transaction_type, memo, expected_total) VALUES($accsrcID, $accdestID, ($transamt*-1), 'Transfer', '$memo', $sbal)");
    $trstmt->execute();
    $trstmt = $db->prepare("INSERT INTO Transactions(account_src, account_dest, balance_change, transaction_type, memo, expected_total) VALUES($accdestID, $accsrcID, $transamt, 'Transfer', '$memo', $dbal)");
    $trstmt->execute();
    flash("Transfer Success!", "Success");
  }catch (PDOException $e) {
    flash("Something went wrong.", "warning");
  }  
}
?>

<?php
require(__DIR__ . "/../../partials/flash.php");
?>