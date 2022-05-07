<?php
require(__DIR__ . "/../../partials/nav.php");
?>
<h1>Take Out a Loan</h1>

<?php
if (is_logged_in(true)) {
    //comment this out if you don't want to see the session variables
    error_log("Session data: " . var_export($_SESSION, true));
}
$db=getDB();
?>

<?php

$results = [];
 $uid = get_user_id();
 $stmt = $db->prepare("SELECT account_number FROM Accounts WHERE user_id=$uid AND account_type != 'Loan'");
 $stmt->execute();
 $l = $stmt->fetchAll(PDO::FETCH_ASSOC);
 if ($l) {
     $results = $l;
 }

 $results3 = [];
 $uid = get_user_id();
 $stmt = $db->prepare("SELECT account_number FROM Accounts WHERE user_id = $uid AND account_type = 'Loan'");
 $stmt->execute();
 $l = $stmt->fetchAll(PDO::FETCH_ASSOC);
 if ($l) {
     $results3 = $l;
 }

?>

<form onsubmit="return validate(this)" method="POST">
    <h3>Please select your desired loan amount:</h3>
        <label for="loan">Amount (15% APY)</label>
        <input type="number" id="loan" name="loan"><br>

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


        <input type="submit" value="Submit" />
</form>

<h1>Pay a Loan</h1>
<h3>Please fill in the details below to pay off a loan:</h3>

<form onsubmit="return validate(this)" method="POST">
        <label for="from">Pay from:</label>
            <select id="from" name="from">
                <option value="Account">Account: </option>
                <?php
                    foreach($results as $account) {
                        $hold = $account['account_number'];
                        echo("<option value=$hold>$hold</option>");
                    }
                ?>
            </select><br>


        <label for="to">Pay off of this account: </label>
            <select id="to" name="to">
                <option value="Account">Account</option>
                <?php
                    foreach($results3 as $account) {
                        $hold = $account['account_number'];
                        echo("<option value=$hold>$hold</option>");
                    }
                ?>
            </select><br>

        <label for="amount">Amount: </label>
        <input type="number" id="amount" name="amount"><br>


        <input type="submit" id="submit2" name="submit2" value="Submit" />
</form>

<?php
$hasError = false;

if(isset($_POST["loan"]) && $_POST["loan"] < 500){
    flash("Loan amount must be more than $500", "warning");
    $hasError = true;
}


###############################################################################################################################################
if(isset($_POST["loan"]) && !$hasError){
    $db = getDB();

    $dupe = [];
    $stmt = $db->prepare("SELECT account_number FROM Accounts");
    $stmt->execute();
    $l = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($l) {
        $dupe = $l;
    }
    $isDupe = false;
    $myRandomString = '';
    do{
        $myRandomString = generateRandomString(12);
        foreach($l as $number => $account) {
            foreach($account as $num => $value) {
                if($myRandomString == $value) {
                    $isDupe = true;
                }
            }
        }
    }while($isDupe);    

    $accnum = $myRandomString;
    $uid = get_user_id();
    $useracc = $_POST['account'];
    $destID = toAccId($accnum);
    $bal = $_POST["loan"];
    $worldacc = 1;

    $balstmt = $db->prepare("UPDATE Accounts SET balance=(balance-$bal) WHERE user_id=-1");
    $balstmt->execute();
    $balstmt = $db->prepare("UPDATE Accounts SET balance=(balance+$bal) WHERE user_id=$uid AND account_number=");
    $balstmt->execute();

    // This grabs columns of a table using $results[r][c] where r="rownumber" and c="colname"
    $results2 = [];
    $stmt = $db->prepare("SELECT balance FROM Accounts WHERE user_id=-1 LIMIT 1");
    try {
        $stmt->execute();
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($r) {
            $results2 = $r;
        }
    } catch (PDOException $e) {
        error_log(var_export($e, true));
        flash("Error fetching items", "danger");
    }
    // Convert result to a string we can enter into the dataset
    $wbal = $results2[0]['balance'];
    $wbal = strval($wbal);

    $dest = [];
    $stmt = $db->prepare("SELECT balance FROM Accounts WHERE user_id=$uid AND account_number = $useracc LIMIT 1");
    try {
        $stmt->execute();
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($r) {
            $dest = $r;
        }
    } catch (PDOException $e) {
        error_log(var_export($e, true));
        flash("Error fetching items", "danger");
    }
    // Convert result to a string we can enter into the dataset
    $newbal = $dest[0]['balance'];
    $newbal = strval($newbal);

    $stmt = $db->prepare("INSERT INTO Accounts(account_number, user_id, balance, account_type) VALUES($accnum, $uid, $bal, 'Loan')");
    $stmt->execute();

    $results = [];
    $stmt = $db->prepare("SELECT id FROM Accounts WHERE account_number=$accnum LIMIT 1");
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
    $uAccID = $results[0]['id'];
    $uAccID = (int)$uAccID;

    $stmt2 = $db->prepare("INSERT INTO Transactions(account_src, account_dest, balance_change, transaction_type, memo, expected_total) VALUES($worldacc, $uAccID, ($bal*-1), 'Deposit', 'Loan Taken', $wbal )");
    $stmt3 = $db->prepare("INSERT INTO Transactions(account_src, account_dest, balance_change, transaction_type, memo, expected_total) VALUES($uAccID, $worldacc, $bal, 'Deposit', 'Loan Taken', $bal)");
    $stmt4 = $db->prepare("INSERT INTO Transactions(account_src. account_dest, balance_change, transaction_type, memo, expected_total) VALUES($worldacc, $destID, ($bal*-1), 'Deposit', 'Loan Deposited', $newbal)");

    try {
        $stmt2->execute();
        $stmt3->execute();

        flash("Successfully registered!", "success");
        die(header("Location: accounts.php"));
    } catch (Exception $e) {
        flash($e);
      }
}
###############################################################################################################################################
?>

<?php

if(isset($_POST["submit2"])){
    $hasError = false;

    if($_POST['from'] == "Account"){
        flash("Please choose an account to pay from", "warning");
        $hasError = true;
    }

    if($_POST['to'] == "Account"){
        flash("Please choose a loan account to pay off", "warning");
        $hasError = true;
    }

    if($_POST['amount'] < 1){
        flash("Can only pay in amounts more than $1", "warning");
        $hasError = true;
    }

    $useracc = $_POST['from'];
    $loanacc = $_POST['to'];

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
    }

    $results = [];
    $stmt = $db->prepare("SELECT balance FROM Accounts WHERE user_id=$uid AND account_number=$loanacc LIMIT 1");
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
    $loanlimit = $results[0]['balance'];
    $loanlimit = (int)$loanlimit;
    }

    if($_POST['amount'] > $limit){
        flash("Cannot pay off more than your account has in it", "warning");
        $hasError = true;
    }

    if($_POST['amount'] > $loanlimit){
        flash("Cannot pay off more than the loan is due", "warning");
        $hasError = true;
    }

    if(!$hasError){

    }

}

?>


<?php
require(__DIR__ . "/../../partials/flash.php");
?>