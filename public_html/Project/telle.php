<?php

use LDAP\Result;

require(__DIR__ . "/../../partials/nav.php");
?>
<h1>Send Money With Telle</h1>

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
<h3>User Details:</h3>
<form method="POST">
<label for="account">From:</label>
<select id="account" name="account">
    <option value="Account">Account</option>
    <?php
    foreach($results as $account) {
            $hold = $account['account_number'];
            echo("<option value=$hold>$hold</option>");
    }
    ?>
</select><br><br>

<h3>Destination Information:</h3>
<label for="fname">First Name:</label>
<input type="text" id="fname" name="fname"><br>

<label for="lname">Last Name:</label>
<input type="text" id="lname" name="lname"><br>

<label for="accdest">Last 4 Digits of Destination Account:</label>
<input type="number" id="accdest" name="accdest"><br>

<br>
<h3>Transfer Information:</h3>
<label for="transfer">Transfer Amount:</label>
<input type="number" id="transfer" name="transfer"><br>

<label for="memo">Memo:</label>
<input type="text" id="memo" name="memo"><br>

<input type="submit" id="submit" name="submit" value="Submit" />
</form>

<?php
$hasError = false;
$uid = get_user_id();
$limit = 0;

if(isset($_POST['account']) && $_POST['account']!="Account"){
    $useracc = $_POST['account'];
    $results = [];
    $stmt = $db->prepare("SELECT balance FROM Accounts WHERE user_id=$uid AND account_number=$useracc LIMIT 1");
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

$hasError=false;
if(isset($_POST['submit'])){
    if($_POST['account'] == "Account"){
        flash("Please select an account to transfer from.", "warning");
        $hasError = true;
    }

    if($_POST['fname'] == ""){
        flash("Please select recipients first name.", "warning");
        $hasError = true;
    }

    if($_POST['lname'] == ""){
        flash("Please select recipients last name.", "warning");
        $hasError = true;
    }

    $space = strpos($_POST['fname'], ' ');
    if($space != false){
        flash("First name should only be one word", "warning");
        $hasError = true;
    }

    $space = strpos($_POST['lname'], ' ');
    if($space != false){
        flash("Last name should only be one word", "warning");
        $hasError = true;
    }

    if($_POST['transfer']>$limit){
        flash("Cannot transfer more than account has.", "warning");
        $hasError = true;
    }

    if($_POST['transfer']<1){
        flash("Cannot transfer less than $1.", "warning");
        $hasError = true;
    }

    $acclength = strval($_POST['accdest']);
    $acclength = strlen($acclength);
    if($acclength != 4){
        flash("Please only enter 4 digits for destination account.", "warning");
        $hasError = true;
    }


}


if(isset($_POST['submit']) && !$hasError){
    $accsrc = $_POST['account'];
    $accdest = $_POST['accdest'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $transamt = $_POST['transfer'];
    $memo = $_POST['memo'];

    //Verify User Exists
    $results = [];
    $stmt = $db->prepare("SELECT Accounts.account_number, Users.first_name, Users.last_name
                          FROM Users
                          INNER JOIN Accounts 
                          ON Users.id = Accounts.user_id
                          WHERE Accounts.account_number LIKE '%$accdest' AND Users.first_name='$fname' AND Users.last_name='$lname' LIMIT 1");
    try {
        $stmt->execute();
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($r) {
            $results = $r;
        }
    } catch (PDOException $e) {
    }

    if($results){
        $accdest = $results[0]['account_number'];
        $accsrcID = toAccId($accsrc);
        $accdestID = toAccId($accdest);

        $balstmt = $db->prepare("UPDATE Accounts SET balance=(balance+$transamt) WHERE id=$accdestID");
        $balstmt->execute();
        $balstmt = $db->prepare("UPDATE Accounts SET balance=(balance-$transamt) WHERE id=$accsrcID");
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

        $trstmt = $db->prepare("INSERT INTO Transactions(account_src, account_dest, balance_change, transaction_type, memo, expected_total) VALUES($accsrcID, $accdestID, ($transamt*-1), 'Ext-Transfer', '$memo', $sbal)");
        $trstmt->execute();
        $trstmt = $db->prepare("INSERT INTO Transactions(account_src, account_dest, balance_change, transaction_type, memo, expected_total) VALUES($accdestID, $accsrcID, $transamt, 'Ext-Transfer', '$memo', $dbal)");
        $trstmt->execute();

        flash("External Transfer Success!", "success");
    }else{
        flash("No such destination exists. Please try again.", "Warning");
    }
}
?>

<?php
require(__DIR__ . "/../../partials/flash.php");
?>