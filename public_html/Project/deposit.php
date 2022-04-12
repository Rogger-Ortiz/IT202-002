<?php
require(__DIR__ . "/../../partials/nav.php");
?>
<h1>Deposit</h1>

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
<label for="account">Deposit To Account Number:</label>
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

<label for="deposit">Deposit Amount:</label>
<input type="number" id="deposit" name="deposit"><br>

<label for="memo">Memo:</label>
<input type="text" id="memo" name="memo"><br>

<input type="submit" value="Submit" />
</form>


<?php
$hasError = false;
if(isset($_POST['deposit'])){
    if($_POST['account'] == "Account"){
        flash("Please select an account to deposit from.", "warning");
    }
}

if(isset($_POST['account'])){
    if(isset($_POST['deposit'])){
        if($_POST['deposit'] < 1){
            flash("Deposit must be $1 or more.", "warning");
            $hasError = true;
        }
    }
}

if((isset($_POST['account']) && $_POST['account'] != "Account") && !$hasError){
 // Transactions(account_src, account_dest, balance_change, transaction_type, expected_total)
 $worldacc = 1;
 $memo = $_POST['memo'];
 $memo = strval($memo);
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
 $balchange = $_POST['deposit'];
 $exptotal;

 // User Insert Stats
 $Uaccountsrc = (int)$Uaccountsrc;
 $Uaccountdest = $worldacc;
 $Ubalchange = $_POST['deposit'];
 $Uexptotal;
 $uid = get_user_id();

 // Update Balances of both accounts
 $balstmt = $db->prepare("UPDATE Accounts SET balance=(balance-$balchange) WHERE user_id=-1");
 $balstmt->execute();
 $balstmt = $db->prepare("UPDATE Accounts SET balance=(balance+$Ubalchange) WHERE user_id=$uid");
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
 $stmt2 = $db->prepare("INSERT INTO Transactions(account_src, account_dest, balance_change, transaction_type, expected_total, memo) VALUES($accountsrc, $accountdest, $balchange, 'Deposit', $wbal, '$memo')");
 $stmt3 = $db->prepare("INSERT INTO Transactions(account_src, account_dest, balance_change, transaction_type, expected_total, memo) VALUES($Uaccountsrc, $Uaccountdest, $Ubalchange, 'Deposit', $Ubal, '$memo')");

 // Execute statements, flash success
 try {
    $stmt2->execute();
    $stmt3->execute();

    flash("Successfully deposited!", "success");
} catch (Exception $e) {
    flash($e);
  }
}
?>

<?php
require(__DIR__ . "/../../partials/flash.php");
?>