<?php
require(__DIR__ . "/../../partials/nav.php");
?>
<h1>Withdraw</h1>

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
<label for="account">Withdraw from Account Number:</label>
<select id="account" name="account">
    <option value="Account">Account</option>
    <?php
    foreach($results as $account) {
            $hold = $account['account_number'];
            echo("<option value=$hold>$hold</option>");
    }
    ?>
</select>
<br>

<label for="withdraw">Withdraw Amount:</label>
<input type="number" id="withdraw" name="withdraw"><br>

<input type="submit" value="Submit" />
</form>


<?php
$hasError = false;

// Grab upper limit of account
$limval = false;
$results = [];
    $stmt = $db->prepare("SELECT balance FROM Accounts WHERE user_id=$uid LIMIT 1");
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

if(isset($_POST['withdraw'])){
    if($_POST['account'] == "Account"){
        flash("Please select an account to withdraw from.", "warning");
    }
}

if(isset($_POST['account'])){
    if(isset($_POST['withdraw']) && ($limval)){
        if($_POST['withdraw'] > $limit){
            flash("Cannot withdraw more than you have in the bank.", "warning");
            $hasError = true;
        }
    }
}

if(isset($_POST['account'])){
    if(isset($_POST['withdraw'])){
        if($_POST['withdraw'] < 1){
            flash("Withdraw must be $1 or more.", "warning");
            $hasError = true;
        }
    }
}
if((isset($_POST['account']) && $_POST['account'] != "Account") && !$hasError){
 // Transactions(account_src, account_dest, balance_change, transaction_type, expected_total)
 $worldacc = 1;
 $results = [];
 $stmt = $db->prepare("SELECT id FROM Accounts WHERE user_id=$uid LIMIT 1");
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
 $Uaccountsrc = $results[0]['id'];

 // Bank Insert Stats
 $accountsrc = $worldacc;
 $accountdest = (int)$Uaccountsrc;
 $balchange = $_POST['withdraw'];
 $exptotal;

 // User Insert Stats
 $results = [];
 $stmt = $db->prepare("SELECT id FROM Accounts WHERE user_id=$uid LIMIT 1");
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
 $Uaccountsrc = $results[0]['id'];
 $Uaccountsrc = (int)$Uaccountsrc;
 $Uaccountdest = $worldacc;
 $Ubalchange = $_POST['withdraw'];
 $Uexptotal;
 $uid = get_user_id();

 // Update Balances of both accounts
 $balstmt = $db->prepare("UPDATE Accounts SET balance=(balance+$balchange) WHERE user_id=-1");
 $balstmt->execute();
 $balstmt = $db->prepare("UPDATE Accounts SET balance=(balance-$Ubalchange) WHERE user_id=$uid");
 $balstmt->execute();

 // Grab both accounts expected totals for insertion
    $results = [];
    $stmt = $db->prepare("SELECT balance FROM Accounts WHERE user_id=-1 LIMIT 1");
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
    $wbal = $results[0]['balance'];
    $wbal = strval($wbal);

    $stmt = $db->prepare("SELECT balance FROM Accounts WHERE user_id=$uid LIMIT 1");
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
    // Convert result to a string we can enter into the dataset
    $Ubal = $results[0]['balance'];
    $Ubal = strval($Ubal);

 // Insert Transactions into Transactions table
 $stmt2 = $db->prepare("INSERT INTO Transactions(account_src, account_dest, balance_change, transaction_type, expected_total) VALUES($accountsrc, $accountdest, $balchange, 'Withdraw', $wbal )");
 $stmt3 = $db->prepare("INSERT INTO Transactions(account_src, account_dest, balance_change, transaction_type, expected_total) VALUES($Uaccountsrc, $Uaccountdest, $Ubalchange, 'Withdraw', $Ubal)");

 // Execute statements, flash success
 try {
    $stmt2->execute();
    $stmt3->execute();

    flash("Successfully withdrew!", "success");
} catch (Exception $e) {
    flash($e);
  }
}
?>

<?php
require(__DIR__ . "/../../partials/flash.php");
?>