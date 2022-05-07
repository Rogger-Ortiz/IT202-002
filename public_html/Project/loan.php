<?php
require(__DIR__ . "/../../partials/nav.php");
?>
<h1>Take Out a Loan</h1>

<?php
if (is_logged_in(true)) {
    //comment this out if you don't want to see the session variables
    error_log("Session data: " . var_export($_SESSION, true));
}
?>

<form onsubmit="return validate(this)" method="POST">
    <h3>Please select your desired loan amount:</h3>
        <label for="loan">Amount (15% APY)</label>
        <input type="number" id="loan" name="loan"><br>

        <input type="submit" value="Submit" />
</form>

<?php
$hasError = false;

if(isset($_POST["loan"]) && $_POST["loan"] < 500){
    flash("Loan amount must be more than $500", "warning");
    $hasError = true;
}

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
    $bal = $_POST["loan"];
    $worldacc = 1;

    $balstmt = $db->prepare("UPDATE Accounts SET balance=(balance-$bal) WHERE user_id=-1");
    $balstmt->execute();

    // This grabs columns of a table using $results[r][c] where r="rownumber" and c="colname"
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
    // Convert result to a string we can enter into the dataset
    $wbal = $results[0]['balance'];
    $wbal = strval($wbal);

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

    try {
        $stmt2->execute();
        $stmt3->execute();

        flash("Successfully registered!", "success");
        die(header("Location: accounts.php"));
    } catch (Exception $e) {
        flash($e);
      }
}

?>


<?php
require(__DIR__ . "/../../partials/flash.php");
?>